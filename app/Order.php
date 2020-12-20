<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function orderderedProducts()
    {
       return $this->hasMany(OderProduct::class);
    }
    public function customer()
    {
      return $this->belongsTo(Customer::class);
    }
}
