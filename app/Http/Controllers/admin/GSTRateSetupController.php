<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class GSTRateSetupController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('gst_setup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu     = "Configuration";
        $menu         = "GST Rate Setup";
        $reportsData  = $this->lib->_sendPostRequest("/reports/get-gst-rate-setup");
        $gst 		  = $reportsData['data'];
        return view('admin.gst-setup.index', compact(['mainmenu','menu','gst']));
    }

    public function create() {
        abort_if(Gate::denies('gst_setup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu     = "Configuration";
        $menu         = "GST Rate Setup";
        return view("admin.gst-setup.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('gst_setup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            //'ARE1' => 'required',
        ]);

        $param            = $request->all();
        unset($param['_token']);
        $this->lib->_sendPostRequest("/reports/save-gst-rate-setup", $param);

        \Session::flash('success', 'GST Rate has been inserted successfully!');
        return redirect('admin/gst-setup');
    }

    public function edit($id) {
        abort_if(Gate::denies('gst_setup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu     = "Configuration";
        $menu         = "GST Rate Setup";
        $param['id']  = $id;
        $gstData 	  = $this->lib->_sendPostRequest("/reports/get-gst-rate-setup", $param);
        if(!empty($gstData['data']) && $gstData['success'] == 1) {
        	$gst 		  = $gstData['data'];
	        return view('admin.gst-setup.edit',compact(['mainmenu','menu','gst']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('gst_setup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            //'ARE1' => 'required',
        ]);

        $param            = $request->all();
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/reports/save-gst-rate-setup", $param);

        \Session::flash('success','GST Rate has been updated successfully!');
        return redirect('admin/gst-setup');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('gst_setup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['id']  = $request['delete_record_id'];
        $this->lib->_sendPostRequest("/reports/delete-gst-rate-setup", $param);

        \Session::flash('danger','GST Rate has been deleted successfully!');
        return redirect('admin/gst-setup');
    }
}

