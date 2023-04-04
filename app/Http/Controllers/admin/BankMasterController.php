<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BankMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Bank";
        $param['tag'] = "bank";
        $bankData     = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $bank 	      = $bankData['data'];
        return view('admin.bank.index', compact(['mainmenu','menu','bank']));
    }

    public function create() {
        abort_if(Gate::denies('bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Bank";

        $param1['tag'] = "city";
        $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
        $city          = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        return view("admin.bank.add",compact(['mainmenu','menu','city']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'BANK'     => 'required',
            'BANKBR'   => 'required',
            'BANKMICR' => 'required',
            'BANKIFS'  => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "bank";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Bank has been inserted successfully!');
        return redirect('admin/bank-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Bank";
        $param['tag'] = "bank";
        $param['id']  = $id;
        $bankData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($bankData['data']) && count($bankData['data']) > 0 && $bankData['success'] == 1) {
        	$bank   = $bankData['data'][0];

            $param1['tag'] = "city";
            $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
            $city          = [];
            if(!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

	        return view('admin.bank.edit',compact(['mainmenu','menu','bank','city']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'BANK'     => 'required',
            'BANKBR'   => 'required',
            'BANKMICR' => 'required',
            'BANKIFS'  => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "bank";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Bank has been updated successfully!');
        return redirect('admin/bank-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "bank";
    	$param['id']  = $request['delete_record_id'];
        $bankData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Bank has been deleted successfully!');
        return redirect('admin/bank-master');
    }
}

