<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
<<<<<<< HEAD
        return [
=======
        $data = [
>>>>>>> api
            'name_user' => $this->name,
            'username_user' => $this->username,
            'image_user' =>asset( $this->image),
            'status_user' => $this->status ,
            'created_at' => $this->created_at,
        ];
<<<<<<< HEAD
=======
        if($request->is('api/account/user')){
             
                $data['country_user'] = $this->country;
               $data['city_user'] = $this->city;
               $data['street_user'] = $this->street;
               $data['phone_user'] = $this->phone;  
             
        }
        return $data;
>>>>>>> api
    }
}
