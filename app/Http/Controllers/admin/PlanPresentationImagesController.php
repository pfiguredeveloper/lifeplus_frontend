<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\PlanPresentationImages;
use App\Http\Controllers\Controller;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use App\LifeCell;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File; 

class PlanPresentationImagesController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $mainmenu = "Configuration";
        $menu     = "Plan Presentation Images";
        $authId = \Auth::user()->c_id;
        $imageData = PlanPresentationImages::with('planPresentationId')->where('client_id',$authId)->get();
        return view('admin.plan-presentation-images.index', compact(['mainmenu','menu','imageData']));
    }

    public function create() {
        $mainmenu  = "Configuration";
        $menu      = "Plan Presentation Images";
        $planData = LifeCell::get();
        $plan     = [];
        if(!empty($planData) && count($planData) > 0) {
            foreach ($planData as $key => $value) {
                $plan[$value['plno']] = $value['plno'].'&nbsp;&nbsp; - '.$value['plannm'];
            }
        }
        return view("admin.plan-presentation-images.add",compact(['mainmenu','menu','plan']));
    }

    public function store(Request $request) {
        
        $validator = Validator::make($request->all(),[
            'PlanID' => 'required',
            'Title' => 'required',
            'Image' => 'required|image|mimes:jpeg,png,jpg|max:3072'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        //dd($request->all());
        $image_path = '';
        if ($request->hasFile('Image')) {
            $photo = $request->file('Image');
            $root = base_path() . '/public/resource/plan-presentation/images/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/plan-presentation/images/" . $name;
            $photo->move($root, $name);
        }

        $cId = \Auth::user()->c_id;
    	PlanPresentationImages::create([
            'PlanID' => $request->PlanID,
            'Title' => $request->Title,
            'Image' => $image_path,
            'client_id' => $cId
        ]);

        \Session::flash('success', 'Plan presentation image has been inserted successfully!');
        return redirect('admin/plan-presentation-images');
    }

    public function edit($id) {
        $mainmenu  = "Configuration";
        $menu      = "Plan Presentation Images";
        $planData = LifeCell::get();
        $plan     = [];
        $authId = \Auth::user()->c_id;
        if(!empty($planData) && count($planData) > 0) {
            foreach ($planData as $key => $value) {
                $plan[$value['plno']] = $value['plno'].'&nbsp;&nbsp; - '.$value['plannm'];
            }
        }
        $imageData = PlanPresentationImages::with('planPresentationId')->where('PlanPreID',$id)->where('client_id',$authId)->first();
        return view("admin.plan-presentation-images.edit",compact(['mainmenu','menu','plan','imageData']));
    }

    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(),[
            'PlanID' => 'required',
            'Title' => 'required',
            'Image' => 'image|mimes:jpeg,png,jpg|max:3072'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $imageData = PlanPresentationImages::findOrFail($id);
        $getImageData = [];
        if ($request->hasFile('Image')) {
            if (File::exists(public_path($imageData->Image))) {
                File::delete(public_path($imageData->Image));
            }
            
            $photo = $request->file('Image');
            $root = base_path() . '/public/resource/plan-presentation/images/';
            $name = Str::random(20) . "." . $photo->getClientOriginalExtension();
            if (!file_exists($root)) {
                mkdir($root, 0777, true);
            }
            $image_path = "resource/plan-presentation/images/" . $name;
            $photo->move($root, $name);
            $getImageData['Image'] = $image_path;
        }
        $getImageData['PlanID'] = $request->PlanID;
        $getImageData['Title'] = $request->Title;
        $imageData->update($getImageData);

        \Session::flash('success', 'Plan presentation image has been updated successfully!');
        return redirect('admin/plan-presentation-images');
    }

    public function destroy(Request $request) {
        
        $id  = $request['delete_record_id'];
        $imageData = PlanPresentationImages::findOrFail($id);
        if(isset($imageData->Image)) {
            //Remove image from directory.
            if (File::exists(public_path($imageData->Image))) {
                File::delete(public_path($imageData->Image));
            }
            $imageData->delete();
        } else {
            $imageData->delete();
        }

        \Session::flash('danger','Plan presentation image has been deleted successfully!');
        return redirect('admin/plan-presentation-images');
    }
}

