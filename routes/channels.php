<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::routes(['middleware' => ['auth:web']]);

 Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

 Broadcast::channel('post.{postId}', function ($user, $postId) {
    return ['id' => $user->id, 'name' => $user->name];
});