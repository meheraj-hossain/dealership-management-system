@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6 text-right">
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
                            <th>Shopkeeper's Name</th>
                            <th> Product Name</th>
                            <th>Product Quantity</th>
                            <th>Status</th>
                            <th>Reason for Claiming</th>
                            <th>Claimed Date</th>
                            <th>Action</th>
                            {{--                            <th style="width:200px">Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($areas->ShopRegistration as $shopRegistration)
                            @foreach($shopRegistration->ReturnProducts as $key=>$order)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$shopRegistration->Shopkeeper->name}}</td>
                                    <td>{{$order->Inventory->name}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->status}}</td>
                                    <td>{{$order->reason}}</td>
                                    <td>{{date('d M y',strtotime($order->created_at))}}</td>
                                    <td class="text-center">
                                    <a  href="{{route('return_product.edit',$order->id)}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit"></i>Check
                                    </a>



                                        <form class="" action="{{route('return_product.destroy',$order->id)}}" method="post" style="display:inline">
                                            @csrf
                                            @method('delete')
                                            <button title="Delete" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fa fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- Pagination -->
            {{--                <div class="card-footer clearfix">--}}
            {{--                    <ul class="pagination pagination-sm m-0 float-right">--}}
            {{--                        <li class="page-item"><a class="page-link" href="{{$inventories->previousPageUrl()}}">&laquo;</a></li>--}}
            {{--                        @for($i=1;$i<=$inventories->lastPage();$i++)--}}
            {{--                            <li class="page-item"><a class="page-link" href="{{$inventories->url($i)}}">{{$i}}</a></li>--}}
            {{--                        @endfor--}}
            {{--                        <li class="page-item"><a class="page-link" href="{{$inventories->nextPageUrl()}}">&raquo;</a></li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}
            <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection

