<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SurnameMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('surname_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Surname";
        $param['tag'] = "surname";
        $surnameData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $surname 	  = $surnameData['data'];
        return view('admin.surname.index', compact(['mainmenu','menu','surname']));
    }

    public function create() {
        abort_if(Gate::denies('surname_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Surname";
        return view("admin.surname.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('surname_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'SURNAME'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "surname";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Surname has been inserted successfully!');
        return redirect('admin/surname-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('surname_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Surname";
        $param['tag'] = "surname";
        $param['id']  = $id;
        $surnameData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($surnameData['data']) && count($surnameData['data']) > 0 && $surnameData['success'] == 1) {
        	$surname   = $surnameData['data'][0];
	        return view('admin.surname.edit',compact(['mainmenu','menu','surname']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('surname_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'SURNAME'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "surname";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Surname has been updated successfully!');
        return redirect('admin/surname-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('surname_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "surname";
    	$param['id']  = $request['delete_record_id'];
        $surnameData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Surname has been deleted successfully!');
        return redirect('admin/surname-master');
    }
}

