<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  protected $table = 'product';
  const CREATED_AT = NULL;
  const UPDATED_AT = NULL;

  public function user()
  {
    return $this->belongsTo('App\Models\user');
  }
}
