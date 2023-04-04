<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CourierMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('courier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Courier";
        $param['tag'] = "courier";
        $courierData  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $courier 	  = $courierData['data'];
        return view('admin.courier.index', compact(['mainmenu','menu','courier']));
    }

    public function create() {
        abort_if(Gate::denies('courier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Courier";

        $param1['tag'] = "city";
        $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
        $city          = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        return view("admin.courier.add",compact(['mainmenu','menu','city']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('courier_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'COURIER_NAME'   => 'required',
            'COURIER_PERSON' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "courier";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Courier has been inserted successfully!');
        return redirect('admin/courier-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('courier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Courier";
        $param['tag'] = "courier";
        $param['id']  = $id;
        $courierData  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($courierData['data']) && count($courierData['data']) > 0 && $courierData['success'] == 1) {
        	$courier   = $courierData['data'][0];

            $param1['tag'] = "city";
            $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
            $city          = [];
            if(!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

	        return view('admin.courier.edit',compact(['mainmenu','menu','courier','city']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('courier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'COURIER_NAME'   => 'required',
            'COURIER_PERSON' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "courier";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Courier has been updated successfully!');
        return redirect('admin/courier-master');
    }

    public function destroy($id) {
        abort_if(Gate::denies('courier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "courier";
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Courier has been deleted successfully!');
        return redirect('admin/courier-master');
    }
}

