<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lunaweb\EmailVerification\Traits\CanVerifyEmail;
use Lunaweb\EmailVerification\Contracts\CanVerifyEmail as CanVerifyEmailContract;

class User extends Authenticatable implements CanVerifyEmailContract
{
    use Notifiable;
    use CanVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = [];

//    protected $casts = [
//        'verified' => 'boolean'
//    ];

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

    public function collectQa()
    {
        return $this->hasMany(CollectQA::class, 'uid');
    }
    public function references()
    {
        return $this->hasMany(UserReference::class);
    }

    public function universityItem()
    {

        return $this->belongsTo(University::class, 'university')->withDefault([
            'name' => '',
            'english_name' => '',
            'chinese_name' => '',
            'image_path' => null,
        ]);
    }

    public function isVip()
    {
        return $this->role === 'vip' && $this->expired >= now();
    }

    public function QA()
    {
        return $this->hasMany(QnA::class, 'uid');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
}
