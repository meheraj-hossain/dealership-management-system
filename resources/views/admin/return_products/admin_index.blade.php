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
                        @foreach($deliveries as $key=>$delivery)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$delivery->User->Shopkeeper->name}}</td>
                                <td>{{$delivery->Inventory->name}}</td>
                                <td>{{$delivery->quantity}}</td>
                                <td>{{$delivery->status}}</td>
                                <td>{{$delivery->reason}}</td>
                                <td>{{date('d M y',strtotime($delivery->created_at))}}</td>
                                <td class="text-center">
                                    @if($delivery->status != 'Approved')
                                        <a  href="{{route('return_products.approve',$delivery->id)}}" class="btn btn-info btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-edit"></i>Approve?
                                        </a>
                                        @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection

