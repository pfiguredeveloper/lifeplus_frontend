<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CommissionEntryController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function create() {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Transaction";
        $menu     	  = "Commission Entry";

        $paramagency['tag'] = 'agency';
        $agencyData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramagency);
        $agency           = !empty($agencyData['data']) ? $agencyData['data'] : [];
        $agencyname       = [];
        if(!empty($agency) && count($agency) > 0) {
            foreach ($agency as $key => $value) {
                $agencyname[$value['AFILE']] = $value['ANAME'];
            }
        }

        return view("admin.commission-entry.add",compact(['mainmenu','menu','agencyname']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'ARE1' => 'required',
        ]);

        $param            = $request->all();
        unset($param['_token']);
        $this->lib->_sendPostRequest("transaction/save-commission-entry", $param);

        \Session::flash('success', 'Commission has been inserted successfully!');
        return redirect('admin/commission-entry/create');
    }

    public function autoCommission() {
        $param['client_id'] = \Auth::user()->c_id;
        $data               = $this->lib->_sendPostRequest("/commission/auto-commission", $param);
        \Session::flash('success', 'Auto Commission has been inserted successfully!');
        return redirect('admin/commission-entry/create');
    }
}

