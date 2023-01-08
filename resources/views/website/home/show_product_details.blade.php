@extends('website.home')

@section('content')
    <section class="slider-sec parallax"
             style="background: url(https://megaone.acrothemes.com/book-shop/img/banner1.1.jpg) center 34.0188px / cover no-repeat fixed;">
    </section>
    <div class="about_content">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <div class="product-body">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb text-center text-lg-left">
                                <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('#')}}">Categories</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="{{url('#')}}">Books</a></li>
                                <li class="breadcrumb-item"><a class="active" href="{{url('#')}}">The Road</a></li>
                            </ol>
                        </nav>
                        <div class="pro-detail-sec row">
                            <div class="col-12">
                                <h4 class="pro-heading text-center text-lg-left">Books Collections</h4>
                                <p class="pro-text text-center text-lg-left">Neque porro quisquam est qui dolorem ipsum quia
                                    dolor sit amet, consectetur, adipisci velit.</p>
                            </div>
                        </div>
                        <div class="row product-list product-detail">
                            <div class="col-12 col-lg-5 product-detail-slider">
                                <div class="imageProduct">
                                    <img src="{{asset($product->image)}}" alt="Los Angeles" width="470"
                                         height="470">
                                </div>

                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="product-single">
                                    <div class="product-single-price">
                                        <h4><span class="real-price">${{$product->price}}</span> <span><del>${{$product->price + 100}}</del></span>
                                        </h4>
                                        <h1>{{trans('admin.description')}}</h1>
                                        <p class="pro-description">{{$product->description}}</p>
                                    </div>
                                    <div class="product-checklist">
                                        <ul>
                                            <li><i class="fa fa-check"></i> Satisfaction 100% Guaranteed</li>
                                            <li><i class="fa fa-check"></i> free shipping on orders over $99</li>
                                            <li><i class="fa fa-check"></i> 14 days easy Return</li>
                                        </ul>
                                    </div>
                                    <div class="product-quantity input_plus_mins no-gutters">


                                        <div class="col-12 col-lg-7">
{{--                                            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">--}}
                                            <form action="{{ route('cart.storetocart') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="product_id">
{{--                                                <input type="hidden" value="{{ $product->name }}" name="name">--}}
{{--                                                <input type="hidden" value="{{ $product->price }}" name="price">--}}
{{--                                                <input type="hidden" value="{{ $product->image }}"  name="image">--}}
                                                <div class="qty col-12 col-lg-3 d-lg-flex  align-items-lg-center d-inline-block">
                                                    <div class="quantity" style="float: right;">
                                                        <span class='minus'> - </span>
                                                        <input type="number" class="count qty " name="quantity"
                                                               value="0" min="1"  max="{{$product->quantity}}" >
                                                        <span class='plus' > + </span>
                                                    </div>
                                                </div>
                                                <button class="btn green-color-yellow-gradient-btn">Add To Cart</button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>


                    </div>

                </div>
            </div>

        </div>
    </div>

@endsection
