<?php

namespace App\Observers;

use App\QnA;

class QnAObserver
{

    public function deleted(QnA $qna)
    {
        $qna->categoryRelation->each(function($relation){
            $relation->delete();
        });

        $qna->collectQa->each(function($collect){
           $collect->delete();
        });

        $qna->attachments->each(function($attachment){
            if(file_exists(public_path('uploads'.$attachment->file_path))){
                unlink(public_path('uploads'.$attachment->file_path));
            }
            $attachment->delete();
        });
    }
}