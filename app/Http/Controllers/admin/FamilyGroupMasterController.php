<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FamilyGroupMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('familygroup_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	      = "Master";
        $menu     	      = "Family Group";
        $param['tag']     = "family_group";
        $familygroupData  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $familygroup 	  = $familygroupData['data'];
        return view('admin.familygroup.index', compact(['mainmenu','menu','familygroup']));
    }

    public function create() {
        abort_if(Gate::denies('familygroup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Family Group";

        $param1['tag'] = "city";
        $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
        $city          = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        $param2['tag'] = "area";
        $areaData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
        $area1         = !empty($areaData['data']) ? $areaData['data'] : [];
        $area          = [];
        if(!empty($area1) && count($area1) > 0) {
            foreach ($area1 as $key => $value) {
                $area[$value['ARECD']] = $value['ARE1'];
            }
        }

        return view("admin.familygroup.add",compact(['mainmenu','menu','city','area']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('familygroup_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'GNM'     => 'required',
            'GEMAIL'  => 'required|email',
        ]);

        $param            = $request->all();
        $param['tag']     = "family_group";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Family Group has been inserted successfully!');
        return redirect('admin/familygroup-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('familygroup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Family Group";
        $param['tag'] = "family_group";
        $param['id']  = $id;
        $familygroupData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($familygroupData['data']) && count($familygroupData['data']) > 0 && $familygroupData['success'] == 1) {
        	$familygroup   = $familygroupData['data'][0];

            $param1['tag'] = "city";
            $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
            $city          = [];
            if(!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

            $param2['tag'] = "area";
            $areaData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
            $area1         = !empty($areaData['data']) ? $areaData['data'] : [];
            $area          = [];
            if(!empty($area1) && count($area1) > 0) {
                foreach ($area1 as $key => $value) {
                    $area[$value['ARECD']] = $value['ARE1'];
                }
            }

	        return view('admin.familygroup.edit',compact(['mainmenu','menu','familygroup','city','area']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('familygroup_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'GNM'     => 'required',
            'GEMAIL'  => 'required|email',
        ]);

        $param            = $request->all();
        $param['tag']     = "family_group";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Family Group has been updated successfully!');
        return redirect('admin/familygroup-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('familygroup_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag']      = "family_group";
    	$param['id']       = $request['delete_record_id'];
        $familygroupData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Family Group has been deleted successfully!');
        return redirect('admin/familygroup-master');
    }
}

