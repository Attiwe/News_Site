<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
{
    try {
        $user = auth()->user();

        $unreadNotifications = $user->unreadNotifications()->paginate(5);
        $allNotifications = $user->notifications()->paginate(5);

        return apiResponse(200, 'success', [
            'unread_notifications' => $unreadNotifications,
            'all_notifications' => $allNotifications
        ]);

    } catch (\Exception $e) {
        return apiResponse(500, 'error', [
            'message' => $e->getMessage()
        ]);
    }
}

}
