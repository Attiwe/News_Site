<?php

namespace App\Http\Controllers\frontend\dashboard;

use App\Http\Controllers\Controller;
use Flasher\Prime\Notification\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationsController extends Controller
{
    public function index()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return view('frontend.dashboard.notifications_profile');
    }

    public function deleteNotification(Request $request)
    {
        try {
            $id = $request->input('id');
            auth()->user()->notifications()->where('id', $id)->delete();

            session()->flash('success', 'Notification deleted.');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete notification: ' . $e->getMessage());
            return redirect()->back();
        }

    }
    public function deleteAll(Request $request){
        
        if($request->input('id')== 1 ){
            auth()->user()->notifications()->delete();
            session()->flash('success', 'All notifications deleted.');
            return redirect()->back();
        } else {
            session()->flash('error', 'Failed to delete notifications.');
            return redirect()->back();
        }
    }
    public function readAll(){
        auth()->user()->unreadNotifications->markAsRead();  
        session()->flash('success', 'All notifications marked as read.');
        return redirect()->back();
    }
        
}
