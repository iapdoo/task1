<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @if(app()->getLocale() == "ar")
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/website/website/css/styleAr.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/website/website/css/bootstrapAr.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/website/website/css/wow.css">
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/bootstrap-rtl.min.css">
        <link rel="stylesheet" href="{{url('/')}}/design/adminlte/dist/css/rtl/rtl.css">
    @else
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/website/website/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{url('/')}}/website/website/css/style.css">
    @endif
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/website/website/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="{{url('/')}}/website/website/css/wow.css">

</head>
<body>
<?php
    use App\Http\Controllers\CartController;
    $total=CartController::cartItem();
    ?>
<nav class="navbar navbar-inverse navbar-inverse navbar-fixed-top shadow-sm navbar-expand-md">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav navbar-right ml-auto">
                <li><a href="{{url('/')}}">{{trans('admin.home')}}</a></li>
                <li><a href="{{route('Testimonial')}}">{{trans('admin.Testimonial')}}</a></li>
                <li><a href="{{route('cart.cartlist')}} " class="flex items-center">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        @if(auth()->user())
                             {{ $total}}
                            @endif
                    </a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </a>
                    <div class="dropdown-menu dropdown dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <!-- Message Start -->
                                <div class="media">
                                    <div class="media-body">
                                        <P class="dropdown-item-title">
                                            <i class="fa fa-flag"></i>
                                            {{ $properties['native'] }}
                                        </P>

                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                        @endforeach
                    </div>

                </li>
            </ul>
        </div><!-- /.navbar-inverse -->
    </div><!-- /.container-fluid -->
</nav>

<!-- start header -->
