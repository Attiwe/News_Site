<?php

namespace App\Http\Controllers\Api\Account;

use App\Http\Controllers\Controller;
use App\Utils\ImageMangment;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests\frontend\SetingUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class SettingController extends Controller
{
    public function update(SetingUserRequest $request)
    {
        DB::beginTransaction();

        $request->validated();

        try {

            $user = User::find(auth()->user()->id);

            if (!$user) {
                return apiResponse(404, 'User not found');
            }

            $user->update($request->all());

            ImageMangment::uploadUserImage($request, $user);

            DB::commit();
            return apiResponse(200, 'success', 'Profile updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return apiResponse(500, 'error', $e->getMessage());
        }
    }

    public function changePassword(Request $request)
    {
        $request->validate($this->filterData());

        $user = User::find(auth()->user()->id);

        if ($user && Hash::check($request->current_password, $user->password)) {

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return apiResponse(200, 'success', 'Password updated successfully');
        }

        return apiResponse(500, 'error', 'Password not updated');

    }

    public function filterData(): array 
    {
        return [
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }

}
