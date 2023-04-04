<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FranchiseCommisionMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('franchisee_commision_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Franchisee Commision Rate";
        $param['tag'] = "franchise_commision";
        $franchisecommData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $franchisecomm 	   = $franchisecommData['data'];
        return view('admin.franchisecomm.index', compact(['mainmenu','menu','franchisecomm']));
    }

    public function create() {
        abort_if(Gate::denies('franchisee_commision_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Franchisee Commision Rate";

        $param2['tag'] = "franchise";
        $franchiseData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
        $franchise1    = !empty($franchiseData['data']) ? $franchiseData['data'] : [];
        $franchise     = [];
        if(!empty($franchise1) && count($franchise1) > 0) {
            foreach ($franchise1 as $key => $value) {
                $franchise[$value['franchid']] = $value['franchnm'];
            }
        }

        $param3['tag'] = "product";
        $productData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param3);
        $product1    = !empty($productData['data']) ? $productData['data'] : [];
        $product     = [];
        if(!empty($product1) && count($product1) > 0) {
            foreach ($product1 as $key => $value) {
                $product[$value['productid']] = $value['productname'];
            }
        }

        $param4['tag'] = "dealer";
        $dealerData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param4);
        $dealer1    = !empty($dealerData['data']) ? $dealerData['data'] : [];
        $dealer     = [];
        if(!empty($dealer1) && count($dealer1) > 0) {
            foreach ($dealer1 as $key => $value) {
                $dealer[$value['dealerid']] = $value['dealer'];
            }
        }

        return view("admin.franchisecomm.add",compact(['mainmenu','menu','franchise','product','dealer']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('franchisee_commision_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            //'dealer' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "franchise_commision";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Franchisee Commision Rate has been inserted successfully!');
        return redirect('admin/franchisee-commision-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('franchisee_commision_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Franchisee Commision Rate";
        $param['tag'] = "franchise_commision";
        $param['id']  = $id;
        $franchisecommData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($franchisecommData['data']) && count($franchisecommData['data']) > 0 && $franchisecommData['success'] == 1) {
        	$franchisecomm   = $franchisecommData['data'][0];

            $param2['tag'] = "franchise";
            $franchiseData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
            $franchise1         = !empty($franchiseData['data']) ? $franchiseData['data'] : [];
            $franchise          = [];
            if(!empty($franchise1) && count($franchise1) > 0) {
                foreach ($franchise1 as $key => $value) {
                    $franchise[$value['franchid']] = $value['franchnm'];
                }
            }

            $param3['tag'] = "product";
            $productData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param3);
            $product1    = !empty($productData['data']) ? $productData['data'] : [];
            $product     = [];
            if(!empty($product1) && count($product1) > 0) {
                foreach ($product1 as $key => $value) {
                    $product[$value['productid']] = $value['productname'];
                }
            }

            $param4['tag'] = "dealer";
            $dealerData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param4);
            $dealer1    = !empty($dealerData['data']) ? $dealerData['data'] : [];
            $dealer     = [];
            if(!empty($dealer1) && count($dealer1) > 0) {
                foreach ($dealer1 as $key => $value) {
                    $dealer[$value['dealerid']] = $value['dealer'];
                }
            }

	        return view('admin.franchisecomm.edit',compact(['mainmenu','menu','franchisecomm','franchise','product','dealer']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('franchisee_commision_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            //'dealer' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "franchise_commision";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Franchisee Commision Rate has been updated successfully!');
        return redirect('admin/franchisee-commision-master');
    }

    public function destroy($id) {
        abort_if(Gate::denies('franchisee_commision_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "franchise_commision";
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Franchisee Commision Rate has been deleted successfully!');
        return redirect('admin/franchisee-commision-master');
    }
}

