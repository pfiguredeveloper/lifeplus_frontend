<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DivisionMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('division_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	     = "Master";
        $menu     	     = "Division";
        $param['tag']    = "division";
        $divisionData 	 = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $division 		 = $divisionData['data'];
        return view('admin.division.index', compact(['mainmenu','menu','division']));
    }

    public function create() {
        abort_if(Gate::denies('division_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Division";
        return view("admin.division.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('division_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'division' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "division";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Division has been inserted successfully!');
        return redirect('admin/division-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('division_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Division";
        $param['tag'] = "division";
        $param['id']  = $id;
        $divisionData 	  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($divisionData['data']) && count($divisionData['data']) > 0 && $divisionData['success'] == 1) {
        	$division 		  = $divisionData['data'][0];
	        return view('admin.division.edit',compact(['mainmenu','menu','division']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('division_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'division' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "division";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Division has been updated successfully!');
        return redirect('admin/division-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('division_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "division";
    	$param['id']  = $request['delete_record_id'];
        $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Division has been deleted successfully!');
        return redirect('admin/division-master');
    }
}

