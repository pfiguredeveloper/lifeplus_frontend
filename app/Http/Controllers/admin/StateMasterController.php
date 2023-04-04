<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StateMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('state_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "State";
        $param['tag'] = "state";
        $stateData    = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $state 	      = $stateData['data'];
        return view('admin.state.index', compact(['mainmenu','menu','state']));
    }

    public function create() {
        abort_if(Gate::denies('state_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "State";

        $param['tag'] = "country";
        $countryData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $country1      = !empty($countryData['data']) ? $countryData['data'] : [];
        $country       = [];
        if(!empty($country1) && count($country1) > 0) {
            foreach ($country1 as $key => $value) {
                $country[$value['COUNTRYID']] = $value['COUNTRY'];
            }    
        }
        return view("admin.state.add",compact(['mainmenu','menu','country']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('state_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'STATE'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "state";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'State has been inserted successfully!');
        return redirect('admin/state-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('state_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "State";
        $param['tag'] = "state";
        $param['id']  = $id;
        $stateData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($stateData['data']) && count($stateData['data']) > 0 && $stateData['success'] == 1) {
        	$state   = $stateData['data'][0];

            $param1['tag'] = "country";
            $countryData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $country1      = !empty($countryData['data']) ? $countryData['data'] : [];
            $country       = [];
            if(!empty($country1) && count($country1) > 0) {
                foreach ($country1 as $key => $value) {
                    $country[$value['COUNTRYID']] = $value['COUNTRY'];
                }    
            }

	        return view('admin.state.edit',compact(['mainmenu','menu','state','country']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('state_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'STATE'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "state";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','State has been updated successfully!');
        return redirect('admin/state-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('state_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "state";
    	$param['id']  = $request['delete_record_id'];
        $stateData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','State has been deleted successfully!');
        return redirect('admin/state-master');
    }
}

