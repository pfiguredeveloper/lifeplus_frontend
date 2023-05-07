<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use PDF;
use DB;
class ServicingReportsController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('servicing_reports_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Reports";
        $menu     	  = "Servicing Reports";
        $reportsData  = $this->lib->_sendPostRequest("/reports/get-servicing-reports");
        $reports      = $reportsData['data'];
        return view('admin.servicing-reports.index', compact(['mainmenu','menu','reports']));
    }

    public function edit($id) {
        $mainmenu     = "Reports";
        $menu         = "Servicing Reports";
        $param['id']  = $id;
        $reportsData  = $this->lib->_sendPostRequest("/reports/get-servicing-reports", $param);
        if(!empty($reportsData['data']) && count($reportsData['data']) > 0 && $reportsData['success'] == 1) {
            $time 			= strtotime("-1 year", time());
            $fromDate 		= ($id == "9" || $id == "10") ? '01/'.date("m/Y") : ($id=="5" ? date("d/m/Y") : date("d/m/Y", $time));
            $toDate         = date('d/m/Y');
            $reports        = $reportsData['data'];
            $filter         = !empty($reports['filter']) ? json_decode($reports['filter']) : '';
            $selectOption   = !empty($reports['select_option']) ? json_decode($reports['select_option']) : '';
            $redioOption    = !empty($reports['redio_option']) ? json_decode($reports['redio_option']) : '';
            $reportType     = !empty($reports['report_type']) ? json_decode($reports['report_type']) : '';
            $groupingOption = !empty($reports['grouping_option']) ? json_decode($reports['grouping_option']) : '';
            $orderingOption = !empty($reports['ordering_option']) ? json_decode($reports['ordering_option']) : '';
            return view('admin.servicing-reports.edit',compact(['mainmenu','menu','reports','filter','selectOption','redioOption','reportType','groupingOption','orderingOption','fromDate','toDate']));   
        }
        return abort(404,'oops Data found');
    }

    public function getFilterTableData($tableName) {
        $param['tag']   = $tableName;
        $tableData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $result         = !empty($tableData['data']) ? $tableData['data'] : [];
        return $result;
    }

    public function getReport(Request $request,$id) {
        $rData        = $request->all();
        $rData['id']  = $id;
        $data = '';
        if(!empty(\Auth::user()->c_id)) {
            $cId = \Auth::user()->c_id;
            $mIDdata = \DB::connection('lifecell_lic')->select("SELECT id FROM setup_servicing_reports where client_id = {$cId} limit 1");
            $param['id']  = !empty($mIDdata[0]) ? $mIDdata[0]->id : '';
            $reportsData  = $this->lib->_sendPostRequest("/reports/get-servicing-reports-setup", $param);
            $data         = !empty($reportsData['data']) ? $reportsData['data'] : '';
        }

        if(!empty($rData['select_do'])) {
            $rData['selectDo'] = explode(',', $rData['select_do']);
            unset($rData['select_do']);
        }
        if(!empty($rData['select_agency'])) {
            $rData['selectAgency'] = explode(',', $rData['select_agency']);
            unset($rData['select_agency']);
        }
        if(!empty($rData['select_area'])) {
            $rData['selectArea'] = explode(',', $rData['select_area']);
            unset($rData['select_area']);
        }
        if(!empty($rData['select_city'])) {
            $rData['selectCity'] = explode(',', $rData['select_city']);
            unset($rData['select_city']);
        }
        if(!empty($rData['select_branch'])) {
            $rData['selectBranch'] = explode(',', $rData['select_branch']);
            unset($rData['select_branch']);
        }
        if(!empty($rData['select_family_group'])) {
            $rData['selectFamilyGroup'] = explode(',', $rData['select_family_group']);
            unset($rData['select_family_group']);
        }
        if(!empty($rData['select_paidby'])) {
            $rData['selectPaidby'] = explode(',', $rData['select_paidby']);
            unset($rData['select_paidby']);
        }
        if(!empty($rData['select_bank'])) {
            $rData['selectBank'] = explode(',', $rData['select_bank']);
            unset($rData['select_bank']);
        }
        if(!empty($rData['select_doctor'])) {
            $rData['selectDoctor'] = explode(',', $rData['select_doctor']);
            unset($rData['select_doctor']);
        }
        if(!empty($rData['select_country'])) {
            $rData['selectCountry'] = explode(',', $rData['select_country']);
            unset($rData['select_country']);
        }
        if(!empty($rData['select_state'])) {
            $rData['selectState'] = explode(',', $rData['select_state']);
            unset($rData['select_state']);
        }
        if(!empty($rData['select_district'])) {
            $rData['selectDistrict'] = explode(',', $rData['select_district']);
            unset($rData['select_district']);
        }
        if(!empty($rData['select_party'])) {
            $rData['selectParty'] = explode(',', $rData['select_party']);
            unset($rData['select_party']);
        }
        info($rData);
        $idGet = [];
        if (!empty($rData['select'])) {
            foreach($rData['select'] as $key => $value) {
                $idGet[] = $key;
            }
            unset($rData['select']);
        }
        $rData['idss'] = $idGet;
        $printReports = $this->lib->_sendPostRequest("/reports/get-print-reports-data", $rData);
        $dData = !empty($printReports['data']) ? $printReports['data'] : '';
        $totalPrem = 0;
        if(!empty($dData)) {
            foreach($dData as $key => $value) {
                if(!empty($value['NAME1'])) {
                    $getPartyD = \DB::connection('lifecell_lic')->select("SELECT NAME,ABD,PHONE_O,PHONE_R,MOBILE,AD1,AD2,AD3 FROM party where GCODE = {$value['NAME1']} limit 1");
                    if (!empty($getPartyD[0])) {
                        $dData[$key]['Party'] = $getPartyD[0];
                    }
                }
                if(!empty($value['AFILE'])) {
                    $getAgencyD = \DB::connection('lifecell_lic')->select("SELECT ANAME FROM agency where AFILE = {$value['AFILE']} limit 1");
                    if (!empty($getAgencyD[0])) {
                        $dData[$key]['Agency'] = !empty($getAgencyD[0]->ANAME) ? $getAgencyD[0]->ANAME : '';
                    }
                }
                if(!empty($value['BCODE'])) {
                    $getBranchD = \DB::connection('lifecell_lic')->select("SELECT BRANCH FROM branch where BCODE = {$value['BCODE']} limit 1");
                    if (!empty($getBranchD[0])) {
                        $dData[$key]['Branch'] = !empty($getBranchD[0]->BRANCH) ? $getBranchD[0]->BRANCH : '';
                    }
                }

                if(in_array($id, [2, 5])) {
                    $totalPrem += $value['PREM'];
                }
            }
        }
        if(in_array($id, [8,7,3])) {
            $dData = $this->groupArray($dData, "AFILE", false, true);
        }
        $from_date    = $request['from_date'];
        $to_date      = $request['to_date'];
        $pdf = App::make('dompdf.wrapper');
        $para = $request->all();
        info($dData);
        if(!empty($dData)) {
            if($id == 1) {
                $pdf = PDF::loadView('admin.servicing-reports.new_business',compact('data','dData','from_date','to_date'));
            } else if($id == 2) {
                $pdf = PDF::loadView('admin.servicing-reports.premium_due_report',compact('data','dData','from_date','to_date','totalPrem','para'));
            } else if($id == 3) {
                $pdf = PDF::loadView('admin.servicing-reports.fully_paid_policy_report',compact('data','dData','from_date','to_date'));
            } else if($id == 4) {
                $pdf = PDF::loadView('admin.servicing-reports.due_loan_report',compact('data','dData','from_date','to_date'));
            } else if($id == 5) {
                $pdf = PDF::loadView('admin.servicing-reports.lapse_report',compact('data','dData','from_date','to_date','totalPrem'));
            } else if($id == 6) {
                $pdf = PDF::loadView('admin.servicing-reports.money_back_report',compact('data','dData','from_date','to_date'));
            } else if($id == 7) {
                $pdf = PDF::loadView('admin.servicing-reports.dab_report',compact('data','dData','from_date','to_date'));
            } else if($id == 8) {
                $pdf = PDF::loadView('admin.servicing-reports.maturity_report',compact('data','dData','from_date','to_date'));
            } else if($id == 9) {
                $pdf = PDF::loadView('admin.servicing-reports.birthday_report',compact('data','dData','from_date','to_date'));
            } else if($id == 10) {
                $pdf = PDF::loadView('admin.servicing-reports.weddingday_report',compact('data','dData','from_date','to_date'));
            } else if($id == 12) {
                $SA = 0;
                $AD1 = '';
                $AD2 = '';
                $AD3 = '';
                $PREM = 0;
                $MOBILE = '';
                $PHONE_R = '';
                $PARTY_ABD = '';
                $PARTY_NAME = '';
                $policy_month = [];
                $temp_policy_list = [];    
                $to_date1 = \Carbon\Carbon::createFromFormat('d/m/Y',$to_date)->format('Y-m-d');
                $from_date1 = \Carbon\Carbon::createFromFormat('d/m/Y',$from_date)->format('Y-m-d');
                $mode_list = [
                    "Yearly"=>"Y",
                    "Half Yearly"=>"H",
                    "Quarterly"=>"Q",
                    "Monthly"=>"M",
                    "SSS"=>"S"
                ];
                $mode_month_list = [
                    "Yearly"=>12,
                    "Half Yearly"=>6,
                    "Quarterly"=>3,
                    "Monthly"=>1,
                    "SSS"=>1
                ];
                $date_list = [];
                $interval = date_diff(date_create($from_date1),date_create($to_date1));
                $total_month = $interval->format("%m") + 12*$interval->format("%y");
                for($i=0;$i<=$total_month;$i++) { 
                    $date_list[] = date("Y-m",strtotime("+".$i." month",strtotime($from_date1)));                    
                }
                $temp_policy_list = [];
                $all_date = [];
                foreach($dData as $key=>$val) {
                    foreach($val as $value) {
                    $temp_date = [];
                        $mode  = $mode_list[$value["MODE"]] ?? '';
                        $mode_month  = $mode_month_list[$value["MODE"]] ?? 0;
                        $date = $value["RDT"]; 
                        $last_date = $value["LASTPREM"];
                        if($last_date > $from_date1) {
                            while($to_date1 > $date ) {
                                if(!in_array(date("Y-m",strtotime($date)),$all_date)) {
                                    $all_date[] = date("Y-m",strtotime($date));
                                }
                                if(in_array(date("Y-m",strtotime($date)),$date_list)) {
                                    $temp_date[] = date("Y-m",strtotime($date));
                                }
                                $date = date("Y-m-d", strtotime("+".$mode_month." month",strtotime($date)));
                            }
                        }
                        $temp_policy_list[$key][] = [
                            "family_name"=>@$value["family_name"],
                            "MODE"=>$mode,
                            "NAME"=>$value["NAME"],
                            "MOBILE"=>$value["MOBILE"],
                            "PHONE_R"=>$value["PHONE_R"],
                            "SA"=>$value["SA"],
                            "AD"=>$value["AD"],
                            "AD2"=>$value["AD2"],
                            "AD3"=>$value["AD3"],
                            "ABD"=>$value["ABD"],
                            "PREM"=>$value["PREM"],
                            "RDT"=>$value["RDT"],
                            "PREM"=>$value["PREM"],
                            "LASTPREM"=>$last_date,
                            "PONO"=>$value["PONO"],
                            "temp_date"=>$temp_date,
                            "MODE_MONTH"=>$mode_month,
                            "PLAN_TERM"=>(($value['PLAN'] ?? 0).'/'.($value['TERM'] ?? 0).'/'.($value['MTERM'] ?? 0))
                        ];
                    }
                }
                
                $pdf = PDF::loadView('admin.servicing-reports.premium_cal_report',compact('data','dData','from_date','to_date','rData','temp_policy_list','total_month','from_date1','all_date'));
             } else if($id == 13) {
                $pdf = PDF::loadView('admin.servicing-reports.cash_flow_report',compact('data','dData','from_date','to_date'));
            } else if($id == 14) {
                $pdf = PDF::loadView('admin.servicing-reports.cash_in_out_report',compact('data','dData','from_date','to_date'));
            } else if($id == 15) {
                $pdf = PDF::loadView('admin.servicing-reports.compreshensive_report',compact('data','dData','from_date','to_date'));
            } else if($id == 24) {
                $mode_list = [
                    "Yearly"=>"Y",
                    "Half Yearly"=>"H",
                    "Quarterly"=>"Q",
                    "Monthly"=>"M",
                    "SSS"=>"S"
                ];

                
                //return view('admin.servicing-reports.policy_list',compact('data','dData','rData','from_date','to_date','mode_list'));
                $pdf = PDF::loadView('admin.servicing-reports.policy_list',compact('data','dData','from_date','to_date','mode_list','rData'));
            }
            return $pdf->stream();
        }
        return "";
    }

    public function groupArray($arr, $group, $preserveGroupKey = false, $preserveSubArrays = false) {
        $temp = array();
        foreach($arr as $key => $value) {
            $groupValue = $value[$group];
            if(!$preserveGroupKey)
            {
                unset($arr[$key][$group]);
            }
            if(!array_key_exists($groupValue, $temp)) {
                $temp[$groupValue] = array();
            }

            if(!$preserveSubArrays){
                $data = count($arr[$key]) == 1? array_pop($arr[$key]) : $arr[$key];
            } else {
                $data = $arr[$key];
            }
            $temp[$groupValue][] = $data;
        }
        return $temp;
    }

    public function getReportD($id,Request $request) {
        return $this->getReport($request,$id);
        //return abort(404,'oops Data found');
    }


    public function getNewReport(Request $request,$id) {
        $rData              = $request->all();
        $rData['id']        = $id;
        $rData['from_date'] = !empty($rData['from_date']) ? $rData['from_date'] : '';
        $rData['to_date']   = !empty($rData['to_date']) ? $rData['to_date'] : '';
        $printReports       = $this->lib->_sendPostRequest("/reports/get-print-reports-data", $rData);
        $dData              = !empty($printReports['data']) ? $printReports['data'] : '';
        if(!empty($dData)) {
            foreach($dData as $key => $value) {
                if(!empty($value['NAME1'])) {
                    $getPartyD = \DB::connection('lifecell_lic')->select("SELECT NAME,ABD,PHONE_O,PHONE_R,MOBILE FROM party where GCODE = {$value['NAME1']} limit 1");
                    if (!empty($getPartyD[0])) {
                        $dData[$key]['Party'] = $getPartyD[0];
                    }
                }
            }
            return $dData;
        }

    }

    public function getNewReports(Request $request,$id)
	{
		$rData              	= $request->all();
        $rData['id']        	= $id;
        $rData['from_date'] 	= !empty($rData['from_date']) ? $rData['from_date'] : '';
        $rData['to_date']   	= !empty($rData['to_date']) ? $rData['to_date'] : '';
		$rData['param1']   		= !empty($rData['param1']) ? $rData['param1'] : '';
		$rData['param2']   		= !empty($rData['param2']) ? $rData['param2'] : '';
		
        $printReports      	 	= $this->lib->_sendPostRequest("/reports/get-print-reports-datas", $rData);
        $dData              	= !empty($printReports['data']) ? $printReports['data'] : '';
		
        if(!empty($dData)) {
            foreach($dData as $key => $value) {
                if(!empty($value['NAME1'])) {
                    $getPartyD = \DB::connection('lifecell_lic')->select("SELECT NAME,ABD,PHONE_O,PHONE_R,MOBILE FROM party where GCODE = {$value['NAME1']} limit 1");
                    if (!empty($getPartyD[0])) {
                        $dData[$key]['Party'] = $getPartyD[0];
                    }
                }
            }
            return $dData;
        }        
		/*$rData              = $request->all();
        $rData['id']        = $id;
        $rData['from_date'] = !empty($rData['from_date']) ? $rData['from_date'] : '';
        $rData['to_date']   = !empty($rData['to_date']) ? $rData['to_date'] : '';
        // $printReports       = $this->lib->_sendPostRequest("/reports/get-print-reports-datas", $rData);
        $printReports       = $this->lib->_sendPostRequest("/reports/get-print-reports-data", $rData);
		$dData              = !empty($printReports['data']) ? $printReports['data'] : '';
		
		if($rData['id'] == 9)
		{
			return $dData;
		}
		else if($rData['id'] == 10)
		{
			return $dData;
		}
		
        if(!empty($dData)) {
            foreach($dData as $key => $value) {
                // if(!empty($value['NAME1'])) {
                //     $getPartyD = \DB::connection('lifecell_lic')->select("SELECT NAME,ABD,PHONE_O,PHONE_R,MOBILE FROM party where GCODE = {$value['NAME1']} limit 1");
                //     if (!empty($getPartyD[0])) {
                //         //$dData[$key]['Party'] = $getPartyD[0];
                         
                //     }
                // }

        $polInfo2 = \DB::connection('lifecell_lic')->select("SELECT NAME,ABD,PHONE_O,PHONE_R,MOBILE FROM party where GCODE = {$value['NAME1']} ");
            
            $polInfo1  = !empty($polInfo2) ? $polInfo2['0'] : "";
            $polInfo = json_decode(json_encode($polInfo1), true);



                $fupdate=Date("Y-m-d", strtotime($rData['to_date']));

                $yes="yes";
        $riskdt=!empty($value['RDT']) ? Date("d/m/Y", strtotime($value['RDT'])) : '01/01/2000';
        $mode=!empty($value['MODE']) ? $value['MODE'] : 'Yearly';
        $terms=!empty($value['MTERM']) ? $value['MTERM'] : '5';
        $decide=0;
        $ar_month_year=explode("/",$riskdt);
        $day=$ar_month_year[0];
        $month=$ar_month_year[1];
        $year=$ar_month_year[2];
        $comination=[];
        $current_month=$month;
        $current_year=$year;
        $full_date=[];
        $test_full_date=array();
        $count=0;
        $count_days=0;
        $yearexist=[];

        
        array_push($yearexist,$year);
        $mat_date_object = (($year+$terms)."-".$month."-".$day);
       
        
        if($mode=="Monthly"){
            $max_value=12;
            $append_month=1;
            $decide = $max_value * $terms - 1;
        }else if($mode=="Quarterly"){
            $max_value=4;
            $append_month=3;
            $decide = $max_value * $terms - 1;
        }else if($mode=="Half Yearly"){
            $max_value=2;
            $append_month=6;
            $decide = $max_value * $terms - 1;
        }else if($mode=="Yearly"){
            $max_value=1;
            $append_month=12;
            $decide = $max_value * $terms - 1;
        }
        $count=0;
        $e='';

        

        $checkmonth='13';
        $fullyear=$year;
        $appenmonth=$month;
        $d = date('Y-m-d',strtotime((($year)."-".$month."-".$day)));
        // new Date($year, $month, $day);
        // echo $d;die();


        
        for($i=1;$i<=$decide;$i++)
        {
                if($mode == "Monthly" || $mode == "Half Yearly" || $mode == "Quarterly")
                {
                    //$d.setMonth($d.getMonth() + $append_month);
                    $d=Date("Y-m-d", strtotime($d."+".$append_month." Month"));
                }
                $count=$count + 1;
                $d=$d;
                $months=date('m',strtotime((($year+$terms)."-".$month."-".$day)));
                // $d.getMonth()
                $fullyear=date('Y',strtotime((($year+$terms)."-".$month."-".$day)));
                // $d.getFullYear();
                if($months == 0 && $mode != "Yearly")
                {
                    $months='12';
                    $fullyear=Date("Y",strtotime($d."+1 Month -1 Year"));
                    // fullyear=d.getFullYear() - 1;
                    date('Y',strtotime((($year+$terms)."-".$month."-".$day))) - 1;
                    // $d.getFullYear() - 1;
                }
                if($mode == "Yearly")
                {
                    
                    $d=Date("Y-m-d", strtotime($d."+".$append_month." Month"));
                    // echo $d;
                    
                    $fullyear=date('Y',strtotime((($year+$terms)."-".$month."-".$day)));
                    // $d.getFullYear();
                }

                
                if($months <= 9)
                {
                    $months="0"+$months;
                }

                if($value['FUPDATE'] <= $d)
                {
                    array_push($test_full_date,$d);    
                }
                
                
                
                
                

        }
        foreach ($test_full_date as $key => $value1) {
            $paymentdate=$value1;
            if($paymentdate < $fupdate)  
            {
                // $dData[$key]['premium'] = $paymentdate;
                // $dData[$key+1]['Party'] = $getPartyD[0];
                


                $dData[$key]['Party'] = array(
                                'NAME' => $polInfo['NAME'],
                                'PONO' => $value['PONO'],
                                'RDT' => $value['RDT'],
                                'PLAN' => $value['PLAN'],
                                'MODE' => $value['MODE'],
                                'PUNIQID' => $value['PUNIQID'],
                                'MOBILE' => $polInfo['MOBILE'],
                                'FUPDATEs' => date('Y-m-d',date(strtotime("+1 day", strtotime($paymentdate)))),
                                'FUPDATE' => $paymentdate,
                                'PREM' => $value['PREM'],
                                'sa' => $value['PREM'],
                                
                                
                            );
                

            }

        }




            }
        }
        return $dData;
        // return 0;*/
    }
}