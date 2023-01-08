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
                                <li class="breadcrumb-item"> {{trans('product.product_list')}}
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
                        <h4 class="card-title" id="basic-layout-form"> {{trans('product.product_list')}} </h4>
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
                                <th>{{trans('product.image')}}</th>
                                <th> {{trans('product.name')}} </th>
                                <th>{{trans('product.description')}}</th>
                                <th>{{trans('product.quantity')}}</th>
                                <th>{{trans('product.category_name')}}</th>
                                <th> {{trans('product.update')}} </th>
                                <th> {{trans('product.delete')}} </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if(!empty($product->image))
                                            <div style="width: 100px; height: 100px">
                                            <img src="{{asset($product->image)}}" style="width: 100%;height: 100%;">
                                            </div>
                                        @endif
                                    </td>
                                    <td> {{$product->name}} </td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('Product.edit',$product->id) }}"> <i class="fa fa-edit"></i> </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" href="{{route('Product.destroy',$product->id)}}"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{trans('product.image')}}</th>
                                <th> {{trans('product.name')}} </th>
                                <th>{{trans('product.description')}}</th>
                                <th>{{trans('product.quantity')}}</th>
                                <th>{{trans('product.category_name')}}</th>
                                <th> {{trans('product.update')}} </th>
                                <th> {{trans('product.delete')}} </th>
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


