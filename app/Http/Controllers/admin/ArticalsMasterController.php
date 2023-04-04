<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ArticalsMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('articals_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Articals";
        $param['tag'] = "articals";
        $articalsData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $articals 	  = $articalsData['data'];
        return view('admin.articals.index', compact(['mainmenu','menu','articals']));
    }

    public function create() {
        abort_if(Gate::denies('articals_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Articals";
        return view("admin.articals.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('articals_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DESC1'     => 'required',
            'DESC2'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "articals";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Articals has been inserted successfully!');
        return redirect('admin/articals-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('articals_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Articals";
        $param['tag'] = "articals";
        $param['id']  = $id;
        $articalsData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($articalsData['data']) && count($articalsData['data']) > 0 && $articalsData['success'] == 1) {
        	$articals   = $articalsData['data'][0];
	        return view('admin.articals.edit',compact(['mainmenu','menu','articals']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('articals_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'DESC1'     => 'required',
            'DESC2'     => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "articals";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Articals has been updated successfully!');
        return redirect('admin/articals-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('articals_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "articals";
    	$param['id']  = $request['delete_record_id'];
        $articalsData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Articals has been deleted successfully!');
        return redirect('admin/articals-master');
    }
}

