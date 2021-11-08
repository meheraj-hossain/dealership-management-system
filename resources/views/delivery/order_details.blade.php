@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pending Orders</li>
            <li class="breadcrumb-item active">Order Details</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                    @if($orders->order_status=='Pending' && $user_role =='App\Admin')
                        <h3 class="card-title" style="float: right"><a href="{{route('order.status',$orders->id)}}" class="btn btn-primary" > <i class="fa fa-user-edit"></i> Approve Order?</a></h3>
                    @elseif($orders->order_status=='Approved' && $user_role == 'App\AreaManager')
                        <h3 class="card-title" style="float: right"><a href="{{route('order.status',$orders->id)}}" class="btn btn-secondary" > <i class="fa fa-user-edit"></i> Shipped Order?</a></h3>
                    @elseif($orders->order_status=='Shipped' && $user_role == 'App\Shopkeeper')
                        <h3 class="card-title" style="float: right"><a href="{{route('order.status',$orders->id)}}" class="btn btn-info" > <i class="fa fa-user-edit"></i> Received Order?</a></h3>
                    @elseif($orders->order_status=='Recieved' && $user_role == 'App\Admin')
                        <h3 class="card-title" style="float: right"><a href="{{route('order.status',$orders->id)}}" class="btn btn-success" > <i class="fa fa-user-edit"></i> Delivered Ordered?</a></h3>
                    @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
{{--                            <th style="width: 10px">Sl No</th>--}}
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Product Type</th>
                            <th>Product Size</th>
                            <th>Product Flavor</th>
                            <th>Product Price</th>
                            <th>Quantity</th>
                            <th>Total</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders->OrderDetail as $key=>$order_detail)
                            <tr>
                                <td>{{++$key}}</td>
{{--                                <td>{{$order->order_id}}</td>--}}
                                <td>{{$order_detail->Inventory->name}}</td>
                                <td>{{$order_detail->Inventory->BeverageType->name}}</td>
                                <td>{{$order_detail->Inventory->BeverageSize->name}}</td>
                                <td>{{$order_detail->Inventory->BeverageFlavor->name}}</td>
                                <td>{{$order_detail->Inventory->quantity}}</td>
                                <td>{{$order_detail->quantity}}</td>
                                <td>BDT.{{$order_detail->total}}</td>
{{--                                <td class="text-center">--}}
{{--                                    <a  href="{{route('order.details',$order->id)}}" class="btn btn-info btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i>Order Details--}}
{{--                                    </a>--}}
{{--                                    --}}{{--                                    <form class="" action="{{route('area_manager.destroy',$order->id)}}" method="post" style="display:inline">--}}
{{--                                    --}}{{--                                        @csrf--}}
{{--                                    --}}{{--                                        @method('delete')--}}
{{--                                    --}}{{--                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">--}}
{{--                                    --}}{{--                                            <i class="fa fa-trash"></i>Delete--}}
{{--                                    --}}{{--                                        </button>--}}
{{--                                    --}}{{--                                    </form>--}}
{{--                                </td>--}}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- Pagination -->
{{--                <div class="card-footer clearfix">--}}
{{--                    <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                        <li class="page-item"><a class="page-link" href="{{$orders->previousPageUrl()}}">&laquo;</a></li>--}}
{{--                        @for($i=1;$i<=$orders->lastPage();$i++)--}}
{{--                            <li class="page-item"><a class="page-link" href="{{$orders->url($i)}}">{{$i}}</a></li>--}}
{{--                        @endfor--}}
{{--                        <li class="page-item"><a class="page-link" href="{{$orders->nextPageUrl()}}">&raquo;</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection
