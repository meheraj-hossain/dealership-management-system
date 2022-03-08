<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdateProfile extends Controller
{

    public function info($id){
        $data['title'] = 'Update Info';
        $data['info'] = User::findOrFail($id);
        return view('admin.user.update_profile',$data);
    }

    public function updateInfo(Request $request, $id){

        $request->validate([
            'old_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required|same:new_password',
        ]);
        if (!(Hash::check($request->get('old_password'),Auth::user()->password))){
            session()->flash('error','Current Password Does Not Match');
            return redirect()->back();
        }
        if (strcmp($request->get('old_password'),$request->get('new_password'))==0){
            session()->flash('error','New Password Cannot be Same as Current Password');
            return redirect()->back();
        }

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->new_password);
        $user->update();
        session()->flash('message','Password Changed Successfully');
        return redirect()->back();
    }
}
