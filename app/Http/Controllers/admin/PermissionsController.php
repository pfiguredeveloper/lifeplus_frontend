<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PermissionsController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('permissions_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	     = "Client";
        $menu     	     = "Permissions";
        $permissionsData = $this->lib->_sendPostRequest("/client/get-permissions");
        $permissions 	 = $permissionsData['data'];
        return view('admin.permissions.index', compact(['mainmenu','menu','permissions']));
    }

    public function create() {
        abort_if(Gate::denies('permissions_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Client";
        $menu     	  = "Permissions";
        return view("admin.permissions.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('permissions_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'title' => 'required',
        ]);

        $param            = $request->all();
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/client/save-permissions", $param);

        \Session::flash('success', 'Permissions has been inserted successfully!');
        return redirect('admin/permissions');
    }

    public function edit($id) {
        abort_if(Gate::denies('permissions_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	     = "Client";
        $menu     	     = "Permissions";
        $param['id']     = $id;
        $permissionsData = $this->lib->_sendPostRequest("/client/get-permissions", $param);
        if(!empty($permissionsData['data']) && $permissionsData['success'] == 1) {
        	$permissions = $permissionsData['data'];
	        return view('admin.permissions.edit',compact(['mainmenu','menu','permissions']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('permissions_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'title' => 'required',
        ]);

        $param            = $request->all();
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/client/save-permissions", $param);

        \Session::flash('success','Permissions has been updated successfully!');
        return redirect('admin/permissions');
    }

    public function destroy($id) {
        abort_if(Gate::denies('permissions_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['id'] = $id;
        $this->lib->_sendPostRequest("/client/delete-permissions", $param);

        \Session::flash('danger','Permissions has been deleted successfully!');
        return redirect('admin/permissions');
    }
}

