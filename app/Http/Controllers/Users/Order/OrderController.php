<?php

namespace App\Http\Controllers\Users\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Cart_Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function addOrder(OrderRequest $request)
    {
//dd($request);
        try {
            DB::beginTransaction();
            $user = auth('web')->user();
            $order = $user->orders()->create(['Total' => request('Total')]); // insert into orders table user id and total price

//            $order->products()->attach($request->products); add products with attach method

            $products=$request->products;
            $quantities=$request->quantity;
             for ($i=0; $i<count($products); $i++){
                 $product=Product::where('id',$products[$i])->first();
                 // update base table product add new quantity after insert order quantity
                 $product->update(['quantity'=>$product->quantity-$quantities[$i]]);
                 //insert into orderProduct order id product id and quantity for only product
                 OrderProduct::create(['order_id'=>$order->id,'product_id'=>$products[$i],'quantity'=>$quantities[$i]]);
             }



            Cart_Product::where('product_id', $request->id)->delete();
            DB::commit();
            return redirect()->route('cart.cartlist')->with(['success' => trans('massage.success')]);
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error' => trans('massage.error')]);
        }
    }

}
