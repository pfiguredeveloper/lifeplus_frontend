<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PaidByMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('paidby_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Paid By";
        $param['tag'] = "paidby";
        $paidbyData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $paidby 	  = $paidbyData['data'];
        return view('admin.paidby.index', compact(['mainmenu','menu','paidby']));
    }

    public function create() {
        abort_if(Gate::denies('paidby_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Paid By";
        return view("admin.paidby.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('paidby_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'PAIDBY' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "paidby";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Paid By has been inserted successfully!');
        return redirect('admin/paidby-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('paidby_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Paid By";
        $param['tag'] = "paidby";
        $param['id']  = $id;
        $paidbyData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($paidbyData['data']) && count($paidbyData['data']) > 0 && $paidbyData['success'] == 1) {
        	$paidby   = $paidbyData['data'][0];
	        return view('admin.paidby.edit',compact(['mainmenu','menu','paidby']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('paidby_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'PAIDBY' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "paidby";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Paid By has been updated successfully!');
        return redirect('admin/paidby-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('paidby_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "paidby";
    	$param['id']  = $request['delete_record_id'];
        $paidbyData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Paid By has been deleted successfully!');
        return redirect('admin/paidby-master');
    }
}

