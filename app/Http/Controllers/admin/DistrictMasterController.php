<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DistrictMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('district_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "District";
        $param['tag'] = "district";
        $districtData    = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $district 	      = $districtData['data'];
        return view('admin.district.index', compact(['mainmenu','menu','district']));
    }

    public function create() {
        abort_if(Gate::denies('district_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "District";

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
        return view("admin.district.add",compact(['mainmenu','menu','country','state']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('district_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DISTRICT'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "district";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'District has been inserted successfully!');
        return redirect('admin/district-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('district_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "District";
        $param['tag'] = "district";
        $param['id']  = $id;
        $districtData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($districtData['data']) && count($districtData['data']) > 0 && $districtData['success'] == 1) {
        	$district   = $districtData['data'][0];

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

	        return view('admin.district.edit',compact(['mainmenu','menu','district','country','state']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('district_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DISTRICT'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "district";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','District has been updated successfully!');
        return redirect('admin/district-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('district_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "district";
    	$param['id']  = $request['delete_record_id'];
        $districtData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','District has been deleted successfully!');
        return redirect('admin/district-master');
    }
}

