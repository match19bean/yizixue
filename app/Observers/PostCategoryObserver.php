<?php

namespace App\Observers;

use App\PostCategory;
use App\PostCategoryRelation;
use App\QACategoryRelation;
use App\UserPostCategoryRelation;

class PostCategoryObserver
{
    public function deleted(PostCategory $postCategory)
    {
        PostCategoryRelation::where('category_id', $postCategory->id)->delete();
        QACategoryRelation::where('category_id', $postCategory->id)->delete();
        UserPostCategoryRelation::where('post_category_id', $postCategory->id)->delete();
    }
}