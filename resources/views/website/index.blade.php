@extends('website.home')

@section('content')
        <div class="header">
            <div class="overlay">
                <div class="container">
                    <div class="row center-vh">
                        <div class="col-md-6 " style="float: left">
                            <div class="word-rtl word-rtl-category">
                                <div class="button">
                                <span>
                                    {{trans('admin.BEST_AVAILABLE')}}
                                </span>
                                </div>
                            <h1 class="uppercase ">{{trans('admin.book_store')}}</h1>
                            <p class=" uppercase">

                            </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--end header-->
        <!--start services-->
        @include('website.home.our-Services')
        <!--end our services-->

        <!--start our-product-->
        @include('website.home.our-product')
        <!--end our our-product-->
        <!--end banner-section-->
        @include('website.home.banner-section')
        <!--start banner-section-->
        <!-- start price section -->
        @include('website.home.ourCategory')
        <!-- end price section -->
        <!-- start price section -->
        @include('website.Testimonial.index')
        <!-- end price section -->
        <!-- start price section -->
        @include('website.home.partner')
        <!-- end price section -->
@endsection

