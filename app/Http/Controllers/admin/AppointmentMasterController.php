<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AppointmentMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Appointment";
        $param['tag'] = "appoint";
        $appointmentData  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $appointment 	  = $appointmentData['data'];
        return view('admin.appointment.index', compact(['mainmenu','menu','appointment']));
    }

    public function create() {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Appointment";
        return view("admin.appointment.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'PCODE'  => 'required',
            'NAME'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "appoint";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Appointment has been inserted successfully!');
        return redirect('admin/appointment-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Appointment";
        $param['tag'] = "appoint";
        $param['id']  = $id;
        $appointmentData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($appointmentData['data']) && count($appointmentData['data']) > 0 && $appointmentData['success'] == 1) {
        	$appointment   = $appointmentData['data'][0];
	        return view('admin.appointment.edit',compact(['mainmenu','menu','appointment']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'PCODE'  => 'required',
            'NAME'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "appoint";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Appointment has been updated successfully!');
        return redirect('admin/appointment-master');
    }

    public function destroy($id) {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "appoint";
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Appointment has been deleted successfully!');
        return redirect('admin/appointment-master');
    }
}

