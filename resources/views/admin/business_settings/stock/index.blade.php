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
                            <th>Inventory ID</th>
                            <th>Added Stocks</th>
                            <th>Purchase Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stocks as $stock)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$stock->inventory_id}}</td>
                                <td>{{$stock->stock}}</td>
                                <td>{{$stock->created_at}}</td>
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



