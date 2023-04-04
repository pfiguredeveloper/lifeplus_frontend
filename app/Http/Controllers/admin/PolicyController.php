<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Policy;
use App\Http\Controllers\Controller;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Library\Api;
use App\LifeCell;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    public $lib;

    public function __construct()
    {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index()
    {
        abort_if(Gate::denies('policy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu = "Transaction";
        $menu     = "Policy";
        $policyData  = $this->lib->_sendPostRequest("/transaction/get-policy");
        $policy      = $policyData['data'];
        return view('admin.policy.index', compact(['mainmenu', 'menu', 'policy']));
    }

    public function create()
    {
        abort_if(Gate::denies('policy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu  = "Transaction";
        $menu      = "Policy";
        $policySec = '1';
        $polNominee = '{}';
        $polBOC     = '{}';

        $parambank['tag'] = 'bank';
        $bankData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambank);
        $bank           = !empty($bankData['data']) ? $bankData['data'] : [];
        $bankname       = [];
        if (!empty($bank) && count($bank) > 0) {
            foreach ($bank as $key => $value) {
                $bankname[$value['BANKCD']] = $value['BANK'];
            }
        }

        $paramparty['tag'] = 'party';
        $partyData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramparty);
        $party           = !empty($partyData['data']) ? $partyData['data'] : [];
        $partyname       = [];
        if (!empty($party) && count($party) > 0) {
            foreach ($party as $key => $value) {
                $partyname[$value['GCODE']] = $value['NAME'];
            }
        }

        $paramagency['tag'] = 'agency';
        $agencyData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramagency);
        $agency           = !empty($agencyData['data']) ? $agencyData['data'] : [];
        $agencyname       = [];
        if (!empty($agency) && count($agency) > 0) {
            foreach ($agency as $key => $value) {
                $agencyname[$value['AFILE']] = $value['ANAME'];
            }
        }

        $paramdoctor['tag'] = 'doctor';
        $doctorData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramdoctor);
        $doctor           = !empty($doctorData['data']) ? $doctorData['data'] : [];
        $doctorname       = [];
        if (!empty($doctor) && count($doctor) > 0) {
            foreach ($doctor as $key => $value) {
                $doctorname[$value['DCODE']] = $value['DOCTOR'];
            }
        }

        $paramcity['tag'] = "city";
        $cityData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcity);
        $city1            = !empty($cityData['data']) ? $cityData['data'] : [];
        $city             = [];
        if (!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        $planData = LifeCell::get();
        $plan     = [];
        if (!empty($planData) && count($planData) > 0) {
            foreach ($planData as $key => $value) {
                $plan[$value['plno']] = $value['plno'] . '&nbsp;&nbsp; - ' . $value['plannm'];
            }
        }

        return view("admin.policy.add", compact(['mainmenu', 'menu', 'policySec', 'bankname', 'partyname', 'agencyname', 'doctorname', 'polNominee', 'polBOC', 'plan', 'city']));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('policy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $param = $request->all();

        unset($param['_token']);

        if ($photo = $request->file('SIGN')) {
            $root = base_path() . '/public/resource/policy/signature/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/policy/signature/" . $name;
            $photo->move($root, $name);
            $param['SIGN'] = $image_path;
        }

        $cId        = \Auth::user()->c_id;
        $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1");
        $param['policy_insurance_id'] = (!empty($clientData[0]) && $clientData[0]->policy_insurance_id) ? $clientData[0]->policy_insurance_id : 0;

        $a=$this->lib->_sendPostRequest("/transaction/save-policy", $param);

        
        return \Session::flash('success', 'Policy has been inserted successfully!');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mainmenu     = "Transaction";
        $menu         = "Policy";
        $policySec    = '1';
        $param['id']  = $id;
        $policyData   = $this->lib->_sendPostRequest("/transaction/get-policy", $param);
        

        if (!empty($policyData['data']) && $policyData['success'] == 1) {
            $policy          = $policyData['data'];
            $polNominee      = '{}';
            if (!empty($policy['pol_nominee']) && count($policy['pol_nominee']) > 0) {
                $polNominee = json_encode($policy['pol_nominee']);
            }

            $polBOC      = '{}';
            if (!empty($policy['pol_boc']) && count($policy['pol_boc']) > 0) {
                $polBOC = json_encode($policy['pol_boc']);
            }

            $parambank['tag'] = 'bank';
            $bankData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambank);
            $bank           = !empty($bankData['data']) ? $bankData['data'] : [];
            $bankname       = [];
            if (!empty($bank) && count($bank) > 0) {
                foreach ($bank as $key => $value) {
                    $bankname[$value['BANKCD']] = $value['BANK'];
                }
            }

            $paramparty['tag'] = 'party';
            $partyData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramparty);
            $party           = !empty($partyData['data']) ? $partyData['data'] : [];
            $partyname       = [];
            if (!empty($party) && count($party) > 0) {
                foreach ($party as $key => $value) {
                    $partyname[$value['GCODE']] = $value['NAME'];
                }
            }

            $paramagency['tag'] = 'agency';
            $agencyData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramagency);
            $agency           = !empty($agencyData['data']) ? $agencyData['data'] : [];
            $agencyname       = [];
            if (!empty($agency) && count($agency) > 0) {
                foreach ($agency as $key => $value) {
                    $agencyname[$value['AFILE']] = $value['ANAME'];
                }
            }

            $paramdoctor['tag'] = 'doctor';
            $doctorData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramdoctor);
            $doctor           = !empty($doctorData['data']) ? $doctorData['data'] : [];
            $doctorname       = [];
            if (!empty($doctor) && count($doctor) > 0) {
                foreach ($doctor as $key => $value) {
                    $doctorname[$value['DCODE']] = $value['DOCTOR'];
                }
            }

            $paramcity['tag'] = "city";
            $cityData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcity);
            $city1            = !empty($cityData['data']) ? $cityData['data'] : [];
            $city             = [];
            if (!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

            $planData = LifeCell::get();
            $plan     = [];
            if (!empty($planData) && count($planData) > 0) {
                foreach ($planData as $key => $value) {
                    $plan[$value['plno']] = $value['plno'] . '&nbsp;&nbsp; - ' . $value['plannm'];
                }
            }

            return view('admin.policy.edit', compact(['mainmenu', 'menu', 'policySec', 'partyname', 'agencyname', 'bankname', 'doctorname', 'policy', 'polNominee', 'polBOC', 'plan', 'city']));
        }
        return abort(404, 'oops Data found');
    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $param            = $request->all();
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);

        if ($photo = $request->file('SIGN')) {
            $root = base_path() . '/public/resource/policy/signature/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/policy/signature/" . $name;
            $photo->move($root, $name);
            $param['SIGN'] = $image_path;
        }

        $cId        = \Auth::user()->c_id;
        $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1");
        $param['policy_insurance_id'] = (!empty($clientData[0]) && $clientData[0]->policy_insurance_id) ? $clientData[0]->policy_insurance_id : 0;

        $this->lib->_sendPostRequest("/transaction/save-policy", $param);

        return \Session::flash('success', 'Policy has been updated successfully!');
    }

    public function destroy(Request $request)
    {
        abort_if(Gate::denies('policy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $param['id']  = $request['delete_record_id'];
        $this->lib->_sendPostRequest("/transaction/delete-policy", $param);

        \Session::flash('danger', 'Policy has been deleted successfully!');
        return redirect('admin/policy');
    }

    public function getAgencyCode($id)
    {
        $param['tag']   = "agency";
        $param['id']    = $id;
        $agencyData     = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $data           = !empty($agencyData['data'][0]) ? $agencyData['data'][0] : [];
        return $data;
    }

    public function getPartyBirthDay($id)
    {
        $param['tag']   = "party";
        $param['id']    = $id;
        $partyData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $data           = !empty($partyData['data'][0]) ? $partyData['data'][0] : [];
        return $data;
    }

    public function getECSDetail($id)
    {
        $param['tag']  = "bank";
        $param['id']   = $id;
        $ECSData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $data          = !empty($ECSData['data'][0]) ? $ECSData['data'][0] : [];
        return $data;
    }

    public function getCalDetail(Request $request)
    {
        $param  = $request->all();
        $param['plan'] = $request['Plan'];
        unset($param['_token']);

        //Get Age
        $getAge     = $this->lib->_sendPostRequest("/calculation/get-age", $param);
        $getAgeData = !empty($getAge['data'][0]) ? $getAge['data'][0] : '';

        //Get MTearm
        $getMTerm     = $this->lib->_sendPostRequest("/calculation/get-mterm", $param);
        $getMTermData = !empty($getMTerm['data'][0]) ? $getMTerm['data'][0] : '';

        //Get PTearm
        $getPTerm     = $this->lib->_sendPostRequest("/calculation/get-pterm", $param);
        $getPTermData = !empty($getPTerm['data'][0]) ? $getPTerm['data'][0] : '';

        //Get Mode
        $getMode     = $this->lib->_sendPostRequest("/calculation/get-mode", $param);
        $getModeData = !empty($getMode['data'][0]) ? $getMode['data'][0] : '';
        $valmod      = !empty($getModeData['valmod']) ? str_split($getModeData['valmod']) : '';

        //Get Plan
        $getPlan     = $this->lib->_sendPostRequest("/calculation/get-plans", $param);
        $getPlanData = !empty($getPlan['data']) ? $getPlan['data'] : '';

        $getSaOption     = $this->lib->_sendPostRequest("/calculation/get-sa-option", $param);
        $getSaOptionData = !empty($getSaOption['data']) ? $getSaOption['data'] : '';
        //dd($getSaOptionData);
        $calData = [
            "getAgeData"   => $getAgeData,
            "getMTermData" => $getMTermData,
            "getPTermData" => $getPTermData,
            "getModeData"  => $valmod,
            "getPlanData"  => $getPlanData,
            "getSaOptionData" => $getSaOptionData
        ];
        return $calData;
    }

    public function getPlanDetail(Request $request)
    {
        $param  = $request->all();
        $param['plan'] = $request['Plan'];
        unset($param['_token']);

        //Get Plan
        $getPlan     = $this->lib->_sendPostRequest("/calculation/get-plans", $param);
        $getPlanData = !empty($getPlan['data']) ? $getPlan['data'] : '';

        if (!empty($request['ageCheck'])) {
            //Get MTearm
            $getMTerm     = $this->lib->_sendPostRequest("/calculation/get-mterm", $param);
            $getMTermData = !empty($getMTerm['data'][0]) ? $getMTerm['data'][0] : '';

            $calData = [
                "getPlanData"  => $getPlanData,
                "getMTermData" => $getMTermData,
            ];
            return $calData;
        } else {
            $calData = [
                "getPlanData"  => $getPlanData,
            ];
            return $calData;
        }
    }

    public function getPremiumPrentation(Request $request)
    {
        $param  = $request->all();
        unset($param['_token']);

        $getPremium     = $this->lib->_sendPostRequest("/calculation/premium-service", $param);
        $getPremiumData = !empty($getPremium['data']) ? $getPremium['data'] : '';
        return $getPremiumData;
    }

    public function savePolicyInsurance(Request $request)
    {
        $param  = $request->all();
        unset($param['_token']);
        $this->lib->_sendPostRequest("/transaction/save-policy-insurance", $param);
        return redirect()->back();
    }
}
