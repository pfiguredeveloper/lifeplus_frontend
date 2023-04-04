<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AreaMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('area_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Area";
        $param['tag'] = "area";
        $areaData 	  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $area 		  = $areaData['data'];
        return view('admin.area.index', compact(['mainmenu','menu','area']));
    }

    public function create() {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Area";
        return view("admin.area.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'ARE1' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "area";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Area has been inserted successfully!');
        return redirect('admin/area-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('area_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Area";
        $param['tag'] = "area";
        $param['id']  = $id;
        $areaData 	  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($areaData['data']) && count($areaData['data']) > 0 && $areaData['success'] == 1) {
        	$area 		  = $areaData['data'][0];
	        return view('admin.area.edit',compact(['mainmenu','menu','area']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('area_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'ARE1' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "area";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Area has been updated successfully!');
        return redirect('admin/area-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('area_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "area";
    	$param['id']  = $request['delete_record_id'];
        $areaData 	  = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Area has been deleted successfully!');
        return redirect('admin/area-master');
    }
}

