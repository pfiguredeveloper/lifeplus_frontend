<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('clients_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Client";
        $menu     	  = "Users";
        $clientsData  = $this->lib->_sendPostRequest("/client/get-users");
        $clients 	  = $clientsData['data'];
        return view('admin.clients.index', compact(['mainmenu','menu','clients']));
    }

    public function create() {
        abort_if(Gate::denies('clients_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Client";
        $menu     	  = "Users";

        $param1['tag'] = "city";
        $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
        $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
        $city          = [];
        if(!empty($city1) && count($city1) > 0) {
            foreach ($city1 as $key => $value) {
                $city[$value['CITYID']] = $value['CITY'];
            }
        }

        $rolesData    = $this->lib->_sendPostRequest("/client/get-roles");
        $roles        = !empty($rolesData['data']) ? $rolesData['data'] : [];
        $role         = [];
        if(!empty($roles) && count($roles) > 0) {
            foreach ($roles as $key => $value) {
                $role[$value['id']] = $value['title'];
            }
        }

        $paramDo['tag'] = 'do';
        $doData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramDo);
        $do           = !empty($doData['data']) ? $doData['data'] : [];
        $doname       = [];
        if(!empty($do) && count($do) > 0) {
            foreach ($do as $key => $value) {
                $doname[$value['DOCODE']] = $value['DONAME'];
            }
        }

        $parambranch['tag'] = 'branch';
        $branchData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambranch);
        $branch           = !empty($branchData['data']) ? $branchData['data'] : [];
        $branchname       = [];
        if(!empty($branch) && count($branch) > 0) {
            foreach ($branch as $key => $value) {
                $branchname[$value['BCODE']] = $value['BRANCH'];
            }
        }

        $paramcourier['tag'] = 'courier';
        $courierData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcourier);
        $courier1            = !empty($courierData['data']) ? $courierData['data'] : [];
        $courier             = [];
        if(!empty($courier1) && count($courier1) > 0) {
            foreach ($courier1 as $key => $value) {
                $courier[$value['COURIERID']] = $value['COURIER_NAME'];
            }
        }

        return view("admin.clients.add",compact(['mainmenu','menu','city','role','doname','branchname','courier']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('clients_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'ARE1' => 'required',
        ]);

        $param            = $request->all();
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/client/save-users", $param);

        \Session::flash('success', 'Client has been inserted successfully!');
        return redirect('admin/clients');
    }

    public function edit($id) {
        abort_if(Gate::denies('clients_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Client";
        $menu     	  = "Users";
        $param['id']  = $id;
        $clientsData  = $this->lib->_sendPostRequest("/client/get-users", $param);
        if(!empty($clientsData['data']) && $clientsData['success'] == 1) {
        	$clients 		  = $clientsData['data'];

            $param1['tag'] = "city";
            $cityData      = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param1);
            $city1         = !empty($cityData['data']) ? $cityData['data'] : [];
            $city          = [];
            if(!empty($city1) && count($city1) > 0) {
                foreach ($city1 as $key => $value) {
                    $city[$value['CITYID']] = $value['CITY'];
                }
            }

            $rolesData    = $this->lib->_sendPostRequest("/client/get-roles");
            $roles        = !empty($rolesData['data']) ? $rolesData['data'] : [];
            $role         = [];
            if(!empty($roles) && count($roles) > 0) {
                foreach ($roles as $key => $value) {
                    $role[$value['id']] = $value['title'];
                }
            }

            $paramDo['tag'] = 'do';
            $doData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramDo);
            $do           = !empty($doData['data']) ? $doData['data'] : [];
            $doname       = [];
            if(!empty($do) && count($do) > 0) {
                foreach ($do as $key => $value) {
                    $doname[$value['DOCODE']] = $value['DONAME'];
                }
            }

            $parambranch['tag'] = 'branch';
            $branchData       = $this->lib->_sendPostRequest("/lifeplus/get-masters", $parambranch);
            $branch           = !empty($branchData['data']) ? $branchData['data'] : [];
            $branchname       = [];
            if(!empty($branch) && count($branch) > 0) {
                foreach ($branch as $key => $value) {
                    $branchname[$value['BCODE']] = $value['BRANCH'];
                }
            }

            $paramcourier['tag'] = 'courier';
            $courierData         = $this->lib->_sendPostRequest("/lifeplus/get-masters", $paramcourier);
            $courier1            = !empty($courierData['data']) ? $courierData['data'] : [];
            $courier             = [];
            if(!empty($courier1) && count($courier1) > 0) {
                foreach ($courier1 as $key => $value) {
                    $courier[$value['COURIERID']] = $value['COURIER_NAME'];
                }
            }

	        return view('admin.clients.edit',compact(['mainmenu','menu','clients','city','role','branchname','doname','courier']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('clients_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'ARE1' => 'required',
        ]);

        $param            = $request->all();
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/client/save-users", $param);

        \Session::flash('success','Client has been updated successfully!');
        return redirect('admin/clients');
    }

    public function destroy($id) {
        abort_if(Gate::denies('clients_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/client/delete-users", $param);

        \Session::flash('danger','Client has been deleted successfully!');
        return redirect('admin/clients');
    }
}

