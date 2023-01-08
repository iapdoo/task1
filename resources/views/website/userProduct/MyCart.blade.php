@extends('website.home')

<section id="slider-sec" class="slider-sec parallax"
         style="background: url(https://megaone.acrothemes.com/book-shop/img/banner1.3.jpg) center 34.0188px / cover no-repeat fixed;">
</section>
<section class="container">
<?php
    $total=0;
    ?>
    <!-- /.row -->
    <div class="row pt-5">
        @include('website.layouts.massage')
        <div class="col-12 col-md-12  cart_table wow fadeInUp" data-wow-delay="300ms"
             style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;margin-top: 100px;">
            <table class="table table-bordered border-radius table-responsive" style="    margin-bottom: 0;">
                <thead>
                <tr>
                    <th class="darkcolor">{{trans('admin.products')}}</th>
                    <th class="darkcolor"> {{trans('admin.price')}} </th>
                    <th class="darkcolor">{{trans('admin.quantity')}} </th>
                    <th class="darkcolor">{{trans('admin.update')}}</th>
                    <th class="darkcolor"> {{trans('admin.delete')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($productList as $products)
                    @foreach($products -> products as $product)
                    <tr>
                        <td>
                            <div class="d-table product-detail-cart">

                                <div class="media">
                                    <div class="row no-gutters">
                                        <div class="col-12 col-lg-2 product-detail-cart-image">
                                            <img src=" {{asset( $product->image)}}"
                                                 class="w-20 rounded" alt="Thumbnail"
                                                 style="width: 100%;height: 100%;">
                                        </div>
                                        <div class="col-12 col-lg-10 mt-auto product-detail-cart-data">
                                            <div class="media-body ml-lg-3">
                                                <h4 class="product-name">
                                                    <p class="mb-2 md:ml-4 uppercase"> {{ $product->name}}</p>
                                                </h4>
                                                <p class="product-des">{{$product->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h4 class="text-center amount">${{$product->price}}</h4>
                        </td>


                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <td class="text-center">
                                <div class="quote text-center mt-1">

                                    <input type="hidden" name="id" value="{{ $product->id}}">
                                    <input type="number" name="quantity" value="{{ $product->pivot->quantity }}"
                                           class="w-6 text-center bg-gray-300" min="1"
                                           max="{{$product->quantity}}"/>
                                </div>

                            </td>
                            <td>
                                <button type="submit" class="btn yellow-color-green-gradient-btn">
                                    {{trans('admin.update')}}
                                </button>
                            </td>
                        </form>
                        <td>
                            <form action="{{ route('cart.remove',$product->id) }}" method="POST" style="margin: 0px;">
                                @csrf
                                <button class="btn btn-danger">x</button>
                            </form>
                        </td>
                    </tr>
                        <?php  $total += $product->pivot->quantity * $product->price ?>
                    @endforeach
                @endforeach
                </tbody>
            </table>
            @if($productList -> product<0)
            <div class="apply_coupon">
                <div class="row">
                    <div class="col-12 text-left">
                        <div>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                        <input type="hidden" name="id" value="{{ $product->id}}">
                                <button class="btn yellow-color-green-gradient-btn">Remove All Cart</button>

                                <button class="btn green-color-yellow-gradient-btn ">CHECKOUT</button>
                            </form>

                        </div>

                        <div>
                            <form action="{{ route('order.add') }}" method="POST">
                                @csrf
                                @foreach ($productList as $products)
                                    @foreach($products -> products as $product)
                                        <input type="hidden" name="id" value="{{ $product->id}}">
                                        <input type="hidden" name="products[]" value="{{$product->id}}">
                                        <input type="hidden" name="quantity[]" value="{{$product->pivot->quantity}}">
                                        <input type="hidden" name="Total" value="{{$total}}">

                                @endforeach
                                @endforeach

                                <button class="btn btn-success">Add Order</button>
                            </form>
                        </div>

                    </div>
                    <!--                            <div class="col-6  coupon text-left">-->
                    <!--                                <a href="shop-cart.html" class="btn pink-color-black-gradient-btn ">CHECKOUT</a>-->
                    <!--                            </div>-->
                </div>
            </div>
                @endif
        </div>
    </div>
    <div class="row pt-5" style="padding: 100px 0px">
        <div class="col-12 col-lg-6 wow slideInLeft" data-wow-duration="2s"
             style="visibility: visible; animation-duration: 2s; animation-name: slideInLeft;">
            <div class="calculate-shipping">
                <h4 class="heading">Calculate Shipping</h4>
                <form>
                    <div class="form-group">
                        <label class="form-control" for="sel1">
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
        <div class="col-12 col-lg-6 wow slideInRight" data-wow-duration="2s"
             style="visibility: visible; animation-duration: 2s; animation-name: slideInRight;">
            <div class="card-total">
                <h4 class="heading">Card Total</h4>
                <table>
                    <tbody>
                    <tr>
                        <td>Subtotal</td>
                        <div>
{{--                            Total: ${{ Cart::getTotal() }}--}}
                        </div>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>
                            <ul class="color-grey">
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="flat-rate" name="shipping" class="custom-control-input"
                                               checked="">
                                        <label class="custom-control-label" for="flat-rate">Flat Rate :
{{--                                            ${{ Cart::getTotal() }}--}}
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="free-shipping" name="shipping"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="free-shipping">Free Shipping</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cod-shipping" name="shipping"
                                               class="custom-control-input">
                                        <label class="custom-control-label" for="cod-shipping">Cash on Delivery</label>
                                    </div>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Total</td>
{{--                        <td> ${{ Cart::getTotal() }}--}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>

