<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
<<<<<<< HEAD

=======
  
>>>>>>> api
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
<<<<<<< HEAD
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->desc,
            'post_url'=>route('frontend.home',$this->slug),//special Model
=======
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->desc,
            'post_url'=>route('frontend.home',$this->slug),//special phon
>>>>>>> api
           
            'published_user' => $this->whenLoaded('user')
             ? UserResource::make($this->whenLoaded('user')) 
             : AdminResource::make($this->whenLoaded('admin')),
           
             'images_posts'=> ImageResource::collection($this->whenLoaded('images')),
<<<<<<< HEAD
        ];
        if($request->is('api/posts/show/*')){
=======

             'comments_posts'=> new CommentCollection($this->whenLoaded('comments')),

         ];
        if($request->is('api/posts/show/*')||$request->is('api/account/posts/create_posts') ){
>>>>>>> api
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
