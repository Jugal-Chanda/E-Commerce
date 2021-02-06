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
      return $this->hasMany(Offer::class)->orderBy('created_at',"DESC");
    }
    public function offer()
    {
      $offers = $this->offers;
      return $offers->first();
    }
    public function hasOffer()
    {
      if($this->offer()){
        return true;
      }else{
        return false;
      }
    }
}
