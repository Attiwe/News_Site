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
        return [
            'name_user' => $this->name,
            'username_user' => $this->username,
            'image_user' =>asset( $this->image),
            'status_user' => $this->status ,
            'created_at' => $this->created_at,
        ];
    }
}
