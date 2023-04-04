<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Contact;
use Illuminate\Support\Str;

class PartyMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('party_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Party";
        $param['tag'] = "party";
        $partyData    = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $party 	      = $partyData['data'];
        return view('admin.party.index', compact(['mainmenu','menu','party']));
    }

    public function create() {
        abort_if(Gate::denies('party_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Party";

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

        $param3['tag']   = "status";
        $statusData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param3);
        $status1         = !empty($statusData['data']) ? $statusData['data'] : [];
        $status          = [];
        if(!empty($status1) && count($status1) > 0) {
            foreach ($status1 as $key => $value) {
                $status[$value['STATUS']] = $value['STATUS'];
            }
        }

        $param4['tag']     = "rela";
        $relationData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param4);
        $relation1         = !empty($relationData['data']) ? $relationData['data'] : [];
        $relation          = [];
        if(!empty($relation1) && count($relation1) > 0) {
            foreach ($relation1 as $key => $value) {
                $relation[$value['RELA']] = $value['RELA'];
            }
        }

        $param5['tag']   = "family_group";
        $familyData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param5);
        $family1         = !empty($familyData['data']) ? $familyData['data'] : [];
        $family          = [];
        if(!empty($family1) && count($family1) > 0) {
            foreach ($family1 as $key => $value) {
                $family[$value['GCODE']] = $value['GNM'];
            }
        }

        $param6['tag']   = "gender";
        $genderData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param6);
        $gender1         = !empty($genderData['data']) ? $genderData['data'] : [];
        $gender          = [];
        if(!empty($gender1) && count($gender1) > 0) {
            foreach ($gender1 as $key => $value) {
                $gender[$value['NAME']] = $value['NAME'];
            }
        }

        $param7['tag']   = "bank";
        $bankData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param7);
        $bank1         = !empty($bankData['data']) ? $bankData['data'] : [];
        $bank          = [];
        if(!empty($bank1) && count($bank1) > 0) {
            foreach ($bank1 as $key => $value) {
                if($key == 0) {
                    $bank[] = [
                        "Id"   => 0,
                        "Name" => ""
                    ];
                }
                $bank[] = [
                    "Id"   => $value['BANKCD'],
                    "Name" => $value['BANK']
                ];
            }
        }

        $prtWBnkDt     = '{}';

        $policySec = '1';
        return view("admin.party.add",compact(['mainmenu','menu','city','area','status','relation','family','gender','policySec','bank','prtWBnkDt']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('party_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'NAME'  => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "party";
        $param['is_edit'] = "0";
        unset($param['_token']);

        if ($photo = $request->file('PHOTO')) {
            $root = base_path() . '/public/resource/master/party/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/master/party/" . $name;
            $photo->move($root, $name);
            $param['PHOTO'] = $image_path;
        }

        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        return \Session::flash('success', 'Party has been inserted successfully!');
        //return redirect('admin/party-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('party_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Party";
        $param['tag'] = "party";
        $param['id']  = $id;
        $partyData    = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($partyData['data']) && count($partyData['data']) > 0 && $partyData['success'] == 1) {
        	$party   = $partyData['data'][0];

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

            $param3['tag']   = "status";
            $statusData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param3);
            $status1         = !empty($statusData['data']) ? $statusData['data'] : [];
            $status          = [];
            if(!empty($status1) && count($status1) > 0) {
                foreach ($status1 as $key => $value) {
                    $status[$value['STATUS']] = $value['STATUS'];
                }
            }

            $param4['tag']     = "rela";
            $relationData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param4);
            $relation1         = !empty($relationData['data']) ? $relationData['data'] : [];
            $relation          = [];
            if(!empty($relation1) && count($relation1) > 0) {
                foreach ($relation1 as $key => $value) {
                    $relation[$value['RELA']] = $value['RELA'];
                }
            }

            $param5['tag']   = "family_group";
            $familyData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param5);
            $family1         = !empty($familyData['data']) ? $familyData['data'] : [];
            $family          = [];
            if(!empty($family1) && count($family1) > 0) {
                foreach ($family1 as $key => $value) {
                    $family[$value['GCODE']] = $value['GNM'];
                }
            }

            $param6['tag']   = "gender";
            $genderData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param6);
            $gender1         = !empty($genderData['data']) ? $genderData['data'] : [];
            $gender          = [];
            if(!empty($gender1) && count($gender1) > 0) {
                foreach ($gender1 as $key => $value) {
                    $gender[$value['NAME']] = $value['NAME'];
                }
            }

            $param7['tag']   = "bank";
            $bankData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param7);
            $bank1         = !empty($bankData['data']) ? $bankData['data'] : [];
            $bank          = [];
            if(!empty($bank1) && count($bank1) > 0) {
                foreach ($bank1 as $key => $value) {
                    if($key == 0) {
                        $bank[] = [
                            "Id"   => 0,
                            "Name" => ""
                        ];
                    }
                    $bank[] = [
                        "Id"   => $value['BANKCD'],
                        "Name" => $value['BANK']
                    ];
                }
            }

            $prtWBnk = \DB::connection('lifecell_lic')->select("SELECT * FROM party_wise_bank where pcode = {$id}");
            $prtWBnkData = [];
            if (!empty($prtWBnk) && count($prtWBnk) > 0) {
                foreach ($prtWBnk as $key => $value) {
                    $prtWBnkData[] = $value;
                }
            }
            $prtWBnkDt      = '{}';
            if(!empty($prtWBnkData) && count($prtWBnkData) > 0) {
                $prtWBnkDt = json_encode($prtWBnkData);
            }

            $contact = Contact::where('tableName','party')->where('tableID',$id)->get();
            // $paramcontact['tag'] = 'contact';
            // $contactData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcontact);
            // $contact             = !empty($contactData['data']) ? $contactData['data'] : [];
            $policySec = '1';
	        return view('admin.party.edit',compact(['mainmenu','menu','party','city','area','status','relation','family','gender','contact','policySec','bank','prtWBnkDt']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('party_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'NAME'  => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "party";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);

        if ($photo = $request->file('PHOTO')) {
            $root = base_path() . '/public/resource/master/party/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/master/party/" . $name;
            $photo->move($root, $name);
            $param['PHOTO'] = $image_path;
        }

        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        return \Session::flash('success','Party has been updated successfully!');
        //return redirect('admin/party-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('party_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "party";
    	$param['id']  = $request['delete_record_id'];
        $partyData    = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Party has been deleted successfully!');
        return redirect('admin/party-master');
    }

    public function getFamilyAddress($id) {
        $param5['tag']   = "family_group";
        $param5['id']    = $id;
        $familyData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param5);
        $family          = !empty($familyData['data'][0]) ? $familyData['data'][0] : [];
        return $family;
    }
}

