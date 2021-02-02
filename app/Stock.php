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
    public function offers()
    {
      return $this->hasMany(Offer::class);
    }

    public function hasOffer()
    {
      if($this->offers->count())
      {
        return true;
      }
      return false;
    }
    public function offerPrice()
    {

      $offer = $this->offers()->latest()->first();
      return $this->selling_price - ($this->selling_price * ($offer->percentage/100));
     }
}
