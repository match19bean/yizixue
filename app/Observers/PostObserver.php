<?php

namespace App\Observers;

use App\Post;
use App\PostCategoryRelation;

class PostObserver
{
    public function deleted(Post $post)
    {
        PostCategoryRelation::where('post_id', $post->id)->delete();
        if(file_exists(public_path('uploads'.$post->image_path)) && $post->image_path !== '/images/default_avatar.png'){
            unlink(public_path('uploads'.$post->image_path));
        }
        $post->likePost->each(function($item){
            $item->delete();
        });
        $post->collectPost->each(function($item){
            $item->delete();
        });
    }
}