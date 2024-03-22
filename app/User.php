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

    public function collectUser()
    {
        return $this->hasMany(CollectUser::class, 'uid', 'id');
    }

    public function likeUser()
    {
        return $this->hasMany(LikeUser::class, 'uid', 'id');
    }

    public function references()
    {
        return $this->hasMany(UserReference::class);
    }

    public function universityItem()
    {
        return $this->belongsTo(University::class, 'university');
    }
}
