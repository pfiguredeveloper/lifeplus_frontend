<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class ProductMasterController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function index() {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Product";
        $param['tag'] = "product";
        $productData 	  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        $product 		  = $productData['data'];
        return view('admin.product.index', compact(['mainmenu','menu','product']));
    }

    public function create() {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Product";
        return view("admin.product.add",compact(['mainmenu','menu']));
    }

    public function store(Request $request) {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'productname' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "product";
        $param['is_edit'] = "0";
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success', 'Product has been inserted successfully!');
        return redirect('admin/product-master');
    }

    public function edit($id) {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $mainmenu 	  = "Master";
        $menu     	  = "Product";
        $param['tag'] = "product";
        $param['id']  = $id;
        $productData  = $this->lib->_sendPostRequest("/lifeplus/get-masters", $param);
        if(!empty($productData['data']) && count($productData['data']) > 0 && $productData['success'] == 1) {
        	$product 		  = $productData['data'][0];
	        return view('admin.product.edit',compact(['mainmenu','menu','product']));	
        }
        return abort(404,'oops Data found');
    }

    public function update(Request $request,$id) {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $this->validate($request, [
            'productname' => 'required',
        ]);

        $param            = $request->all();
        $param['tag']     = "product";
        $param['is_edit'] = "1";
        $param['id']      = $id;
        unset($param['_method']);
        unset($param['_token']);
        $this->lib->_sendPostRequest("/lifeplus/save-masters", $param);

        \Session::flash('success','Product has been updated successfully!');
        return redirect('admin/product-master');
    }

    public function destroy($id) {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$param['tag'] = "product";
    	$param['id']  = $id;
        $this->lib->_sendPostRequest("/lifeplus/delete-masters", $param);

        \Session::flash('danger','Product has been deleted successfully!');
        return redirect('admin/product-master');
    }
}

