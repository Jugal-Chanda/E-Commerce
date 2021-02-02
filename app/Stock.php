<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'product_id', 'quantity', 'buying_price', 'selling_price'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function offer()
    {
      return $this->hasOne(Offer::class);
    }

    public function hasOffer()
    {
      if($this->offer != null)
      {
        return true;
      }
      return false;
    }
}
