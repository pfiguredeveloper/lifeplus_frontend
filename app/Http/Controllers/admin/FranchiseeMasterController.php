<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FranchiseeMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('franchisee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Franchisee";
        $param['tag'] = "franchise";
        $franchiseeData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $franchisee 	  = $franchiseeData['data'];
        return view('admin.franchisee.index', compact(['mainmenu','menu','franchisee']));
    }

    public function create() {
        abort_if(Gate::denies('franchisee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Franchisee";

        $param1['tag'] = "city";
        $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
        $city          = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        return view("admin.franchisee.add",compact(['mainmenu','menu','city']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('franchisee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'franchnm' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "franchise";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Franchisee has been inserted successfully!');
        return redirect('admin/franchisee-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('franchisee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Franchisee";
        $param['tag'] = "franchise";
        $param['id']  = $id;
        $franchiseeData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($franchiseeData['data']) && count($franchiseeData['data']) > 0 && $franchiseeData['success'] == 1) {
        	$franchisee   = $franchiseeData['data'][0];

            $param1['tag'] = "city";
            $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
            $city          = [];
            if(!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

	        return view('admin.franchisee.edit',compact(['mainmenu','menu','franchisee','city']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('franchisee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'franchnm' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "franchise";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Franchisee has been updated successfully!');
        return redirect('admin/franchisee-master');
    }

    public function destroy($id) {
        abort_if(Gate::denies('franchisee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "franchise";
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Franchisee has been deleted successfully!');
        return redirect('admin/franchisee-master');
    }
}

