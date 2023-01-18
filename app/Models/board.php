<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board extends Model
{
    use HasFactory;

    protected $table = 'board';
    protected $fillable = [
        'title',
        'text',
        'thumbnail',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\user');
    }
}
