<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class StatusMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Status";
        $param['tag'] = "status";
        $statusData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $status 	  = $statusData['data'];
        return view('admin.status.index', compact(['mainmenu','menu','status']));
    }

    public function create() {
        abort_if(Gate::denies('status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Status";

        $param['tag'] = "gender";
        $genderData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $gender1      = !empty($genderData['data']) ? $genderData['data'] : [];
        $gender       = [];
        if(!empty($gender1) && count($gender1) > 0) {
            foreach ($gender1 as $key => $value) {
                $gender[$value['NAME']] = $value['NAME'];
            }    
        }
        return view("admin.status.add",compact(['mainmenu','menu','gender']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'STATUS'     => 'required',
            'GENDER'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "status";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Status has been inserted successfully!');
        return redirect('admin/status-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Status";
        $param['tag'] = "status";
        $param['id']  = $id;
        $statusData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($statusData['data']) && count($statusData['data']) > 0 && $statusData['success'] == 1) {
        	$status   = $statusData['data'][0];

            $param1['tag'] = "gender";
            $genderData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $gender1      = !empty($genderData['data']) ? $genderData['data'] : [];
            $gender       = [];
            if(!empty($gender1) && count($gender1) > 0) {
                foreach ($gender1 as $key => $value) {
                    $gender[$value['NAME']] = $value['NAME'];
                }    
            }

	        return view('admin.status.edit',compact(['mainmenu','menu','status','gender']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'STATUS'     => 'required',
            'GENDER'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "status";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        \Session::flash('success','Status has been updated successfully!');
        return redirect('admin/status-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "status";
    	$param['id']  = $request['delete_record_id'];
        $statusData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Status has been deleted successfully!');
        return redirect('admin/status-master');
    }
}

