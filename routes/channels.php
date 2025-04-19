<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => ['auth:web']]);

// قناة خاصة للمستخدم
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// قناة للتعليقات على المنشورات
Broadcast::channel('post.{postId}', function ($user, $postId) {
    return ['id' => $user->id, 'name' => $user->name];
});