<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $fillable = [
      'user_id','phone','address','town_city','state_country','postcode_zip'
  ];
  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
