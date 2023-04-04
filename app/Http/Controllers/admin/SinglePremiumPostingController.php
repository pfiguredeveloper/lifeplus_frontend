<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use DB;
use Symfony\Component\HttpFoundation\Response;

class SinglePremiumPostingController extends Controller
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
        $menu         = "Single Premium Posting";
        $cId         = \Auth::user()->c_id;
        $lists = DB::connection('lifecell_lic')->select("SELECT ledger.id,ledger.paiddt,ledger.prem,ledger.mode,party.NAME,pol.PONO FROM ledger 
            LEFT JOIN pol ON pol.PUNIQID = ledger.puniqid
            LEFT JOIN party ON pol.NAME1=party.GCODE WHERE ledger.is_delete=0 ORDER BY ledger.id DESC");
        return view("admin.single-premium.index",compact(['mainmenu','menu','mainmenusub','lists']));
    }

    public function create() {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Transaction";
        $mainmenusub  = "Premium Posting";
        $menu         = "Single Premium Posting";

        $cId         = \Auth::user()->c_id;
        $lastRecordD = DB::connection('lifecell_lic')->select("SELECT * FROM ledger where client_id = {$cId} ORDER BY id DESC limit 1");
        $lastRecord  = !empty($lastRecordD[0]) ? $lastRecordD[0] : "";
        return view("admin.single-premium.add",compact(['mainmenu','menu','mainmenusub','lastRecord']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'pono' => 'required',
        ]);

        $param  = $request->all();
        unset($param['_token']);


        $a=$this->lib->_sendPostRequest("transaction/save-single-premium-posting", $param);
        
        \Session::flash('success', 'Single Premium Posting has been Add successfully!');
        return redirect('admin/single-premium-posting/create');
    }
}

