<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_category' => $this->id,
            'name_category' => $this->name,
            'slug_category' => $this->slug,
            'date_category'=>$this->created_at->format('Y-m-d'),
            'posts_category'=> PostResource::collection($this->whenLoaded('posts')),
        ];
    }
}
