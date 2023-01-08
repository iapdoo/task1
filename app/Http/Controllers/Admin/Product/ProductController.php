<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $products=Product::all();
        return view('Admin.Product.index',compact('products','categories'));
    }
    public function create()
    { $categories=Category::all();
        return view('Admin.Product.create',compact( 'categories'));
    }

    public function store(ProductRequest $request)
    {
        try {
            if ($request->has('image')) {
                $filePath = UploadImage('products', $request->image);
            }
            $product=new Product();
            $product->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $product->description = ['en' => $request->description_en, 'ar' => $request->description_ar];
            $product->image = $filePath;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->save();
            return redirect()->route('Product.index')->with(['success'=>trans('massage.success')]);
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }
    public function edit($product_id)
    {
        try {
            $categories=Category::select('id','name')->get();
            $products=Product::find($product_id);
            if (!$products){
                return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
            }else{
                return view('Admin.Product.edit',compact('products','categories'));
            }

        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }


    public function update(ProductRequest $request, $product_id)
    {
        try {
            $products=Product::find($product_id);

            if (!$products){
                return redirect()->back()->withErrors(['error'=>trans('massage.no')]);
            }else{
                $products->update([
                    $products->name = ['en' => $request->name_en, 'ar' => $request->name_ar],
                    $products->description = ['en' => $request->description_en, 'ar' => $request->description_ar],
                    $products->category_id = $request->category_id,
                    $products->quantity = $request->quantity,
                    $products->price = $request->price,
                ]);
                if ($request->has('image')) {
                    $filePath = UploadImage('categories', $request->image);
                    File::delete($products->image);

                    $products->update([
                        $products->image = $filePath,
                    ]);
                }
                return redirect()->route('Product.index')->with(['success'=>trans('massage.update')]);
            }
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }
    public function destroy($product_id)
    {
        try {
            $product = Product::find($product_id);
            if (!$product) {
                return redirect()->back()->withErrors(['error'=>trans('massage.no')]);
            }

            $deleteImage= Str::after($product->image,'images/') ;
            $deleteImage=base_path('public/images/'.$deleteImage);
            unlink($deleteImage);
            $product->delete();
            return redirect()->route('Product.index')->with(['success'=>trans('massage.delete')]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }
    }
    public function show_product_details($id){
        try {
            $product=Product::find($id);
            if (!$product){
                return redirect()->back()->withErrors(['error'=>trans('massage.no')]);
            }
            return view('website.home.show_product_details',compact('product'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors(['error'=>trans('massage.error')]);
        }


    }
}
