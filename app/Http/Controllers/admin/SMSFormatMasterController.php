<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class SMSFormatMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('smsformat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "SMS Format";
        $param['tag'] = "smsformat";
        $smsformatData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $smsformat 	  = $smsformatData['data'];
        return view('admin.smsformat.index', compact(['mainmenu','menu','smsformat']));
    }

    public function create() {
        abort_if(Gate::denies('smsformat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "SMS Format";
        $msgType      = ["Agent"=>"Agent","Birthday"=>"Birthday","Due"=>"Due","Fun"=>"Fun","Greetings"=>"Greetings","Loan"=>"Loan","Maturity"=>"Maturity","NewPolicy"=>"NewPolicy","Other"=>"Other","SBDue"=>"SBDue","Wedding"=>"Wedding"];
        return view("admin.smsformat.add",compact(['mainmenu','menu','msgType']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('smsformat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'MESSAGE'       => 'required',
            'MESSAGETYPE'   => 'required',
            'MESSAGETITLE'  => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "smsformat";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'SMS Format has been inserted successfully!');
        return redirect('admin/smsformat-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('smsformat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "SMS Format";
        $param['tag'] = "smsformat";
        $param['id']  = $id;
        $smsformatData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($smsformatData['data']) && count($smsformatData['data']) > 0 && $smsformatData['success'] == 1) {
        	$smsformat   = $smsformatData['data'][0];
            $msgType      = ["Agent"=>"Agent","Birthday"=>"Birthday","Due"=>"Due","Fun"=>"Fun","Greetings"=>"Greetings","Loan"=>"Loan","Maturity"=>"Maturity","NewPolicy"=>"NewPolicy","Other"=>"Other","SBDue"=>"SBDue","Wedding"=>"Wedding"];
	        return view('admin.smsformat.edit',compact(['mainmenu','menu','smsformat','msgType']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('smsformat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'MESSAGE'       => 'required',
            'MESSAGETYPE'   => 'required',
            'MESSAGETITLE'  => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "smsformat";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','SMS Format has been updated successfully!');
        return redirect('admin/smsformat-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('smsformat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "smsformat";
    	$param['id']  = $request['delete_record_id'];
        $smsformatData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','SMS Format has been deleted successfully!');
        return redirect('admin/smsformat-master');
    }
}

