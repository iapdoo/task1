<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('admin.Dashboard')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- Admins-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-text">{{trans('admin.admins')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('admin.AllAdmins')}}">{{trans('admin.admins_list')}}</a></li>
                            <li><a href="{{route('admin.create')}}">{{trans('admin.admins_add')}}</a></li>

                        </ul>
                    </li>

                    <!-- Category-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">{{trans('category.category')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Category.index')}}">{{trans('category.category_list')}}</a></li>
                            <li><a href="{{route('Category.create')}}">{{trans('category.category_add')}}</a></li>
                        </ul>
                    </li>
                    <!-- Product-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('product.product')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Product.index')}}">{{trans('product.product_list')}}</a></li>
                            <li><a href="{{route('Product.create')}}">{{trans('product.product_add')}}</a></li>
                        </ul>
                    </li>
                    <!-- Partner-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Partner-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('partner.partner')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Partner-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Partner.index')}}">{{trans('partner.partner_list')}}</a></li>
                            <li><a href="{{route('Partner.create')}}">{{trans('partner.partner_add')}}</a></li>
                        </ul>
                    </li>
{{--                    <a href="{{route('Testimonial.showindex')}}" class="nav-link  {{request()->routeIs('Testimonial.showindex') ? 'active' : ''}}">--}}
                        <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#testimonials-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('admin.Testimonial')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="testimonials-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('testimonial.showindex')}}">{{trans('admin.Testimonial')}}</a></li>
                        </ul>
                    </li>
                    {{--start orders--}}
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#orders-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">{{trans('admin.orders')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="orders-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('orders.showindex')}}">{{trans('admin.orders')}}</a></li>
                        </ul>
                    </li>
                    {{--end orders--}}
                </ul>
            </div>
        </div>
