@extends('website.home')

@section('content')
    <!-- start Testimonial us  -->
    <div class="contact-us">
        <div class="container">
            @include('website.layouts.massage')
            <h2 class="contact-hesd text-center h1 head-border-center uppercase">{{trans('admin.Testimonial')}} </h2>
            <div class="row mb-4">
                <div class="col-md-12 mb-md-0 mb-5">
                    <form action="{{route('create.Testimonial')}}" method="post">
                    @csrf
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input class="form-control input-lg" type="text" name="name"
                                   placeholder="{{trans('admin.Enter_Your_Name')}}"
                                   value="{{Auth::user() ? Auth::user()->name : ""}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input class="form-control input-lg" type="text" name="email"
                                   placeholder="{{trans('admin.Enter_Your_E-mail')}}"
                                   value="{{Auth::user() ? Auth::user()->email : ""}}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input class="form-control input-lg" type="text" name="opinion_en"
                                   placeholder="{{trans('admin.Enter_Your_Subject_en')}}">

                        </div>
                    </div>
                        <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input class="form-control input-lg" type="text" name="opinion_ar"
                                   placeholder="{{trans('admin.Enter_Your_Subject_ar')}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="{{trans('admin.send')}}" class="contact-btn">
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
