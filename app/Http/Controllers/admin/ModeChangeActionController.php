<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use DB;

class ModeChangeActionController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function create() {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Transaction";
        $menu     	  = "Mode Change Action";
        return view("admin.mode-change.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'pono' => 'required',
        ]);

        $param            = $request->all();
        unset($param['_token']);
        $this->lib->_sendPostRequest("transaction/save-mode-change-action", $param);

        \Session::flash('success', 'Mode has been successfully changed!');
        return redirect('admin/mode-change-action/create');
    }

    public function getPolicyNoWiseData($PONO) {
        $pol = DB::connection('lifecell_lic')->select("SELECT * FROM pol where PONO = {$PONO} limit 1");
        $data['pol'] = !empty($pol) ? $pol : '';
        if (!empty($pol[0]) && !empty($pol[0]->NAME1)) {
            $name = DB::connection('lifecell_lic')->select("SELECT NAME FROM party where GCODE = {$pol[0]->NAME1} limit 1");
            $data['name'] = !empty($name[0]) ? $name[0]->NAME : '';
        }

        if (!empty($pol[0]) && !empty($pol[0]->PLAN)) {
            //Get Mode
            $param['plan'] = $pol[0]->PLAN;
            $getMode     = $this->lib->_sendPostRequest("/calculation/get-mode", $param);
            $getModeData = !empty($getMode['data'][0]) ? $getMode['data'][0] : '';
            $data['getModeData'] = !empty($getModeData['valmod']) ? str_split($getModeData['valmod']) : '';
        }

        return $data;
    }
}

