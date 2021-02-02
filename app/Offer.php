<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

  protected $fillable = [
      'stock_id', 'percentage', 'title', 'description'
  ];

  public function stock()
  {
    return $this->belongsTo(Stock::class);
  }
}
