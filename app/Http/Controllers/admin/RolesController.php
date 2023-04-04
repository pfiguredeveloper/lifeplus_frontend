<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('roles_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Client";
        $menu     	  = "Roles";
        $rolesData 	  = $this->lib->_sendPostRequest("/client/get-roles");
        $roles 		  = $rolesData['data'];
        return view('admin.roles.index', compact(['mainmenu','menu','roles']));
    }

    public function create() {
        abort_if(Gate::denies('roles_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Client";
        $menu     	  = "Roles";

        $permissionsData = $this->lib->_sendPostRequest("/client/get-permissions");
        $permissions1    = !empty($permissionsData['data']) ? $permissionsData['data'] : [];
        $permissions     = [];
        if(!empty($permissions1) && count($permissions1) > 0) {
            foreach ($permissions1 as $key => $value) {
                $permissions[$value['id']] = $value['title'];
            }
        }

        return view("admin.roles.add",compact(['mainmenu','menu','permissions']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('roles_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'title'       => 'required',
            'permissions' => 'required',
        ]);

        $param            = $request->all();
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/client/save-roles", $param);

        \Session::flash('success', 'Roles has been inserted successfully!');
        return redirect('admin/roles');
    }

    public function edit($id) {
        abort_if(Gate::denies('roles_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Client";
        $menu     	  = "Roles";
        $param['id']  = $id;
        $rolesData 	  = $this->lib->_sendPostRequest("/client/get-roles", $param);

        if(!empty($rolesData['data']['role']) && $rolesData['success'] == 1) {
        	$roles = $rolesData['data']['role'];

            $permissionsData = $this->lib->_sendPostRequest("/client/get-permissions");
            $permissions1    = !empty($permissionsData['data']) ? $permissionsData['data'] : [];
            $permissions     = [];
            if(!empty($permissions1) && count($permissions1) > 0) {
                foreach ($permissions1 as $key => $value) {
                    $permissions[$value['id']] = $value['title'];
                }
            }
            $permissions_selected = $rolesData['data']['perRole'];
	        return view('admin.roles.edit',compact(['mainmenu','menu','roles','permissions','permissions_selected']));
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('roles_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'title'       => 'required',
            'permissions' => 'required',
        ]);

        $param            = $request->all();
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/client/save-roles", $param);

        \Session::flash('success','Roles has been updated successfully!');
        return redirect('admin/roles');
    }

    public function destroy($id) {
        abort_if(Gate::denies('roles_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/client/delete-roles", $param);

        \Session::flash('danger','Roles has been deleted successfully!');
        return redirect('admin/roles');
    }
}

