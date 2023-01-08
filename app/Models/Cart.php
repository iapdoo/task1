<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[

        'user_id',

    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function products(){
        return $this->belongsToMany('App\Models\Product','cart__products','cart_id','product_id','id','id')
            ->withPivot( 'quantity')->withTimestamps();
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }

}
