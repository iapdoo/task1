<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Cart_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    public function addToMyCart(Request $request)
    {

//        dd($request);
        try {
            DB::beginTransaction();
            Cart::updateOrCreate([
                'user_id' => auth()->user()->id,
            ]);

            $cart_id = Cart::where('user_id', auth()->user()->id)->first();
            Cart_Product::updateOrCreate([
                'cart_id' => $cart_id->id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);

//        return $cart_id->products()->sync($cart_id);
            DB::commit();
            return redirect()->route('cart.cartlist');

        } catch (\Exception $exception) {
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error' => trans('massage.error')]);
        }

    }


    public function cartlist()
    {
        try {
            $cart_id = Cart::where('user_id', auth()->user()->id)->first();
            $productList = Cart::with('products')->find($cart_id);
            return dd($productList);
            return view('website.userProduct.MyCart', compact('productList'));
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error' => trans('massage.error')]);
        }

    }


    public function removeCart($product_id)
    {
        try {
            Cart_Product::where('product_id', $product_id)->delete();
            return redirect()->back();
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error' => trans('massage.error')]);
        }

    }

    public function updateCart(Request $request)
    {
        try {
            Cart_Product::where('product_id', $request->id)->update([
                'quantity' => $request->quantity,
            ]);
            return redirect()->back();
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error' => trans('massage.error')]);
        }

    }


    static function cartItem()
    {
        try {
            if (!empty(auth()->user())) {
                $userId = auth()->user()->id;
                $products = Cart::where('user_id', $userId)->first();
                return Cart_Product::where('cart_id', $products->id)->with('products')->count();
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error' => trans('massage.error')]);
        }

    }


    public function clearAllCart(Request $request)
    {
        try {
            $product_cart = Cart_Product::where('product_id', $request->id)->first();
            Cart::where('id', $product_cart->cart_id)->delete();
            return redirect()->route('home');
        } catch (\Exception $exception) {
            return $exception->getMessage();
            return redirect()->back()->withErrors(['error' => trans('massage.error')]);
        }

    }
}
