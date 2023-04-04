<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;

class ModelDataController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function addModelRecord(Request $request) {
        $param            = $request->all();
        $param['tag']     = $param['type'];
        $param['is_edit'] = "0";
        unset($param['_token']);
        unset($param['type']);
        $data = $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        return $data;
    }

    public function getCityModelRecord() {
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

        $param3['tag']  = "city";
        $cityData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param3);
        $city1          = !empty($cityData['data']) ? $cityData['data'] : [];
        $city           = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        $param4['tag']    = "gender";
        $genderData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param4);
        $gender1          = !empty($genderData['data']) ? $genderData['data'] : [];
        $gender           = [];
        if(!empty($gender1) && count($gender1) > 0) {
            foreach ($gender1 as $key => $value) {
                $gender[$value['NAME']] = $value['NAME'];
            }
        }

        $param5['tag']  = "area";
        $areaData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param5);
        $area1          = !empty($areaData['data']) ? $areaData['data'] : [];
        $area           = [];
        if(!empty($area1) && count($area1) > 0) {
            foreach ($area1 as $key => $value) {
                $area[$value['ARECD']] = $value['ARE1'];
            }
        }

        $data = [
            "country"  => $country,
            "state"    => $state,
            "district" => $district,
            "city"     => $city,
            "gender"   => $gender,
            "area"     => $area,
        ];
        return $data;
    }

    public function getSMSModelRecord() {
        $param1['tag']  = "smsformat";
        $smsData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $sms1          = !empty($smsData['data']) ? $smsData['data'] : [];
        $sms           = [];
        if(!empty($sms1) && count($sms1) > 0) {
            foreach ($sms1 as $key => $value) {
                $sms[$value['SMSID']] = $value['MESSAGETITLE'];
            }
        }

        $data = [
            "sms"     => $sms
        ];
        return $data;
    }

    public function getSMSDetailsRecord($id) {
        $param1['tag']  = "smsformat";
        $param1['id']   = $id;
        $smsData        = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        if(!empty($smsData['data']) && $smsData['success'] == 1) {
            $smsformat   = $smsData['data'][0];
            return $smsformat;
        }
        return "";
    }
}

