<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CaptionMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        //dd(\Auth::user());
        abort_if(Gate::denies('caption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Caption";
        $param['tag'] = "caption";
        $captionData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $caption 	  = $captionData['data'];
        return view('admin.caption.index', compact(['mainmenu','menu','caption']));
    }

    public function create() {
        abort_if(Gate::denies('caption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Caption";
        return view("admin.caption.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('caption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'CAP1'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "caption";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Caption has been inserted successfully!');
        return redirect('admin/caption-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('caption_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Caption";
        $param['tag'] = "caption";
        $param['id']  = $id;
        $captionData   = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($captionData['data']) && count($captionData['data']) > 0 && $captionData['success'] == 1) {
        	$caption   = $captionData['data'][0];
	        return view('admin.caption.edit',compact(['mainmenu','menu','caption']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('caption_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'CAP1'   => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "caption";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Caption has been updated successfully!');
        return redirect('admin/caption-master');
    }

    public function destroy(Request $request) {
        abort_if(Gate::denies('caption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "caption";
    	$param['id']  = $request['delete_record_id'];
        $captionData   = $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Caption has been deleted successfully!');
        return redirect('admin/caption-master');
    }
}

