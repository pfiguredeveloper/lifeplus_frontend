<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Library\Api;
use App\Library\General;
use Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public $lib;
    public $general;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $loginView           = 'admin.auth.login';
    protected $redirectTo          = '/admin';
    protected $redirectAfterLogout = 'admin/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->lib = new Api;
        $this->general = new General;
        $this->middleware('guest')->except('logout');
    }
    public function test()
    {
        shell_exec('sudo chmod -R 777 /opt/bitnami/apache/htdocs/lifeplus_api/public');
        shell_exec('sudo mkdir /opt/bitnami/apache/htdocs/lifeplus_api/public/se');
        echo "success";
    }
    public function login(Request $request)
    {
        if(!preg_match('#[^0-9]#',$request['emailormobile'])) {
            $this->validate($request, [
                'emailormobile' => 'required|min:10',
                'password'      => 'required',
            ]);
        } else {
            $this->validate($request, [
                'emailormobile' => 'required|email',
                'password'      => 'required',
            ]);
        }
        
        $param                = $request->all();
        $param['device_name'] = 'web';
        $param['p_id']        = 7;
        $userData  = $this->lib->_sendPostRequest("login-web",$param);

        // if($userData["success"]==0){
        //     echo $userData["msg"];die();
        // }
        //die;
        //End Check valid product license...
        if($userData['success'] == 0) {
            return redirect('admin/login')
                        ->withErrors($userData['msg'])
                        ->withInput();
        }

        //Check valid product license...
        $checkValidProductLicense = $this->general->checkValidProductLicense($userData['data']['c_id']);
        //dd($checkValidProductLicense);
        if ($checkValidProductLicense == false) {
            return redirect()->route('payment', $userData['data']['c_id']);
            die;
        }
        
        if(!preg_match('#[^0-9]#',$request['emailormobile'])) {
            if(auth()->attempt(array('cp_mobile_no' => $param['emailormobile'], 'password' => $param['password'],'p_id' => 7)))
            {
                return redirect()->route('dashboard');
            }
        } else {
            if(auth()->attempt(array('cp_email' => $param['emailormobile'], 'password' => $param['password'],'p_id' => 7)))
            {
                return redirect()->route('dashboard');
            }
        }
    }

    public function forgotPassword(Request $request)
    {
        return view('admin.auth.forgot-password');
    }

    public function forgotPasswordUpdate(Request $request)
    {
        if(!preg_match('#[^0-9]#',$request['emailormobile'])) {
            $this->validate($request, [
                'emailormobile'  => 'required',
            ]);
        } else {
            $this->validate($request, [
                'emailormobile'  => 'required|email',
            ]);
        }
        
        
        $param            = $request->all();
        $param['c_email'] = $request['emailormobile'];
        $param['p_id']    = 7;
        $userData         = $this->lib->_sendPostRequest("forgot-password",$param);

        \Session::flash('success', 'A new password has been sent to your registered email address.');
        return redirect('admin/forgot-password');
    }
}
