<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

    public $translatable = ['name','description'];
    protected $table='products';
    protected $fillable=['name','description','image','category_id','price','quantity'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function orders(){
//        return $this->belongsToMany('App\Models\Order','order_products','product_id','order_id','id','id') ;
        return $this->belongsToMany('App\Models\Order','order_products','product_id','order_id','id','id')
            ->withPivot( 'quantity' )->withTimestamps();
    }

    public function cart(){
        return $this->belongsToMany('App\Models\Cart','cart__products','product_id','cart_id','id','id')
            ->withPivot( 'quantity' )->withTimestamps();
    }

}
