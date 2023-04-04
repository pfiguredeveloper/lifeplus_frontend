<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class RelationMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('relation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Relation";
        $param['tag'] = "rela";
        $relationData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $relation 	  = $relationData['data'];
        return view('admin.relation.index', compact(['mainmenu','menu','relation']));
    }

    public function create() {
        abort_if(Gate::denies('relation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Relation";
        return view("admin.relation.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('relation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'RELA'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "rela";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Relation has been inserted successfully!');
        return redirect('admin/relation-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('relation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Relation";
        $param['tag'] = "rela";
        $param['id']  = $id;
        $relationData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($relationData['data']) && count($relationData['data']) > 0 && $relationData['success'] == 1) {
        	$relation   = $relationData['data'][0];
	        return view('admin.relation.edit',compact(['mainmenu','menu','relation']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('relation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'RELA'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "rela";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Relation has been updated successfully!');
        return redirect('admin/relation-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('relation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "rela";
    	$param['id']  = $request['delete_record_id'];
        $relationData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Relation has been deleted successfully!');
        return redirect('admin/relation-master');
    }
}

