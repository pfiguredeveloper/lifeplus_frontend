<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;

class HomeController extends Controller
{
    public function index() {
        return view('website.index');
    }
    public function tnc() {
        return view('website.tnc');
    }
    public function pp() {
        return view('website.pp');
    }
    public function pricelist() {
        return view('website.pricelist');
    }
    public function aboutus() {
        return view('website.aboutus');
    }
    public function comingSoon() {
        return view('website.comingSoon');
    }
    public function comingSoon1() {
        return view('website.comingSoon');
    }
    public function test() {

        echo "File permissions :" .  decoct(fileperms("test.php"));
        chmod("test.php" ,0777);


        echo "<form action='/TestResult_Api' name='test' enctype='multipart/form-data'>
                <input type='file' name='test'><input type='submit' />
            </form>";
    }
    public function testResult(Request $request) {
        $file = $request->file('image');

       
          $destinationPath = '/opt/bitnami/apache/htdocs/lifeplus_api/public/';
            $file->move($destinationPath,"test.app");
    }

}
// 
