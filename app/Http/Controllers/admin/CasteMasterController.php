<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CasteMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('caste_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Caste";
        $param['tag'] = "caste";
        $casteData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $caste 	  = $casteData['data'];
        return view('admin.caste.index', compact(['mainmenu','menu','caste']));
    }

    public function create() {
        abort_if(Gate::denies('caste_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Caste";
        return view("admin.caste.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('caste_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'CASTE'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "caste";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Caste has been inserted successfully!');
        return redirect('admin/caste-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('caste_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Caste";
        $param['tag'] = "caste";
        $param['id']  = $id;
        $casteData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($casteData['data']) && count($casteData['data']) > 0 && $casteData['success'] == 1) {
        	$caste   = $casteData['data'][0];
	        return view('admin.caste.edit',compact(['mainmenu','menu','caste']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('caste_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'CASTE'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "caste";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Caste has been updated successfully!');
        return redirect('admin/caste-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('caste_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "caste";
    	$param['id']  = $request['delete_record_id'];
        $casteData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Caste has been deleted successfully!');
        return redirect('admin/caste-master');
    }
}

