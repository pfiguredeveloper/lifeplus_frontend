<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class LoanEntryController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function create() {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Transaction";
        $menu         = "Loan Entry";
        return view("admin.loan-entry.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('area_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'pono' => 'required',
        ]);

        $param  = $request->all();
        unset($param['_token']);
        $this->lib->_sendPostRequest("transaction/save-loan-entry", $param);

        \Session::flash('success', 'Loan has been inserted successfully!');
        return redirect('admin/loan-entry/create');
    }
}

