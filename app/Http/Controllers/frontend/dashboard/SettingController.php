<?php

namespace App\Http\Controllers\frontend\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\frontend\SetingUserRequest;
use Illuminate\Support\Str;
use App\Utils\ImageMangment;


class SettingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('frontend.dashboard.setting_profile', compact('user'));
    }

    public function update(SetingUserRequest $request)
    {
    try{
     $request->validated();
     $user = User::findorFail(auth()->user()->id);
     $user->update($request->except(['image', '_token', '_method']));
   
     // upload image
     ImageMangment::uploadUserImage($request, $user);
     
     session()->flash('success', 'Profile updated successfully');
     return redirect()->back();
    }
    catch (\Exception $e) {
        session()->flash('error', 'Failed to update profile: ' . $e->getMessage());
        return redirect()->back()-> withInput();
    }
}

}
 