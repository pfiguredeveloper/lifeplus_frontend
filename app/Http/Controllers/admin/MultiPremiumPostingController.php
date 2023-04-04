<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate,DB;
use Symfony\Component\HttpFoundation\Response;

class MultiPremiumPostingController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }
    public function index() {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu     = "Transaction";
        $mainmenusub  = "Premium Posting";
        $menu         = "Multi Premium Posting";
        $cId         = \Auth::user()->c_id;
        $lists = DB::connection('lifecell_lic')->select("SELECT ledger.id,ledger.paiddt,ledger.prem,ledger.mode,party.NAME,pol.PONO FROM ledger 
            LEFT JOIN pol ON pol.PUNIQID = ledger.puniqid
            LEFT JOIN party ON pol.NAME1=party.GCODE WHERE ledger.is_delete=0 ORDER BY ledger.id DESC");
        return view("admin.multi-premium.index",compact(['mainmenu','menu','mainmenusub','lists']));
    }

    public function create() {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu     = "Transaction";
        $mainmenusub  = "Premium Posting";
        $menu         = "Multi Premium Posting";
        $currentMonth = date('d/m/Y');
        $filter = ["do"=>"do","agency"=>"agency","family_group"=>"family_group","area"=>"area","city"=>"city"];
        return view("admin.multi-premium.add",compact(['mainmenu','menu','mainmenusub','filter','currentMonth']));
    }

    public function store(Request $request) {
        info("Start Multi Premium Posting");
        info($request->all());        
        info("End Multi Premium Posting");
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        

        $param  = $request->all();
        unset($param['_token']);

        $a=$this->lib->_sendPostRequest("transaction/save-multi-premium-posting", $param);
        \Session::flash('success', 'Multi Premium Posting has been Add successfully!');
        return redirect('admin/multi-premium-posting/create');
    }
}

