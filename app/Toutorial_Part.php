<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toutorial_Part extends Model
{
    public function toutorial()
    {
      return $this->belongsTo('App\Toutorial');
    }
}
