<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayOrder extends Model
{
    protected $fillable = ['user_id', 'pay_product_id', 'order_status', 'transactionId', 'is_sandbox', 'remark'];

    public function product()
    {
        return $this->belongsTo(PayProduct::class,'pay_product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
