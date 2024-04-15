<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills()
    {
        return $this->hasMany(UserSkillRelation::class, 'user_id', 'id');
    }

    public function post()
    {
        return $this->hasMany( Post::class, 'uid', 'id');
    }

    public function postCategory()
    {
        return $this->hasMany(UserPostCategoryRelation::class);
    }

    //收藏其他人
    public function collectUser()
    {
        return $this->hasMany(CollectUser::class, 'uid');
    }

    //喜歡其他人
    public function likeUser()
    {
        return $this->hasMany(LikeUser::class, 'uid');
    }

    //自己被收藏
    public function collectedUser()
    {
        return $this->hasMany(CollectUser::class, 'user_id');
    }

    //自己被喜歡
    public function likedUser()
    {
        return $this->hasMany(LikeUser::class, 'user_id');
    }

    public function likePost()
    {
        return $this->hasMany(LikePost::class, 'uid');
    }

    public function collectPost()
    {
        return $this->hasMany(CollectPost::class, 'uid');
    }

    public function references()
    {
        return $this->hasMany(UserReference::class);
    }

    public function universityItem()
    {
        return $this->belongsTo(University::class, 'university');
    }

    public function isVip()
    {
        return $this->role === 'vip' && $this->expired >= now();
    }

    public function QA()
    {
        return $this->hasMany(QnA::class, 'uid');
    }
}
