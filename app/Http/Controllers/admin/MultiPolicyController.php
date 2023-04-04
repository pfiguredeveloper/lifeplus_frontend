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
use PDF;

class MultiPolicyController extends Controller
{
    public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('multipolicy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu    = "Reports";
        $menu        = "Multi Policy";
        $policyData  = $this->lib->_sendPostRequest("transaction/get-multi-policy");
        $policy      = $policyData['data'];
        return view('admin.multi-policy.index', compact(['mainmenu','menu','policy']));
    }

    public function create() {
        abort_if(Gate::denies('multipolicy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu  = "Reports";
        $menu      = "Multi Policy";
        $policySec = '1';
        
        $paramparty['tag'] = 'party';
        $partyData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramparty);
        $party             = !empty($partyData['data']) ? $partyData['data'] : [];
        $partyname         = [];
        if(!empty($party) && count($party) > 0) {
            foreach ($party as $key => $value) {
                $partyname[$value['GCODE']] = $value['NAME'];
            }
        }

        $paramagency['tag'] = 'agency';
        $agencyData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramagency);
        $agency             = !empty($agencyData['data']) ? $agencyData['data'] : [];
        $agencyname         = [];
        if(!empty($agency) && count($agency) > 0) {
            foreach ($agency as $key => $value) {
                $agencyname[$value['AFILE']] = $value['ANAME'];
            }
        }

        $planData = LifeCell::get();
        $plan     = [];
        if(!empty($planData) && count($planData) > 0) {
            foreach ($planData as $key => $value) {
                $plan[$value['plno']] = $value['plno'].'&nbsp;&nbsp; - '.$value['plannm'];
            }
        }

        $policy_json = '{}';
        
        return view("admin.multi-policy.add",compact(['mainmenu','menu','policySec','partyname','policy_json','agencyname','plan']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('multipolicy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $param            = $request->all();
        unset($param['_token']);
        $cId        = \Auth::user()->c_id;
        $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1");
        $param['policy_insurance_id'] = (!empty($clientData[0]) && $clientData[0]->policy_insurance_id) ? $clientData[0]->policy_insurance_id : 0;
        $this->lib->_sendPostRequest("transaction/save-multi-policy", $param);

        return \Session::flash('success', 'Multi Policy has been inserted successfully!');
    }

    public function ShowPresentation(Request $request) {
        $data = '';
        if(!empty(\Auth::user()->c_id)) {
            $cId = \Auth::user()->c_id;
            $mIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_servicing_reports where client_id = {$cId} limit 1");
            $param['id']  = !empty($mIDdata[0]) ? $mIDdata[0]->id : '';
            $reportsData  = $this->lib->_sendPostRequest("/reports/get-servicing-reports-setup", $param);
            $data         = !empty($reportsData['data']) ? $reportsData['data'] : '';
            
            if(!empty($data['cap1'])) {
                $cap1 = \DB::connection('lifecell_lic')->select("SELECT CAP1 FROM caption where client_id = {$cId} AND CAPCD = {$data['cap1']} limit 1");
                $data['cap1']  = !empty($cap1[0]) ? $cap1[0]->CAP1 : '';
            }
            if(!empty($data['cap2'])) {
                $cap2 = \DB::connection('lifecell_lic')->select("SELECT CAP1 FROM caption where client_id = {$cId} AND CAPCD = {$data['cap2']} limit 1");
                $data['cap2']  = !empty($cap2[0]) ? $cap2[0]->CAP1 : '';
            }
            $data['multipolicy'] = [];
            if(!empty($request['PUNIQID'])) {
                $multipolicy = \DB::connection('lifecell_lic')->select("SELECT * FROM multipol_riders where POLID = {$request['PUNIQID']}");
                if(!empty($multipolicy)) {
                    $data['multipolicy'] = $multipolicy;
                    foreach($multipolicy as $key => $value) {
                        $calParam = [
                            'plno'=>$value->PLAN,
                            'age'=>$value->AGE,
                            'mterm'=>$value->MTERM,
                            'pterm'=>$value->PTERM,
                            'sa'=>$value->BASIC_SA,
                            'dabsa'=>$value->DAB_SA,
                            'trsa'=>$value->TR_SA,
                            'cirsa'=>$value->CIR_SA,
                            'option'=>'M',
                            'waive'=>false,
                            'PropAge'=>$value->PROP_AGE,
                            'curr_year'=>2021,
                            'method'=>"GetPrentation",
                            'tax_benifit'=>0,
                            'bonus'=>$value->BONUS_RATE,
                            'daboption'=>$value->DAB_OPTION,
                            'DAB_CHECK'=>$value->DAB_CHECK,
                            'TR_CHECK'=>$value->TR_CHECK,
                            'CIR_CHECK'=>$value->CIR_CHECK,
                            'PWB_CHECK'=>$value->PWB_CHECK,
                            'SETT_CHECK'=>$value->SETT_CHECK,
                        ];
                        $getPremium     = $this->lib->_sendPostRequest("/calculation/premium-service", $calParam);
                        $data['getPremiumData'][] = !empty($getPremium['data']) ? $getPremium['data'] : '';
                    }
                }
            }
        }

        $data['report_color'] = $request['report_color'];
        $data['cash_value']   = !empty($request['cash_value']) ? 1 : 0;
        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('admin.multi-policy.presentation_report',compact('data'));
        
        return $pdf->stream();
    }

    public function edit($id) {
        abort_if(Gate::denies('multipolicy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 		 = "Reports";
        $menu     		 = "Multi Policy";
        $policySec 		 = '1';
        
        $param['id']  = $id;
        $policyData   = $this->lib->_sendPostRequest("transaction/get-multi-policy", $param);
        
        if(!empty($policyData['data']) && $policyData['success'] == 1) {
            $policy          = $policyData['data'];
            $policy_json     = '{}';
            if(!empty($policy['multi_policy_riders']) && count($policy['multi_policy_riders']) > 0) {
                $policy_json = json_encode($policy['multi_policy_riders']);
            }
            
            $paramparty['tag'] = 'party';
            $partyData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramparty);
            $party             = !empty($partyData['data']) ? $partyData['data'] : [];
            $partyname         = [];
            if(!empty($party) && count($party) > 0) {
                foreach ($party as $key => $value) {
                    $partyname[$value['GCODE']] = $value['NAME'];
                }
            }

            $paramagency['tag'] = 'agency';
            $agencyData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramagency);
            $agency             = !empty($agencyData['data']) ? $agencyData['data'] : [];
            $agencyname         = [];
            if(!empty($agency) && count($agency) > 0) {
                foreach ($agency as $key => $value) {
                    $agencyname[$value['AFILE']] = $value['ANAME'];
                }
            }

            $planData = LifeCell::get();
            $plan     = [];
            if(!empty($planData) && count($planData) > 0) {
                foreach ($planData as $key => $value) {
                    $plan[$value['plno']] = $value['plno'].'&nbsp;&nbsp; - '.$value['plannm'];
                }
            }

            return view('admin.multi-policy.edit',compact(['mainmenu','menu','policySec','partyname','agencyname','policy','plan','policy_json']));
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('multipolicy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $param            = $request->all();
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $cId        = \Auth::user()->c_id;
        $clientData = \DB::connection('lifecell_users')->select("SELECT * FROM tbl_client where c_id = {$cId} limit 1");
        $param['policy_insurance_id'] = (!empty($clientData[0]) && $clientData[0]->policy_insurance_id) ? $clientData[0]->policy_insurance_id : 0;
        $this->lib->_sendPostRequest("transaction/save-multi-policy", $param);

        return \Session::flash('success','Multi Policy has been updated successfully!');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('multipolicy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $param['id']  = $request['delete_record_id'];
        $this->lib->_sendPostRequest("transaction/delete-multi-policy", $param);

        \Session::flash('danger','Multi Policy has been deleted successfully!');
        return redirect('admin/multi-policy');
    }
}

