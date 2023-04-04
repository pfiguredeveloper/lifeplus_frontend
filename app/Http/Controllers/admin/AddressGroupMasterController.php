<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AddressGroupMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        
        abort_if(Gate::denies('addgroup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainmenu 	  = "Master";
        $menu     	  = "Address Group";
        $param['tag'] = "addgroup";
        $addgroupData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $addgroup 	  = $addgroupData['data'];
        return view('admin.addgroup.index', compact(['mainmenu','menu','addgroup']));
    }

    public function create() {
        abort_if(Gate::denies('addgroup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainmenu 	  = "Master";
        $menu     	  = "Address Group";
        return view("admin.addgroup.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('addgroup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'ADDGROUP'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "addgroup";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        \Session::flash('success', 'Address Group has been inserted successfully!');
        return redirect('admin/addgroup-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('addgroup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainmenu 	  = "Master";
        $menu     	  = "Address Group";
        $param['tag'] = "addgroup";
        $param['id']  = $id;
        $addgroupData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($addgroupData['data']) && count($addgroupData['data']) > 0 && $addgroupData['success'] == 1) {
        	$addgroup   = $addgroupData['data'][0];
	        return view('admin.addgroup.edit',compact(['mainmenu','menu','addgroup']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('addgroup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'ADDGROUP'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "addgroup";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Address Group has been updated successfully!');
        return redirect('admin/addgroup-master');
    }

    public function destroy($id) {
        
        abort_if(Gate::denies('addgroup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    	$param['tag'] = "addgroup";
    	$param['id']  = $id;
        $addgroupData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Address Group has been deleted successfully!');
        return redirect('admin/addgroup-master');
    }
}

