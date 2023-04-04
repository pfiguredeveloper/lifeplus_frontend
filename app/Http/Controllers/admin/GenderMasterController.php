<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class GenderMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('gender_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Gender";
        $param['tag'] = "gender";
        $genderData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $gender 	  = $genderData['data'];
        return view('admin.gender.index', compact(['mainmenu','menu','gender']));
    }

    public function create() {
        abort_if(Gate::denies('gender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Gender";
        return view("admin.gender.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('gender_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'NAME'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "gender";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Gender has been inserted successfully!');
        return redirect('admin/gender-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('gender_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Gender";
        $param['tag'] = "gender";
        $param['id']  = $id;
        $genderData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($genderData['data']) && count($genderData['data']) > 0 && $genderData['success'] == 1) {
        	$gender   = $genderData['data'][0];
	        return view('admin.gender.edit',compact(['mainmenu','menu','gender']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('gender_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'NAME'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "gender";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        \Session::flash('success','Gender has been updated successfully!');
        return redirect('admin/gender-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('gender_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "gender";
    	$param['id']  = $request['delete_record_id'];
        $genderData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Gender has been deleted successfully!');
        return redirect('admin/gender-master');
    }
}

