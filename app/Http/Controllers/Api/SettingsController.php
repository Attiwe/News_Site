<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RelatedNewsSite;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Resources\SettingResource;
use App\Http\Resources\RelatedCollection;

class SettingsController extends Controller
{
    public function index(){

        $settings = Setting::first();
        if (!$settings) {
            return apiResponse(404, 'Settings not found');
        }
        
        $related = RelatedNewsSite::paginate(5);
      
        
        $data = [
            'settings' => new SettingResource($settings),
            'related_sites' => (new RelatedCollection($related))->response()->getData(true),
        ];

        return apiResponse(200 , 'Settings fetched successfully' , $data);
    }

 
}
