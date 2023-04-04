<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CityMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('city_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "City";
        $param['tag'] = "city";
        $cityData     = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $city 	      = $cityData['data'];
        return view('admin.city.index', compact(['mainmenu','menu','city']));
    }

    public function create() {
        abort_if(Gate::denies('city_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "City";

        $param['tag'] = "country";
        $countryData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $country1      = !empty($countryData['data']) ? $countryData['data'] : [];
        $country       = [];
        if(!empty($country1) && count($country1) > 0) {
            foreach ($country1 as $key => $value) {
                $country[$value['COUNTRYID']] = $value['COUNTRY'];
            }
        }

        $param1['tag'] = "state";
        $stateData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $state1      = !empty($stateData['data']) ? $stateData['data'] : [];
        $state       = [];
        if(!empty($state1) && count($state1) > 0) {
            foreach ($state1 as $key => $value) {
                $state[$value['STATEID']] = $value['STATE'];
            }
        }

        $param2['tag'] = "district";
        $districtData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
        $district1      = !empty($districtData['data']) ? $districtData['data'] : [];
        $district       = [];
        if(!empty($district1) && count($district1) > 0) {
            foreach ($district1 as $key => $value) {
                $district[$value['DISTRICTID']] = $value['DISTRICT'];
            }
        }

        return view("admin.city.add",compact(['mainmenu','menu','country','state','district']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('city_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'CITY'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "city";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'City has been inserted successfully!');
        return redirect('admin/city-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('city_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "City";
        $param['tag'] = "city";
        $param['id']  = $id;
        $cityData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($cityData['data']) && count($cityData['data']) > 0 && $cityData['success'] == 1) {
        	$city   = $cityData['data'][0];

            $param1['tag'] = "country";
            $countryData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $country1      = !empty($countryData['data']) ? $countryData['data'] : [];
            $country       = [];
            if(!empty($country1) && count($country1) > 0) {
                foreach ($country1 as $key => $value) {
                    $country[$value['COUNTRYID']] = $value['COUNTRY'];
                }    
            }

            $param2['tag'] = "state";
            $stateData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
            $state1      = !empty($stateData['data']) ? $stateData['data'] : [];
            $state       = [];
            if(!empty($state1) && count($state1) > 0) {
                foreach ($state1 as $key => $value) {
                    $state[$value['STATEID']] = $value['STATE'];
                }
            }

            $param3['tag']  = "district";
            $districtData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param3);
            $district1      = !empty($districtData['data']) ? $districtData['data'] : [];
            $district       = [];
            if(!empty($district1) && count($district1) > 0) {
                foreach ($district1 as $key => $value) {
                    $district[$value['DISTRICTID']] = $value['DISTRICT'];
                }
            }

	        return view('admin.city.edit',compact(['mainmenu','menu','city','country','state','district']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('city_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'CITY'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "city";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','City has been updated successfully!');
        return redirect('admin/city-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('city_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "city";
    	$param['id']  = $request['delete_record_id'];
        $cityData     = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','City has been deleted successfully!');
        return redirect('admin/city-master');
    }
}

