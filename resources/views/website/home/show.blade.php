@extends('website.home')
 <!-- Main content -->
@section('content')
<section id="slider-sec" class="slider-sec parallax" style="background: url(https://megaone.acrothemes.com/book-shop/img/banner1.3.jpg) center 34.0188px / cover no-repeat fixed;">
</section>
<div class=" parallax">

</div>
    <section class="container">

        <div class="row">
            <div class="col-12">
                        <div class="word-rtl-category">
                            <h1 class="uppercase" style="color: black;">{{trans('admin.Get_Ready_For_Checkout')}}</h1>
                            <p>
                                {{ $categories-> description  }}
                            </p>
                        </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        @if($categories->products->count() != 0)
        <div class="row pt-5">
            <div class="col-12 col-md-12  cart_table wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <table class="table table-bordered border-radius table-responsive" style="    margin-bottom: 0;">
                        <thead>
                        <tr>
                            <th class="darkcolor">{{trans('admin.products')}}</th>
                            <th class="darkcolor"> {{trans('admin.price')}} </th>
                            <th class="darkcolor">{{trans('admin.quantity')}} </th>
                            <th class="darkcolor">{{trans('admin.total')}}</th>
                        </tr>
                        </thead>
                        <tbody>
@foreach($categories->products()->get() as $product )
<tr>
    <td>
        <div class="d-table product-detail-cart">
            <div class="media">
                <div class="row no-gutters">
                    <div class="col-12 col-lg-2 product-detail-cart-image">
                        <a class="shopping-product" href="javascript:void(0)">
                            @if(!empty($product-> image))
                                <img src="{{asset( $product-> image)}}" style="width: 100%;height: 100%;">
                            @endif
                        </a>
                    </div>
                    <div class="col-12 col-lg-10 mt-auto product-detail-cart-data">
                        <div class="media-body ml-lg-3">
                            <h4 class="product-name">
                                <a class="uppercase " href="{{url('show_product_details/'.$product->id)}}"> {{$product-> name }} </a>
                            </h4>
                            <p class="product-des">{{ $product-> description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </td>
    <td>
        <h4 class="text-center amount">${{$product-> price}}</h4>
    </td>
    <td class="text-center">
        <div class="quote text-center mt-1">
            <input type="number" class="count qty " name="quantity"
                   value="0" min="1"  max="{{$product->first()->quantity}}" >
        </div>
    </td>
    <td>
        <h4 class="text-center amount" >${{ $product-> price * $product-> quantity}}</h4>
    </td>
</tr>
@endforeach
</tbody>
</table>
<div class="apply_coupon">
<div class="row">
<div class="col-12 text-left">
    <div class="col-12 col-lg-2">
    <a href="#" class="btn yellow-color-green-gradient-btn">UPDATE</a>
    </div>
    <div class="col-12 col-lg-2">
    <a href="#" class="btn green-color-yellow-gradient-btn ">CHECKOUT</a>
    </div>
    <div class="col-12 col-lg-2">
        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $product->id }}" name="id">
            <input type="hidden" value="{{ $product->name }}" name="name">
            <input type="hidden" value="{{ $product->price }}" name="price">
            <input type="hidden" value="{{ $product->image }}"  name="image">
            <input type="hidden" value="1" name="quantity">
            <button class="btn green-color-yellow-gradient-btn">Add To Cart</button>
        </form>

    </div>
</div>
</div>
</div>
</div>
</div>
            <div class="row pt-5" style="padding: 100px 0px">
                <div class="col-12 col-lg-6 wow slideInLeft" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: slideInLeft;">
                    <div class="calculate-shipping">
                        <h4 class="heading">Calculate Shipping</h4>
                        <form>
                            <div class="form-group">
                                <label class="form-control"  for="sel1" >
                                    <select class="select-input" name="country" id="sel1">
                                        <option>USA</option>
                                        <option>EGP</option>

                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="select form-control">
                                    <select class="select-input" name="country" id="state">
                                        <option>USA</option>
                                        <option>EGP</option>

                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Postal/Zip Code">
                            </div>
                            <a href="#" class="btn yellow-color-green-gradient-btn">Calculate</a>
                        </form>

                    </div>
                </div>
                <div class="col-12 col-lg-6 wow slideInRight" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: slideInRight;">
                    <div class="card-total">
                        <h4 class="heading">Card Total</h4>
                        <table>
                            <tbody><tr>
                                <td>Subtotal</td>
                                <td>$251.00</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>
                                    <ul class="color-grey">
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="flat-rate" name="shipping" class="custom-control-input" checked="">
                                                <label class="custom-control-label" for="flat-rate">Flat Rate : $49.00</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cod-shipping" name="shipping" class="custom-control-input">
                                                <label class="custom-control-label" for="cod-shipping">Cash on Delivery</label>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>$300.00</td>
                            </tr>
                            </tbody></table>
                    </div>
                </div>
            </div>
@else
<div class="alert alert-danger ">
<h2 style="text-align: center"> {{trans('admin.This_Category_Is_Empty')}} </h2>
</div>
@endif
</section>

@endsection

