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
{{--                            <th style="width:200px">Action</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($return_Products as $return_product)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$return_product->User->name}}</td>
                                <td>{{$return_product->Inventory->name}}</td>
                                <td>{{$return_product->quantity}}</td>
                                <td>{{$return_product->status}}</td>
                                <td>{{(isset($return_product->reason)?$return_product->reason:'Reason will be set by Area Manager')}}</td>
                                <td>{{date('d M Y',strtotime($return_product->created_at))}}</td>
{{--                                @if(\Illuminate\Support\Facades\Auth::user()->action_table == 'App\AreaManager')--}}
{{--                                <td class="text-center">--}}
{{--                                    <a  href="{{route('return_product.edit',$return_product->id)}}" class="btn btn-info btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i>Check--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                                @elseif(\Illuminate\Support\Facades\Auth::user()->action_table == 'App\Admin')--}}
{{--                                    <a  href="{{route('return_product.edit',$return_product->id)}}" class="btn btn-info btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i>Approve--}}
{{--                                    </a>--}}
{{--                                    @endif--}}
                            </tr>
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
