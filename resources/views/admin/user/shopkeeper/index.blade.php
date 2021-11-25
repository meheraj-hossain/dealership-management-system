@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6 text-right">
        <a href="{{route('shopkeeper.create')}}" class="btn btn-warning pull-right addNew">Register New shop</a>
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
                            <th>Date of Birth</th>
                            <th>National ID</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shopkeepers as $shopkeeper)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$shopkeeper->name}}</td>
                                <td>{{$shopkeeper->date}}</td>
                                <td>{{$shopkeeper->nid}}</td>
                                <td>{{$shopkeeper->email}}</td>
                                <td>{{$shopkeeper->phone}}</td>
                                <td><img src="{{asset($shopkeeper->image)}}" style="height: 120px;width: 110px" alt=""></td>
                                <td>{{$shopkeeper->address}}</td>
                                <td class="text-center">
                                    <a  href="{{route('shopkeeper.edit',$shopkeeper->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <form class="" action="{{route('shopkeeper.destroy',$shopkeeper->id)}}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i>Delete
                                        </button>
                                    </form>
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
                        <li class="page-item"><a class="page-link" href="{{$shopkeepers->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$shopkeepers->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$shopkeepers->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$shopkeepers->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection


