<?php

namespace App\Http\Controllers\admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit($id) {
        $data         = [];
        $data['menu'] = "User";
        $data['user'] = User::findorFail($id);
        return view('admin.users.edit',$data);
    }


    public function update(Request $request,$id) {

        $this->validate($request, [
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email,'.$id.',id',
            'password' => 'confirmed',
        ]);

        if(!empty($request['password'])) {
        }
        else{
            unset($request['password']);
        }
        
        $input = $request->all();
        $user  = User::findorFail($id);
        $user->update($input);

        \Session::flash('success','User has been updated successfully!');
        
        return redirect('admin/users/'.$id."/edit");
    }
}

