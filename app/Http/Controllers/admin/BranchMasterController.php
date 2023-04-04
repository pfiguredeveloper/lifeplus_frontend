<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BranchMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('branch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Branch";
        $param['tag'] = "branch";
        $branchData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $branch 	  = $branchData['data'];
        return view('admin.branch.index', compact(['mainmenu','menu','branch']));
    }

    public function create() {
        abort_if(Gate::denies('branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Branch";

        $param1['tag'] = "city";
        $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
        $city          = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        return view("admin.branch.add",compact(['mainmenu','menu','city']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('branch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'BRANCH'     => 'required',
            'BRANCHNM'   => 'required',
            'BR_MGR_NM' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "branch";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Branch has been inserted successfully!');
        return redirect('admin/branch-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Branch";
        $param['tag'] = "branch";
        $param['id']  = $id;
        $branchData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($branchData['data']) && count($branchData['data']) > 0 && $branchData['success'] == 1) {
        	$branch   = $branchData['data'][0];

            $param1['tag'] = "city";
            $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
            $city          = [];
            if(!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

	        return view('admin.branch.edit',compact(['mainmenu','menu','branch','city']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'BRANCH'     => 'required',
            'BRANCHNM'   => 'required',
            'BR_MGR_NM' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "branch";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Branch has been updated successfully!');
        return redirect('admin/branch-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('branch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "branch";
    	$param['id']  = $request['delete_record_id'];
        $branchData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Branch has been deleted successfully!');
        return redirect('admin/branch-master');
    }
}

