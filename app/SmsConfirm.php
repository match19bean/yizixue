<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmsConfirm extends Model
{
    protected $fillable = ['phone','country_code'];
}
