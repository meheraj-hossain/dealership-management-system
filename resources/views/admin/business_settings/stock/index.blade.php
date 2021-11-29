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
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Added Stocks</th>
                            <th>Purchased Price</th>
                            <th>Total Purchased Price</th>
                            <th>Purchase Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$stock->Inventory->name}}</td>
                                <td><img src="{{$stock->Inventory->image}}" alt="" style="width: 60px" height="60px"></td>
                                <td>{{$stock->stock}}</td>
                                <td>{{$stock->purchased_price}}/-</td>
                                <td>{{$stock->purchased_price*$stock->stock}}/-</td>
                                <td>{{date('d M, Y',strtotime($stock->created_at))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- Pagination -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="{{$stocks->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$stocks->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$stocks->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$stocks->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection



