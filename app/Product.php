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
}
