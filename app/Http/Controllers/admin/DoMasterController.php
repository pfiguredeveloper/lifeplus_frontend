<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DoMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('do_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Developement Office";
        $param['tag'] = "do";
        $doData 	  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $do 		  = $doData['data'];
        return view('admin.do.index', compact(['mainmenu','menu','do']));
    }

    public function create() {
        abort_if(Gate::denies('do_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Developement Office";
        $startMonth	  = ["january"=>"January","february"=>"February","march"=>"March","april"=>"April","may"=>"May","june"=>"June","july"=>"July","august"=>"August","september"=>"September","october"=>"October","november"=>"November","december"=>"December"];
        return view("admin.do.add",compact(['mainmenu','menu','startMonth']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('do_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DONAME'    => 'required',
            'DO_CODE'   => 'required',
            'APP_MONTH' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "do";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Developement Office has been inserted successfully!');
        return redirect('admin/do-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('do_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Developement Office";
        $param['tag'] = "do";
        $param['id']  = $id;
        $doData 	  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($doData['data']) && count($doData['data']) > 0 && $doData['success'] == 1) {
        	$do 		  = $doData['data'][0];
	        $startMonth	  = ["january"=>"January","february"=>"February","march"=>"March","april"=>"April","may"=>"May","june"=>"June","july"=>"July","august"=>"August","september"=>"September","october"=>"October","november"=>"November","december"=>"December"];
	        return view('admin.do.edit',compact(['mainmenu','menu','do','startMonth']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('do_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DONAME'    => 'required',
            'DO_CODE'   => 'required',
            'APP_MONTH' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "do";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Developement Office has been updated successfully!');
        return redirect('admin/do-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('do_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "do";
    	$param['id']  = $request['delete_record_id'];
        $doData 	  = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Developement Office has been deleted successfully!');
        return redirect('admin/do-master');
    }
}

