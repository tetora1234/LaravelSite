<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodValue extends Model
{
    protected $table = 'good_value';
    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
}
