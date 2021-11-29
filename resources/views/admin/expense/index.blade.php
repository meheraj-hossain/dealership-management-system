@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6 text-right">
        <a href="{{route('expenses.create')}}" class="btn btn-warning pull-right addNew">Add New Information</a>
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
                            <th>Name</th>
                            <th>Details</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($expenses as $expense)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$expense->name}}</td>
                                <td>{{$expense->details}}</td>
                                <td>{{$expense->amount}}</td>
                                <td>{{$expense->created_at}}</td>
                                <td class="text-center">
                                    <a  href="{{route('expenses.edit',$expense->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
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
                        <li class="page-item"><a class="page-link" href="{{$expenses->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$expenses->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$expenses->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$expenses->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection


