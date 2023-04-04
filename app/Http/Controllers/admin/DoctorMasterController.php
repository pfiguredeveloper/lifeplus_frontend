<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DoctorMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Doctor";
        $param['tag'] = "doctor";
        $doctorData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $doctor 	  = $doctorData['data'];
        return view('admin.doctor.index', compact(['mainmenu','menu','doctor']));
    }

    public function create() {
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Doctor";

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

        return view("admin.doctor.add",compact(['mainmenu','menu','city','area']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DOCTOR'     => 'required',
            'DOC_CODE'   => 'required',
            'STATUS' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "doctor";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Doctor has been inserted successfully!');
        return redirect('admin/doctor-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Doctor";
        $param['tag'] = "doctor";
        $param['id']  = $id;
        $doctorData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($doctorData['data']) && count($doctorData['data']) > 0 && $doctorData['success'] == 1) {
        	$doctor   = $doctorData['data'][0];

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

	        return view('admin.doctor.edit',compact(['mainmenu','menu','doctor','city','area']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DOCTOR'     => 'required',
            'DOC_CODE'   => 'required',
            'STATUS' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "doctor";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        \Session::flash('success','Doctor has been updated successfully!');
        return redirect('admin/doctor-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "doctor";
    	$param['id']  = $request['delete_record_id'];
        $doctorData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Doctor has been deleted successfully!');
        return redirect('admin/doctor-master');
    }
}

