<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'commant' => $this->commit,
            'user' => $this->user->name,
            'user_image' => asset($this->user->image) ,
            'created_at' => $this->created_at->diffForHumans(),
        ];
    }
}