<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Str;
use App\Http\Requests\SettingRequest;
use App\Utils\ImageMangment;
 
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.setting.index');
    }

    public function edit()
    {
        return view('admin.setting.edit');
    }

    public function update(Request $request)
    {
        try {
            $setting = Setting::findOrFail($request->id);
            $data = $request->except('logo', 'favicon');
    
            if ($request->hasFile('logo')) {
                $data = array_merge($data, self::checkFile($setting, 'logo', $request));
            }
    
            if ($request->hasFile('favicon')) {
                $data = array_merge($data, self::checkFile($setting, 'favicon', $request));
            }

            $setting->update($data);
            session()->flash('success', 'Setting updated successfully');
            return redirect()->back();
        } catch (\Exception $e) {
             return redirect()->back()->withError('Failed to update setting: ' . $e->getMessage());
        }
    }

    private function checkFile($setting,$file,$request){
        ImageMangment::deleteFile($setting->$file);
        $fileName = Str::uuid()  . '.' . $request->file($file)->getClientOriginalExtension();
        $logo_path = $request->file($file)->storeAs('uploads/setting', $fileName, ['disk' => 'uploads']);
        $data[$file] = $logo_path;
        return $data;
    }

}
