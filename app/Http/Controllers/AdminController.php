<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function show_profile()
   {
    $user = User::find(Auth::user()->id);
    return view('admin.profile.show', compact('user'));
   }

   public function edit_profile()
   {
    $user = User::find(Auth::user()->id);
    return view('admin.profile.edit', compact('user'));
   }

   public function update_profile()
   {
    $user = User::find(auth()->user()->id);
    $user->name = request('name');
    $user->email = request('email');

    if(request()->file('image')){
        $file = request()->file('image');
        $fileName = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$fileName);
        $user['image'] = $fileName;
    }
    $user->save();
    $notification = array(
        'message' => 'Profile updated successfully.',
        'alert-type' => 'success'
    );
    return redirect()->route('profile.show')->with($notification);
   }


   public function edit_password()
   {
    return view('admin.profile.edit_password');
   }

   public function update_password(Request $request)
   {
    $validateData = $request->validate([
        'currentPassword' => 'required',
        'newPassword' => 'required',
        'confirmPassword' => 'required|same:newPassword',
    ]);

    $hashedPassword = auth()->user()->password;
    if(Hash::check($request->currentPassword, $hashedPassword)){
        $user = User::find(auth()->user()->id);
        $user->password = bcrypt($request->newPassword);
        $user->save();

        session()->flash('message', 'Password updated successfully');
        return redirect()->back();
    }
    else{   
        session()->flash('message', 'Old password is not match');
        return redirect()->back();
    }
   }
}
