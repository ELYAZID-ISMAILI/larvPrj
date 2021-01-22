<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{ /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
   protected $fillable = [
       'area',
       'city',
       'postal_code',
   ];

   public function user()
   {
       return $this->belongsTo('App\User','user_id','id');
   }
}
