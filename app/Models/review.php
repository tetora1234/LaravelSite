<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table = 'review';
    protected $fillable = [
        'product_id',
        'user_id',
        'points',
        'review',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\product');
    }
}
