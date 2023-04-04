<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Contact;
use DB;
use Illuminate\Support\Str;

class AgencyMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }



    
    public function index() {

           // $deletepol = DB::connection('lifecell_lic')->select("delete FROM ledger");
           // $deleteled = DB::connection('lifecell_lic')->select("delete FROM pol");

        // $polInfo2 = DB::connection('lifecell_lic')->select("SELECT PUNIQID,RDT,MODE,FUP,FUPDATE FROM pol");
        // echo "<pre>";
        // print_r($polInfo2);

        // $ledger = DB::connection('lifecell_lic')->select("SELECT pono,duedt,rdt FROM ledger");
        // echo "<pre>";
        // print_r($ledger);

        // echo "a";die();



        abort_if(Gate::denies('agency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Agency";
        $param['tag'] = "agency";
        $param['p_id'] = 7;
        $agencyData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $agency 	  = $agencyData['data'];
       return view('admin.agency.index', compact(['mainmenu','menu','agency']));
    }

    public function create() {
        abort_if(Gate::denies('agency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Agency";

        $param['tag'] = 'do';
        $doData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $do           = !empty($doData['data']) ? $doData['data'] : [];
        $doname       = [];
        if(!empty($do) && count($do) > 0) {
            foreach ($do as $key => $value) {
                $doname[$value['DOCODE']] = $value['DONAME'];
            }
        }

        $parambank['tag'] = 'bank';
        $bankData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambank);
        $bank           = !empty($bankData['data']) ? $bankData['data'] : [];
        $bankname       = [];
        if(!empty($bank) && count($bank) > 0) {
            foreach ($bank as $key => $value) {
                $bankname[$value['BANKCD']] = $value['BANK'];
            }
        }

        $parambranch['tag'] = 'branch';
        $branchData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambranch);
        $branch           = !empty($branchData['data']) ? $branchData['data'] : [];
        $branchname       = [];
        if(!empty($branch) && count($branch) > 0) {
            foreach ($branch as $key => $value) {
                $branchname[$value['BCODE']] = $value['BRANCHNM'];
            }
        }

        $paramcity['tag'] = 'city';
        $cityData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcity);
        $city           = !empty($cityData['data']) ? $cityData['data'] : [];
        $cityname       = [];
        if(!empty($city) && count($city) > 0) {
            foreach ($city as $key => $value) {
                $cityname[$value['CITYID']] = $value['CITY'];
            }
        }

        $paramarea['tag'] = 'area';
        $areaData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramarea);
        $area           = !empty($areaData['data']) ? $areaData['data'] : [];
        $areaname       = [];
        if(!empty($area) && count($area) > 0) {
            foreach ($area as $key => $value) {
                $areaname[$value['ARECD']] = $value['ARE1'];
            }
        }

        return view("admin.agency.add",compact(['mainmenu','menu','doname','bankname','branchname','cityname','areaname']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('agency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'AGCODE'  => 'required',
            'ANAME'   => 'required',
            'DOCODE'  => 'required',
        ]);

        $param            = $request->all();
        $cId        = \Auth::user()->c_id;
        $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1");
        $param['policy_insurance_id'] = (!empty($clientData[0]) && $clientData[0]->policy_insurance_id) ? $clientData[0]->policy_insurance_id : 0;
        $param['tag']     = "agency";
        $param['is_edit'] = "0";
        $param['p_id']    = 7;
        unset($param['_token']);

        if ($photo = $request->file('PHOTO')) {
            $root = base_path() . '/public/resource/master/agency/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/master/agency/" . $name;
            $photo->move($root, $name);
            $param['PHOTO'] = $image_path;
        }

        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Agency has been inserted successfully!');
        return redirect('admin/agency-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('agency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Agency";
        $param['tag'] = "agency";
        $param['id']  = $id;
        $param['p_id']  = 7;
        $agencyData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($agencyData['data']) && count($agencyData['data']) > 0 && $agencyData['success'] == 1) {
        	$agency  = $agencyData['data'][0];

            $param1['tag'] = 'do';
            $doData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $do           = !empty($doData['data']) ? $doData['data'] : [];
            $doname       = [];
            if(!empty($do) && count($do) > 0) {
                foreach ($do as $key => $value) {
                    $doname[$value['DOCODE']] = $value['DONAME'];
                }
            }

            $parambank['tag'] = 'bank';
            $bankData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambank);
            $bank           = !empty($bankData['data']) ? $bankData['data'] : [];
            $bankname       = [];
            if(!empty($bank) && count($bank) > 0) {
                foreach ($bank as $key => $value) {
                    $bankname[$value['BANKCD']] = $value['BANK'];
                }
            }

            $parambranch['tag'] = 'branch';
            $branchData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambranch);
            $branch           = !empty($branchData['data']) ? $branchData['data'] : [];
            $branchname       = [];
            if(!empty($branch) && count($branch) > 0) {
                foreach ($branch as $key => $value) {
                    $branchname[$value['BCODE']] = $value['BRANCHNM'];
                }
            }

            $paramcity['tag'] = 'city';
            $cityData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcity);
            $city           = !empty($cityData['data']) ? $cityData['data'] : [];
            $cityname       = [];
            if(!empty($city) && count($city) > 0) {
                foreach ($city as $key => $value) {
                    $cityname[$value['CITYID']] = $value['CITY'];
                }
            }

            $paramarea['tag'] = 'area';
            $areaData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramarea);
            $area           = !empty($areaData['data']) ? $areaData['data'] : [];
            $areaname       = [];
            if(!empty($area) && count($area) > 0) {
                foreach ($area as $key => $value) {
                    $areaname[$value['ARECD']] = $value['ARE1'];
                }
            }

            $contact = Contact::where('tableName','agency')->where('tableID',$id)->get();
            // $paramcontact['tag'] = 'contact';
            // $contactData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcontact);
            // $contact             = !empty($contactData['data']) ? $contactData['data'] : [];
            
	        return view('admin.agency.edit',compact(['mainmenu','menu','agency','doname','bankname','branchname','cityname','areaname','contact']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('agency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'AGCODE'  => 'required',
            'ANAME'   => 'required',
            'DOCODE'  => 'required',
        ]);

        $param            = $request->all();
        $cId        = \Auth::user()->c_id;
        $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1");
        $param['policy_insurance_id'] = (!empty($clientData[0]) && $clientData[0]->policy_insurance_id) ? $clientData[0]->policy_insurance_id : 0;
        $param['tag']     = "agency";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        $param['p_id']    = 7;
        unset($param['_method']);
        unset($param['_token']);

        if ($photo = $request->file('PHOTO')) {
            $root = base_path() . '/public/resource/master/agency/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/master/agency/" . $name;
            $photo->move($root, $name);
            $param['PHOTO'] = $image_path;
        }
        
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Agency has been updated successfully!');
        return redirect('admin/agency-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('agency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "agency";
    	$param['id']  = $request['delete_record_id'];
        $agencyData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Agency has been deleted successfully!');
        return redirect('admin/agency-master');
    }
}

