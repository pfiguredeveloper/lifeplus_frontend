<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Api;
use App\ClientWiseMenuSetup;
use App\SetupReminder;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        $data['menu'] 	  = "Dashboard";
        $data['policy']   = 10;

        //Menu Setup Start
        $cId            = \Auth::user()->c_id;
        $clientWiseMenu = \DB::connection('lifecell_lic')->select("SELECT * FROM client_wise_menu_setup where client_id = {$cId} AND quick_menu = 1");

        $getMenu = [];
        if(!empty($clientWiseMenu) && count($clientWiseMenu) > 0) {
            foreach($clientWiseMenu as $key => $value) {
                $clientMenu = \DB::connection('lifecell_users')->select("SELECT * FROM main_menus where id = {$value->menu_id} AND parent_id != 0 AND menu_enabled = 1 AND product_id = 7 limit 1");
                if(!empty($clientMenu[0])) {
                    $getMenu[] = [
                        'id'                    => !empty($clientMenu[0]->id) ? $clientMenu[0]->id : "",
                        'menu_name'             => !empty($clientMenu[0]->menu_name) ? $clientMenu[0]->menu_name : "",
                        'menu_url'              => !empty($clientMenu[0]->menu_url) ? $clientMenu[0]->menu_url : "",
                        'icon'                  => !empty($clientMenu[0]->icon) ? $clientMenu[0]->icon : "",
                        'parent_id'             => !empty($clientMenu[0]->parent_id) ? $clientMenu[0]->parent_id : 0,
                        'quick_menu_ordering'   => !empty($value->quick_menu_ordering) ? $value->quick_menu_ordering : 0,
                        'font_color'            => !empty($value->font_color) ? $value->font_color : "#666",
                        'back_color'            => !empty($value->back_color) ? $value->back_color : "#f4f4f4",
                    ];
                }
            }
        }

        if(!empty($getMenu)) {
            array_multisort(array_column($getMenu, 'quick_menu_ordering'), SORT_ASC, $getMenu);
        }
        $data['getMenu']   = $getMenu;

        $clientQuickWiseMenu = \DB::connection('lifecell_lic')->select("SELECT * FROM client_wise_menu_setup where client_id = {$cId}");
        $getQuickMenu = [];
        if(!empty($clientQuickWiseMenu) && count($clientQuickWiseMenu) > 0) {
            foreach($clientQuickWiseMenu as $key => $value) {
                $clientQuickMenu = \DB::connection('lifecell_users')->select("SELECT * FROM main_menus where id = {$value->menu_id} AND parent_id != 0 AND menu_enabled = 1 AND product_id = 7 limit 1");
                if(!empty($clientQuickMenu[0])) {
                    $getQuickMenu[] = [
                        'id'          => !empty($value->id) ? $value->id : "",
                        'menu_name'   => !empty($clientQuickMenu[0]->menu_name) ? $clientQuickMenu[0]->menu_name : "",
                        'quick_menu'  => !empty($value->quick_menu) ? $value->quick_menu : "",
                    ];
                }
            }
        }

        if(!empty($getQuickMenu)) {
            array_multisort(array_column($getQuickMenu, 'quick_menu'), SORT_DESC, $getQuickMenu);
        }
        $data['getQuickMenu']   = $getQuickMenu;
        //Menu Setup End

        //Reminder Setup
        $reportsData         = $this->lib->_sendPostRequest("/reports/get-all-reminder-setup-data");
        $data['reportsData'] = $reportsData['data'];
        //echo "<pre>";print_r($data);echo "</pre>";exit();
        return view('admin.dashboard',$data);
    }

    public function saveQuickMenu(Request $request) {
        $param = $request->all();
        unset($param['_token']);
        $idGet = [];
        if (!empty($param)) {
            foreach($param as $key => $value) {
                $idG     = explode("_", $key);
                $idGet[] = $idG[0];
            }
        }

        $cId          = \Auth::user()->c_id;
        $saveQuickMenu = ClientWiseMenuSetup::where('client_id',$cId)->get();
        if(!empty($saveQuickMenu) && count($saveQuickMenu) > 0) {
            foreach($saveQuickMenu as $key => $value) {
                $value['quick_menu'] = 0;
                $value->save();
            }
        }

        if(!empty($idGet) && count($idGet) > 0) {
            $getQuickMenu = ClientWiseMenuSetup::wherein('id',$idGet)->where('client_id',$cId)->get();
            if(!empty($getQuickMenu) && count($getQuickMenu) > 0) {
                foreach($getQuickMenu as $key => $value) {
                    $value['quick_menu'] = 1;
                    $value->save();
                }
            }
        }

        return redirect('admin/dashboard');
    }

    public function getReminderFields($id,$field) {
        $reminder = \DB::connection('lifecell_lic')->select("SELECT * FROM setup_reminder where id = {$id} limit 1");
        
        if($field == 'birthday_rm') {
            $field1 = 'birthday_rm';
            $field2 = 'birthday_rm_bf';
            $field3 = 'birthday_rm_af';
            $field2Value = !empty($reminder[0]->birthday_rm_bf) ? $reminder[0]->birthday_rm_bf : 0;
            $field3Value = !empty($reminder[0]->birthday_rm_af) ? $reminder[0]->birthday_rm_af : 0;
            $fieldTitle  = 'Birthday Reminder';
        } else if($field == 'agent_birthday_rm') {
            $field1 = 'agent_birthday_rm';
            $field2 = 'agent_birthday_rm_bf';
            $field3 = 'agent_birthday_rm_af';
            $field2Value = !empty($reminder[0]->agent_birthday_rm_bf) ? $reminder[0]->agent_birthday_rm_bf : 0;
            $field3Value = !empty($reminder[0]->agent_birthday_rm_af) ? $reminder[0]->agent_birthday_rm_af : 0;
            $fieldTitle  = 'Agent Birthday Reminder';
        } else if($field == 'marriage_ann_rm') {
            $field1 = 'marriage_ann_rm';
            $field2 = 'marriage_ann_rm_bf';
            $field3 = 'marriage_ann_rm_af';
            $field2Value = !empty($reminder[0]->marriage_ann_rm_bf) ? $reminder[0]->marriage_ann_rm_bf : 0;
            $field3Value = !empty($reminder[0]->marriage_ann_rm_af) ? $reminder[0]->marriage_ann_rm_af : 0;
            $fieldTitle  = 'Marriage Ann. Reminder';
        } else if($field == 'fup_rm') {
            $field1 = 'fup_rm';
            $field2 = 'fup_rm_bf';
            $field3 = 'fup_rm_af';
            $field2Value = !empty($reminder[0]->fup_rm_bf) ? $reminder[0]->fup_rm_bf : 0;
            $field3Value = !empty($reminder[0]->fup_rm_af) ? $reminder[0]->fup_rm_af : 0;
            $fieldTitle  = 'FUP Reminder';
        } else if($field == 'term_insurance_rm') {
            $field1 = 'term_insurance_rm';
            $field2 = 'term_insurance_rm_bf';
            $field3 = 'term_insurance_rm_af';
            $field2Value = !empty($reminder[0]->term_insurance_rm_bf) ? $reminder[0]->term_insurance_rm_bf : 0;
            $field3Value = !empty($reminder[0]->term_insurance_rm_af) ? $reminder[0]->term_insurance_rm_af : 0;
            $fieldTitle  = 'Term Insurance Reminder';
        } else if($field == 'ulip_plan_rm') {
            $field1 = 'ulip_plan_rm';
            $field2 = 'ulip_plan_rm_bf';
            $field3 = 'ulip_plan_rm_af';
            $field2Value = !empty($reminder[0]->ulip_plan_rm_bf) ? $reminder[0]->ulip_plan_rm_bf : 0;
            $field3Value = !empty($reminder[0]->ulip_plan_rm_af) ? $reminder[0]->ulip_plan_rm_af : 0;
            $fieldTitle  = 'ULIP Plan Reminder';
        } else if($field == 'agency_expiry_rm') {
            $field1 = 'agency_expiry_rm';
            $field2 = 'agency_expiry_rm_bf';
            $field3 = 'agency_expiry_rm_af';
            $field2Value = !empty($reminder[0]->agency_expiry_rm_bf) ? $reminder[0]->agency_expiry_rm_bf : 0;
            $field3Value = !empty($reminder[0]->agency_expiry_rm_af) ? $reminder[0]->agency_expiry_rm_af : 0;
            $fieldTitle  = 'Agency Expiry Reminder';
        } else if($field == 'licence_expiry_rm') {
            $field1 = 'licence_expiry_rm';
            $field2 = 'licence_expiry_rm_bf';
            $field3 = 'licence_expiry_rm_af';
            $field2Value = !empty($reminder[0]->licence_expiry_rm_bf) ? $reminder[0]->licence_expiry_rm_bf : 0;
            $field3Value = !empty($reminder[0]->licence_expiry_rm_af) ? $reminder[0]->licence_expiry_rm_af : 0;
            $fieldTitle  = 'Licence. Expiry Reminder';
        } else if($field == 'last_renew_rm') {
            $field1 = 'last_renew_rm';
            $field2 = 'last_renew_rm_bf';
            $field3 = 'last_renew_rm_af';
            $field2Value = !empty($reminder[0]->last_renew_rm_bf) ? $reminder[0]->last_renew_rm_bf : 0;
            $field3Value = !empty($reminder[0]->last_renew_rm_af) ? $reminder[0]->last_renew_rm_af : 0;
            $fieldTitle  = 'Last Renew Reminder';
        } else if($field == 'to_do_rm') {
            $field1 = 'to_do_rm';
            $field2 = 'to_do_rm_bf';
            $field3 = 'to_do_rm_af';
            $field2Value = !empty($reminder[0]->to_do_rm_bf) ? $reminder[0]->to_do_rm_bf : 0;
            $field3Value = !empty($reminder[0]->to_do_rm_af) ? $reminder[0]->to_do_rm_af : 0;
            $fieldTitle  = 'TO Do Reminder';
        } else if($field == 'health_plan_rm') {
            $field1 = 'health_plan_rm';
            $field2 = 'health_plan_rm_bf';
            $field3 = 'health_plan_rm_af';
            $field2Value = !empty($reminder[0]->health_plan_rm_bf) ? $reminder[0]->health_plan_rm_bf : 0;
            $field3Value = !empty($reminder[0]->health_plan_rm_af) ? $reminder[0]->health_plan_rm_af : 0;
            $fieldTitle  = 'Health Plan Reminder';
        } else if($field == 'maturity_rm') {
            $field1 = 'maturity_rm';
            $field2 = 'maturity_rm_bf';
            $field3 = 'maturity_rm_af';
            $field2Value = !empty($reminder[0]->maturity_rm_bf) ? $reminder[0]->maturity_rm_bf : 0;
            $field3Value = !empty($reminder[0]->maturity_rm_af) ? $reminder[0]->maturity_rm_af : 0;
            $fieldTitle  = 'Maturity Reminder';
        } else if($field == 'money_back_rm') {
            $field1 = 'money_back_rm';
            $field2 = 'money_back_rm_bf';
            $field3 = 'money_back_rm_af';
            $field2Value = !empty($reminder[0]->money_back_rm_bf) ? $reminder[0]->money_back_rm_bf : 0;
            $field3Value = !empty($reminder[0]->money_back_rm_af) ? $reminder[0]->money_back_rm_af : 0;
            $fieldTitle  = 'Money Back Reminder';
        }

        $data = [
            'field1' => $field1,
            'field2' => $field2,
            'field3' => $field3,
            'field2Value' => $field2Value,
            'field3Value' => $field3Value,
            'fieldTitle'  => $fieldTitle,
        ];

        return $data;
    }

    public function saveReminderFilter(Request $request) {
        $param = $request->all();
        unset($param['_token']);
        if (!empty($param)) {
            $reminder = SetupReminder::where('id',$param['reminder_id'])->first();
            unset($param['reminder_id']);
            foreach($param as $key => $value) {
                $reminder[$key] = $value;
                $reminder->save();
            }
            return redirect('admin/dashboard');
        }
        return redirect('admin/dashboard');
    }

    public function getReminderReport(Request $request) {
        
    }
}

