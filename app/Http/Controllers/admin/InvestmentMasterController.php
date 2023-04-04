<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class InvestmentMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('investment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Investment";
        $param['tag'] = "invest";
        $investmentData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $investment 	  = $investmentData['data'];
        return view('admin.investment.index', compact(['mainmenu','menu','investment']));
    }

    public function create() {
        abort_if(Gate::denies('investment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Investment";
        return view("admin.investment.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {

        $this->validate($request, [
            'INVESTMENT'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "invest";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Investment has been inserted successfully!');
        return redirect('admin/investment-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('investment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Investment";
        $param['tag'] = "invest";
        $param['id']  = $id;
        $investmentData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($investmentData['data']) && count($investmentData['data']) > 0 && $investmentData['success'] == 1) {
        	$investment   = $investmentData['data'][0];
	        return view('admin.investment.edit',compact(['mainmenu','menu','investment']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {

        $this->validate($request, [
            'INVESTMENT'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "invest";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        \Session::flash('success','Investment has been updated successfully!');
        return redirect('admin/investment-master');
    }

    public function destroy($id) {
        abort_if(Gate::denies('investment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "invest";
    	$param['id']  = $id;
        $investmentData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Investment has been deleted successfully!');
        return redirect('admin/investment-master');
    }
}

