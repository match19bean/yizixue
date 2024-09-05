<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayProduct extends Model
{
    protected $fillable = ['name', 'description', 'pay_time', 'price'];

    public function orders()
    {
        return $this->hasMany(PayOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(PayProduct::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
