@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pending Orders</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">Sl No</th>
                            <th>Customer Name</th>
                            <th>Order ID</th>
                            <th>Shop Name</th>
                            <th>Shop Address</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Order_Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($deliveries as $delivery)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$delivery->User->name}}</td>
                                <td>{{$delivery->order_id}}</td>
                                <td>{{$delivery->User->Shopkeeper->ShopRegistration->name}}</td>
                                <td>{{$delivery->User->Shopkeeper->ShopRegistration->address}}</td>
                                <td>BDT.{{$delivery->total}}</td>
                                <td>{{$delivery->created_at}}</td>
                                <td>{{$delivery->order_status}}</td>
                                <td class="text-center">
                                    <a  href="{{route('order.details',$delivery->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Order Details
                                    </a>
{{--                                    <form class="" action="{{route('area_manager.destroy',$delivery->id)}}" method="post" style="display:inline">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">--}}
{{--                                            <i class="fa fa-trash"></i>Delete--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- Pagination -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="{{$deliveries->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$deliveries->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$deliveries->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$deliveries->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection
