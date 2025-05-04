<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
  
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data= [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->desc,
            'post_url'=>route('frontend.home',$this->slug),//special phon
           
            'published_user' => $this->whenLoaded('user')
             ? UserResource::make($this->whenLoaded('user')) 
             : AdminResource::make($this->whenLoaded('admin')),
           
             'images_posts'=> ImageResource::collection($this->whenLoaded('images')),

             'comments_posts'=> new CommentCollection($this->whenLoaded('comments')),

         ];
        if($request->is('api/posts/show/*')){
            $data['smail_description'] = $this->smail_desc;
            $data['comment_enable'] = self::commentAble();
            $data['number_view'] = $this->number_view;
            $data['status'] = $this->status();
            $data['created_at'] = $this->created_at;
 
            $data['category'] = new CategoryResource($this->whenLoaded('category')); 
        }
        return $data;
    }
}
