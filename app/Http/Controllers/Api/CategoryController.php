<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\PostCollection;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::active()->get();
        if (!$categories) {
            return apiResponse(404, 'the categories not found');
        }
        return apiResponse(200, 'the categories is successfully', new CategoryCollection($categories));

    }

    public function getCategoryPosts($slug)
    {
        $category = Category::whereSlug($slug)->first();
        if (!$category) {
            return apiResponse(404, 'the category not found');
        }
        $posts = $category->posts;
        if (!$posts) {
            return apiResponse(404, 'the posts not found');
        }
        return apiResponse(200, 'the posts is successfully', new PostCollection($posts));
    }
}
