<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use PDF;

class ServicingReportsSetupController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function edit($id) {
        $mainmenu     = "Configuration";
        $menu         = "Report Setup";
        $param['id']  = $id;
        $reportsData  = $this->lib->_sendPostRequest("/reports/get-servicing-reports-setup", $param);
        if(!empty($reportsData['data']) && count($reportsData['data']) > 0 && $reportsData['success'] == 1) {
            $reports        = $reportsData['data'];

            $param1['tag'] = "caption";
            $captionData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $caption1      = !empty($captionData['data']) ? $captionData['data'] : [];
            $caption       = [];
            if(!empty($caption1) && count($caption1) > 0) {
                foreach ($caption1 as $key => $value) {
                    $caption[$value['CAPCD']] = $value['CAP1'];
                }
            }
            
            return view('admin.servicing-reports-setup.edit',compact(['mainmenu','menu','reports','caption']));   
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {

        $param            = $request->all();
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/reports/save-servicing-reports-setup", $param);
        
        \Session::flash('success','Record has been updated successfully!');
        return redirect('admin/servicing-reports-setup/'.$id.'/edit');
    }
}

