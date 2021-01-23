<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'order_status',
        'price',
        'user_id'
    ];

    public function users()
    {
    	return $this->belongsTo('App\User','user_id','id');
    }
}
