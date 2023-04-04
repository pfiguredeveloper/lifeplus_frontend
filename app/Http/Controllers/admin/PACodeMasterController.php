<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PACodeMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('pacode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "P.A. Code";
        $param['tag'] = "pacode";
        $pacodeData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $pacode 	  = $pacodeData['data'];
        return view('admin.pacode.index', compact(['mainmenu','menu','pacode']));
    }

    public function create() {
        abort_if(Gate::denies('pacode_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "P.A. Code";
        return view("admin.pacode.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('pacode_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'PACODE'   => 'required',
            'PACODENM' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "pacode";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'P.A. Code has been inserted successfully!');
        return redirect('admin/pacode-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('pacode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "P.A. Code";
        $param['tag'] = "pacode";
        $param['id']  = $id;
        $pacodeData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($pacodeData['data']) && count($pacodeData['data']) > 0 && $pacodeData['success'] == 1) {
        	$pacode   = $pacodeData['data'][0];
	        return view('admin.pacode.edit',compact(['mainmenu','menu','pacode']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('pacode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'PACODE'   => 'required',
            'PACODENM' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "pacode";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','P.A. Code has been updated successfully!');
        return redirect('admin/pacode-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('pacode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "pacode";
    	$param['id']  = $request['delete_record_id'];
        $pacodeData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','P.A. Code has been deleted successfully!');
        return redirect('admin/pacode-master');
    }
}

