@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6 text-right">
        <a href="{{route('shop_registration.create')}}" class="btn btn-warning pull-right addNew">Register New shop</a>
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
                            <th>Shop ID</th>
                            <th>Owner ID</th>
                            <th>Area</th>
                            <th>Address</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shops as $shop)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$shop->name}}</td>
                                <td>{{$shop->uniqueId}}</td>
                                <td>{{$shop->ownerId}}</td>
                                <td>{{$shop->area}}</td>
                                <td>{{$shop->address}}</td>
                                <td>{{$shop->image}}</td>
                                <td class="text-center">
                                    <a  href="{{route('shop_registration.edit',$shop->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <form class="" action="{{route('shop_registration.destroy',$shop->id)}}" method="post" style="display:inline">
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
                        <li class="page-item"><a class="page-link" href="{{$shops->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$shops->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$shops->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$shops->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection


