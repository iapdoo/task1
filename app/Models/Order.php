<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=['user_id','Total'];

    public function products(){
//        return $this->belongsToMany('App\Models\Product','order_products','order_id','product_id','id','id');
        return $this->belongsToMany('App\Models\Product','order_products','order_id','product_id','id','id')->withPivot( 'quantity' );
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

//$products=$request->products;
//$quantities=$request->quantity;
//for ($i=0; $i<count($products); $i++){
//$product=Product::where('id',$products[$i])->first();
//$product->update(['quantity'=>$product->quantity-$quantities[$i]]);
//OrderProduct::create(['order_id'=>$order->id,'product_id'=>$products[$i],'quantity'=>$quantities[$i]]);
//}
}
