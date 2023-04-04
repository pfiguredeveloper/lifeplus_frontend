<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Library\Api;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class MenuManagementController extends Controller
{
	public $lib;

    public function __construct() {
        $this->middleware('auth');
        $this->lib = new Api;
    }

    public function getMenu($parent_id = 0) {

        $activeMenu     = \DB::connection('lifecell_users')->select("SELECT * FROM main_menus where id = $parent_id AND product_id = 7");
        $menu     	    = (!empty($activeMenu[0]) && !empty($activeMenu[0]->menu_name)) ? $activeMenu[0]->menu_name : "";
        
        $cId            = \Auth::user()->c_id;
        $clientWiseMenu = \DB::connection('lifecell_lic')->select("SELECT * FROM client_wise_menu_setup where client_id = {$cId}");
        
        $menuEnabled    = \DB::connection('lifecell_users')->select("SELECT * FROM main_menus where id = $parent_id AND menu_enabled = 1 AND product_id = 7 limit 1");

        if(empty($menuEnabled)) {
            return abort(404,'oops Data found');
        }

        $getMenu = [];
        if(!empty($clientWiseMenu) && count($clientWiseMenu) > 0) {
            foreach($clientWiseMenu as $key => $value) {
                $clientMenu = \DB::connection('lifecell_users')->select("SELECT * FROM main_menus where id = {$value->menu_id} AND parent_id = $parent_id AND menu_enabled = 1 AND product_id = 7 limit 1");
                if(!empty($clientMenu[0])) {
                    $getMenu[] = [
                        'id'          => !empty($clientMenu[0]->id) ? $clientMenu[0]->id : "",
                        'menu_name'   => !empty($clientMenu[0]->menu_name) ? $clientMenu[0]->menu_name : "",
                        'menu_url'    => !empty($clientMenu[0]->menu_url) ? $clientMenu[0]->menu_url : "",
                        'icon'        => !empty($clientMenu[0]->icon) ? $clientMenu[0]->icon : "",
                        'parent_id'   => !empty($clientMenu[0]->parent_id) ? $clientMenu[0]->parent_id : 0,
                        'ordering'    => !empty($value->ordering) ? $value->ordering : 0,
                        'font_color'  => !empty($value->font_color) ? $value->font_color : "#666",
                        'back_color'  => !empty($value->back_color) ? $value->back_color : "#f4f4f4",
                    ];
                }
            }
        }

        if(!empty($getMenu)) {
            array_multisort(array_column($getMenu, 'ordering'), SORT_ASC, $getMenu);
        }

        return view('admin.menu.menu', compact(['menu','getMenu']));
    }
}