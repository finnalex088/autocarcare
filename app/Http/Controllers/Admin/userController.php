<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class userController extends Controller
{
   public function edit(Request $request)
  {
  return view('auth.userProfileaddUpdate');
  }
    public function update(Request $request)
{
    
    $user = Auth::user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    // $user->password = Crypt::encrypt($request->input('password'));
    $user->password = Hash::make($request->input('password'));
    $user->address = $request->input('address');
    $user->phone = $request->input('phone');
    $user->save();
    // $decryptedPassword = Crypt::decryptString($user->password);
    $request->session()->flash('success', 'User Profile updated successfully!');
    // Redirect back to the user update page
    return redirect()->route('userAddUpdate');

}  
       
    
}
