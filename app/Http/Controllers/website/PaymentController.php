<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use Hash;

class PaymentController extends Controller
{
    public $lib;
    public $general;

    public function __construct() {
        $this->lib = new \App\Library\Api;
        $this->general = new \App\Library\General;
    }

    public function create($pid) {

        $parambranch['tag'] = 'branch';
        $branchData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambranch);
        $branch           = !empty($branchData['data']) ? $branchData['data'] : [];
        $branchname       = [];
        if(!empty($branch) && count($branch) > 0) {
            foreach ($branch as $key => $value) {
                $branchname[$value['BCODE']] = $value['BRANCH'];
            }
        }

        $state = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_state where state != ''");
        $statename       = [];
        if(!empty($state) && count($state) > 0) {
            foreach ($state as $key => $value) {
                $statename[$value->stateid] = $value->state;
            }
        }

        $city = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_city where city != ''");
        $cityname       = [];
        if(!empty($city) && count($city) > 0) {
            foreach ($city as $key => $value) {
                $cityname[$value->cityid] = $value->city;
            }
        }

        $product = \DB::connection('lifecell_lic')->select("SELECT * FROM product where productid = {$pid} limit 1");
        if(empty($product)) {
            abort(404);
        }
        $productName  = !empty($product[0]) ? $product[0]->productname : '';
        $productPrice = !empty($product[0]) ? $product[0]->price : 0;

        $userType = [];

        if($pid == 7 || $pid == 8 || $pid == 9 || $pid == 11) {
            $userType = ['1'=>'Agent','2'=>'Do','3'=>'Investor'];
        } else if($pid == 10 || $pid == 16 || $pid == 21 || $pid == 22) {
            $userType = ['1'=>'Agent'];
        } else if($pid == 17 || $pid == 19) {
            $userType = ['3'=>'Investor'];
        } else if($pid == 18) {
            $userType = ['1'=>'Agent','3'=>'Investor'];
        } else if($pid == 20) {
            $userType = ['4'=>'With Inventory','5'=>'Without Inventory'];
        }
        
        return view('website.register',compact(['branchname','cityname','statename','productName','productPrice','userType','pid']));
    }

    public function Register_Store(Request $request) {
        
        request()->validate([
            'c_name'   => 'required',
            'cp_user_type'   => 'required',
            'c_mobile' => 'required|unique:lifecell_users.tbl_client_product,cp_mobile_no',
            'c_email'  => 'required|email|unique:lifecell_users.tbl_client_product,cp_email',
            'c_password'  => 'required|min:6',
        'cf_password' => 'required|same:c_password|min:6',
        ],
        [
            'c_name.required'     => 'The Name field is required.',
            'cp_user_type.required'     => 'The User Type field is required.',
            'c_mobile.required'   => "The Mobile field is required.",
            'c_mobile.unique'     => "The Mobile has already been taken.",
            'c_email.required'    => "The Email field is required.",
            'c_email.email'       => "The Email must be a valid email address.",
            'c_email.unique'      => "The Email has already been taken.",
            'c_password.required' => "The Password field is required.",
            'c_password.min'      => "The Password must be at least 6 characters.",
        ]);

        $param            = $request->all();
        unset($param['_token']);
        $param['p_id']    = !empty($param['p_id']) ? $param['p_id'] : 7;
        $data = $this->lib->_sendPostRequest("/register", $param);
        $state = \DB::connection('lifecell_users')->select("INSERT INTO tbl_employee(client_id,c_name,c_mobile,c_email,c_password,e_type) VALUES('".$data['data']['c_id']."','".$request->c_name."','".$request->c_mobile."','".$request->c_email."','".Hash::make($request->c_password)."','1')");

        return redirect('otp-verify/'.$data['data']['c_id']);
        //return redirect('payment/'.$data['data']['c_id']);
    }

    public function otpVerify($c_id) {
        return view('website.otp-verify',compact(['c_id']));
    }

    public function checkOtpVerification(Request $request) {

        $input = $request->all();
        $validator = Validator::make($input,[
            'c_otp' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $data = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$request->c_id}");
        
        $getClientId  = !empty($data[0]) ? $data[0]->c_id : 0;
        $getOTP  = !empty($data[0]) ? $data[0]->c_otp : 0;
        //print_r($data); die;
        if($getClientId != 0) {
            if($data[0]->c_is_otp_verified == 0 && $getOTP == $request->c_otp):
                \DB::connection('lifecell_users')->update("UPDATE tbl_client SET c_otp = 0, c_is_otp_verified = 1 where c_id = {$getClientId}");
            endif;
            return redirect('payment/'.$getClientId);
        } else {
            $errors = [];
            $errors['error'] = 'OTP is invalid, Please enter correct OTP';
            return back()
                ->withErrors($errors)
                ->withInput();
        }
    }

    public function payment($c_id) {
        $checkValidProductLicense = $this->general->checkValidProductLicense($c_id);

         
          
           $d=date("Y-m-d");


         $data = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client_product where c_id = {$c_id}");
        
        $pid  = !empty($data[0]) ? $data[0]->p_id : 0;
        $cpl_id  = !empty($data[0]) ? $data[0]->cp_id : '';


            $data1 = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$c_id}");
            $email=!empty($data1[0]) ? $data1[0]->c_email : 0;
            $corporateName=!empty($data1[0]) ? $data1[0]->c_name : 0;
            $contact=!empty($data1[0]) ? $data1[0]->c_mobile : 0;


        $product = \DB::connection('lifecell_lic')->select("SELECT * FROM product where productid = {$pid} limit 1");
        if(empty($product)) {
            abort(404);
        }
        $productName  = !empty($product[0]) ? $product[0]->productname : '';
        $productPrice = !empty($product[0]) ? $product[0]->price : 0;

        $label='License purchase';
        $checkExpiredLicense = 1;
        if($checkValidProductLicense == false) {
            $checkExpiredLicense = 0;
            $productName  = !empty($product[0]) ? $product[0]->productname : '';
          $productPrice = !empty($product[0]) ? $product[0]->renew : 0;
          $label='Renewal License';
        }
       $append_month=!empty($product[0]) ? $product[0]->demorenewaldays : 0;

           
        

        return view('website.payment',compact(['c_id','checkExpiredLicense','productPrice','cpl_id','append_month','pid','email','corporateName','contact','label']));
    }

    public function Payment_Store(Request $request) {

        $input = $request->all();



        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

                $amount=$payment['amount'];

            } catch (\Exception $e) {
                return  $e->getMessage();
                \Session::flash('error',$e->getMessage());
                return redirect()->back();
            }
        }


          // $input = $request->all();
         $d=date("Y-m-d");
        $append_month=!empty($input['append_month']) ? $input['append_month'] : 12;
        $date=Date("Y-m-d", strtotime($d."+".$append_month." Month"));
        $cp_id=!empty($input['cpl_id']) ? $input['cpl_id'] : 0;
         
        $state = \DB::connection('lifecell_users')->update("update tbl_client_product set cp_license_exp_dt='".$date."' where cp_id = '".$cp_id."' ");


        $c_id=!empty($input['c_id']) ? $input['c_id'] : '0';
        $cp_id=$cp_id;
        $p_id=!empty($input['pid']) ? $input['pid'] : '0';
        $device_id='0';
        $new_licence='0';
        $renew_licence='0';
        $amount=!empty($input['totalAmount']) ? $input['totalAmount'] : '0';
        $tr_dt=$d;
        $sales_dt=$d;
        $dealer_id='0';
        $old_due_dt=$d;
        $new_due_dt=$date;

         $state1 = \DB::connection('lifecell_users')->select("INSERT INTO client_product_payment(c_id,cp_id,p_id,device_id,new_licence,renew_licence,amount,tr_dt,sales_dt,dealer_id,old_due_dt,new_due_dt) VALUES('".$c_id."','".$cp_id."','".$p_id."','".$device_id."','".$new_licence."','".$renew_licence."','".$amount."','".$tr_dt."','".$sales_dt."','".$dealer_id."','".$old_due_dt."','".$new_due_dt."')");


      
        

     




        $arr = array('msg' => 'Payment successfully credited', 'status' => true);
        return Response()->json($arr);
    }

    public function thankYou() {


        return view('website.thankyou');
    }
}
