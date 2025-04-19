<?php
namespace App\Utils;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\User;



class ImageMangment
{
    public static function uploadImage(Request $request, $posts)
    {
        if($request->hasFile('images')  ){
            foreach($request->images as $image){
             $filename =  self::fileName($image);
            $path = $image->storeAs('/uploads/posts', $filename, ['disk' => 'uploads']);
            $posts->images()->create([
                'path' => $path
             ]);
            }
        }
    }

    
    public static function deleteImage($post)
    {
        if($post->images){
            foreach($post->images as $image){
                $imagePath = public_path($image->path);
                self::deleteFile($imagePath);
                $image->delete();
            }
        }
    }
    
    public static function uploadUserImage(Request $request,  $user)
    {
        if ($request->hasFile('image')) {
          
            self::deleteFile($user->image);
            $filename = self::fileName($request->image);

            $path = $request->image->storeAs('/uploads/user', $filename, ['disk' => 'uploads']);
            $user->update(['image' => $path]);
        }
        
    }


    public static function updateLoade(Request $request, $post){
        if ($request->hasFile('images')) {
            foreach ($post->images as $image) {
                self::deleteFile($image->path);
                $image->delete();
            }
            foreach ($request->images as $image) {
                 $filename = self::fileName($image);        
                 $path = $image->storeAs('uploads/posts', $filename, ['disk' => 'uploads']);
                $post->images()->create([
                    'path' => $path
                ]);
            }
        }
    }


   private static function fileName($image){
    $filename = Str::uuid() . '.' . $image->getClientOriginalExtension();
    return $filename;
  
    }


   public static function deleteFile($image_uploade){
    if (File::exists(public_path($image_uploade))) {
        File::delete(public_path($image_uploade));
    }
   }

}
           
   