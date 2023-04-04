<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CountryMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Country";
        $param['tag'] = "country";
        $countryData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $country 	  = $countryData['data'];
        return view('admin.country.index', compact(['mainmenu','menu','country']));
    }

    public function create() {
        abort_if(Gate::denies('country_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Country";
        return view("admin.country.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('country_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'COUNTRY' => 'required',
            'ISD'     => 'required',
            'ISO'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "country";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        \Session::flash('success', 'Country has been inserted successfully!');
        return redirect('admin/country-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Country";
        $param['tag'] = "country";
        $param['id']  = $id;
        $countryData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($countryData['data']) && count($countryData['data']) > 0 && $countryData['success'] == 1) {
        	$country   = $countryData['data'][0];
	        return view('admin.country.edit',compact(['mainmenu','menu','country']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'COUNTRY' => 'required',
            'ISD'     => 'required',
            'ISO'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "country";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);
        
        \Session::flash('success','Country has been updated successfully!');
        return redirect('admin/country-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('country_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "country";
    	$param['id']  = $request['delete_record_id'];
        $countryData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Country has been deleted successfully!');
        return redirect('admin/country-master');
    }
}

