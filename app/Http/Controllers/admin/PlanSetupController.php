<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use PDF;

class PlanSetupController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function edit($id) {
        $mainmenu     = "Configuration";
        $menu         = "Plan Setup";
        $param['id']  = $id;
        $reportsData  = $this->lib->_sendPostRequest("/reports/get-plan-setup", $param);
        if(!empty($reportsData['data']) && count($reportsData['data']) > 0 && $reportsData['success'] == 1) {
            $reports        = $reportsData['data'];
            
            return view('admin.plan-setup.edit',compact(['mainmenu','menu','reports']));   
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {

        $param            = $request->all();
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/reports/save-plan-setup", $param);
        
        \Session::flash('success','Record has been updated successfully!');
        return redirect('admin/plan-setup/'.$id.'/edit');
    }
}

