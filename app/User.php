<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'full_name',
        'email',
        'password',
        'phone',
        'prev_password',
        'address_id'
    ];

   public function addresses()
    {
    	return $this->hasMany('App\Address', 'user_id', 'id');
    }
   /* public function sales()
    {
    	return $this->hasMany('App\Sale', 'user_id', 'id');
    }*/
}
