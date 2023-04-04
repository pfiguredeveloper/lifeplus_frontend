<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DealerMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('dealer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Dealer";
        $param['tag'] = "dealer";
        $dealerData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $dealer 	  = $dealerData['data'];
        return view('admin.dealer.index', compact(['mainmenu','menu','dealer']));
    }

    public function create() {
        abort_if(Gate::denies('dealer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Dealer";

        $param1['tag'] = "city";
        $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
        $city          = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        $param2['tag'] = "franchise";
        $franchiseData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
        $franchise1         = !empty($franchiseData['data']) ? $franchiseData['data'] : [];
        $franchise          = [];
        if(!empty($franchise1) && count($franchise1) > 0) {
            foreach ($franchise1 as $key => $value) {
                $franchise[$value['franchid']] = $value['franchnm'];
            }
        }

        return view("admin.dealer.add",compact(['mainmenu','menu','city','franchise']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('dealer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'dealer' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "dealer";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Dealer has been inserted successfully!');
        return redirect('admin/dealer-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('dealer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Dealer";
        $param['tag'] = "dealer";
        $param['id']  = $id;
        $dealerData = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($dealerData['data']) && count($dealerData['data']) > 0 && $dealerData['success'] == 1) {
        	$dealer   = $dealerData['data'][0];

            $param1['tag'] = "city";
            $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
            $city          = [];
            if(!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

            $param2['tag'] = "franchise";
            $franchiseData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param2);
            $franchise1         = !empty($franchiseData['data']) ? $franchiseData['data'] : [];
            $franchise          = [];
            if(!empty($franchise1) && count($franchise1) > 0) {
                foreach ($franchise1 as $key => $value) {
                    $franchise[$value['franchid']] = $value['franchnm'];
                }
            }

	        return view('admin.dealer.edit',compact(['mainmenu','menu','dealer','city','franchise']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('dealer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'dealer' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "dealer";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Dealer has been updated successfully!');
        return redirect('admin/dealer-master');
    }

    public function destroy($id) {
        abort_if(Gate::denies('dealer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "dealer";
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Dealer has been deleted successfully!');
        return redirect('admin/dealer-master');
    }
}

