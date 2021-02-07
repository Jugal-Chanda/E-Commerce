<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

  protected $fillable = [
      'name', 'model', 'description','image1','image2','image3','image4','category_id'
  ];

  public function category()
  {
      return $this->belongsTo('App\Category');
  }
  public function stocks()
  {
      return $this->hasMany('App\Stock')->whereRaw('quantity > sold')->orderBy('created_at');
  }

  public function toutorials()
  {
    return $this->belongsToMany('App\Toutorial');
  }

  public function ordered()
  {
    return $this->hasMany('App\OderProduct');
  }

  public function stock()
  {
    $stocks = $this->stocks;
    return $stocks->first();
  }


  public function hasStock()
  {
    if($this->stock()){
      return true;
    }else{
      return false;
    }
  }
  public function offerPrice($price,$discountPercentage)
  {
    return $price-($price*($discountPercentage/100));
  }
  public function price()
  {
    $priceArray = array();
    if($this->hasStock()){
      $originalPrice = $this->stock()->selling_price;
      $priceArray['original'] = $originalPrice;
      if($this->stock()->hasOffer()){
        $offer = $this->stock()->offer();
        $priceArray['offer'] = $this->offerPrice($originalPrice,$offer->percentage);
      }
    }else{
        $priceArray['original'] = "Out Of Stock";
    }
    return $priceArray;
  }
  public function priceShow($value)
  {
    $price_array = $this->price();
    if(array_key_exists($value,$price_array)) {
      if(is_numeric($price_array[$value])){
        return "৳ ".$price_array[$value]." Tk";
      }else{
        return $price_array['original'];
      }

    }
  }




    // public function hasStock()
    // {
    //     $id = $this->id;
    //     $stocks = Stock::where('product_id',$id);
    //     if($stocks->count())
    //     {
    //         $stocks = $stocks->where('quantity','>',0);
    //         if($stocks->count())
    //         {
    //             return true;
    //         }
    //     }
    //     return false;
    // }
}
