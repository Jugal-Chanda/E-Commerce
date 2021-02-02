<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toutorial extends Model
{
    //

    public function products()
    {
      return $this->belongsToMany('App\Product');
    }
    public function parts()
    {
      return $this->hasMany('App\Toutorial_Part');
    }
    public function hasParts()
    {
      $parts = $this->parts();
      if($parts->count())
      {
        return true;
      }
      return false;
    }
}
