<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
  protected $fillable = [
      'name', 'model', 'description', 'brand','image1','image2','image3','image4','category_id'
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
  public function hasStockRow()
    {
        $id = $this->id;
        $stocks = Stock::where('product_id',$id);
        if($stocks->count())
        {
            return true;
        }
        return false;
    }

    public function price()
    {
        if($this->hasStockRow())
        {
            $stocks = $this->stocks();
            $temp = $stocks->whereRaw('quantity > sold');
            if($temp->count())
            {
                return $temp->first()->selling_price;
            }
            else
            {
                return $this->stocks->last()->selling_price;
            }
        }
        return 9999;
    }

    public function offerPrice($price,$discountPercentage)
    {
      return $price-($price*($discountPercentage/100));
    }

    public function hasStock()
    {
        $id = $this->id;
        $stocks = Stock::where('product_id',$id);
        if($stocks->count())
        {
            $stocks = $stocks->where('quantity','>',0);
            if($stocks->count())
            {
                return true;
            }
        }
        return false;
    }
}
