@extends('Admin.layouts.master')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper" style="margin: auto">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('admin.Dashboard')}} </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.AllAdmins')}}">{{trans('admin.admins_list')}} </a>
                                </li>
                                <li class="breadcrumb-item active">{{trans('admin.admins_edit')}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> {{trans('admin.admins_edit')}} </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('Admin.layouts.massage')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.update',$admins->id)}}"
                                              method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$admins->id}}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-home"></i> {{trans('admin.admins_info')}} </h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('admin.name_ar')}} </label>
                                                            <input type="text" value="{{$admins->getTranslation('name', 'ar')}}" name="name_ar"
                                                                   class="form-control"
                                                                   placeholder="  {{trans('admin.name_ar')}} ">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('admin.name_en')}} </label>
                                                            <input type="text" value="{{$admins->getTranslation('name', 'en')}}" name="name_en"
                                                                   class="form-control"
                                                                   placeholder="  {{trans('admin.name_en')}} ">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('admin.email')}} </label>
                                                            <input type="text" value="{{$admins->email}}" name="email"
                                                                   class="form-control"
                                                                   placeholder="  {{trans('admin.email')}} ">
                                                            @error("email")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">  {{trans('admin.password')}} </label>
                                                            <input type="password" name="password"
                                                                   class="form-control"
                                                                   placeholder="  {{trans('admin.password')}} ">
                                                            @error("password")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="status"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($admins -> status == 1)checked @endif/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('admin.status')}} </label>

                                                            @error("active")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="Is_admin"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   @if($admins -> Is_admin == 1)checked @endif/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{trans('admin.isAdmin')}} </label>

                                                            @error("active")
                                                            <span class="text-danger">{{$message}} </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i>{{trans('admin.back')}}
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i>{{trans('admin.save')}}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection
