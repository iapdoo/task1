@extends('Admin.layouts.master')

@section('content')
    <!-- Main content -->
    <div class="app-content content">
        <div class="content-wrapper" style="margin: auto">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{trans('admin.Dashboard')}} </a>
                                </li>
                                <li class="breadcrumb-item"> {{trans('admin.Testimonial')}}
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-xm-12">
                        <div class="card ">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form"> {{trans('admin.Testimonial')}} </h4>
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
                            <div class="card-body">
                                @include('Admin.layouts.massage')
                                <table id="example2" class="table table-bordered table-hover  ">
                                    <thead>
                                    <tr>
                                        <th> {{trans('admin.User_Name')}} </th>
                                        <th>{{trans('admin.User_E-mail')}}</th>
                                        <th style="width: 60%;">{{trans('admin.opinion')}}</th>
                                        <th> {{trans('admin.status')}} </th>
                                        <th> {{trans('admin.actions')}} </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($testimonials as $testimonial)
                                        <tr>

                                            <td> {{$testimonial->user->name}} </td>
                                            <td> {{$testimonial->user->email}} </td>
                                            <td>{{$testimonial->opinion}}</td>
                                            <td>{{$testimonial->getActive()}}</td>
                                            <td>
                                                <a class="btn btn-danger" href="{{route('testimonial.destroy',$testimonial->id)}}"> <i class="fa fa-trash"></i> </a>
                                                <a href="{{route('testimonial.status',$testimonial->id)}}"
                                                   class="btn btn-outline-warning btn-min-width box-shadow-3 mr-1 mb-1">
                                                    @if($testimonial->status == 0)
                                                        تفعيل
                                                    @else
                                                        اللغاء تفعيل
                                                    @endif
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th> {{trans('admin.User_Name')}} </th>
                                        <th>{{trans('admin.User_E-mail')}}</th>
                                        <th>{{trans('admin.opinion')}}</th>
                                        <th> {{trans('admin.status')}} </th>
                                        <th> {{trans('admin.actions')}} </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->
            </section>
        </div>
    </div>
@endsection
@section('footer')

    <script src="{{url('/design/adminlte/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{url('/design/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{url('/design/adminlte/dist/js/adminlte.min.js')}}"></script>
    <script src="{{url('/design/adminlte/dist/js/demo.js')}}"></script>

    <script type="text/javascript">
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
        })
    </script>
@endsection


