@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6 text-right">
        <a href="{{route('area_manager.create')}}" class="btn btn-warning pull-right addNew">Register New Area Manager</a>
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
                        @foreach($area_managers as $area_manager)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$area_manager->name}}</td>
                                <td>{{$area_manager->date}}</td>
                                <td>{{$area_manager->nid}}</td>
                                <td>{{$area_manager->email}}</td>
                                <td>{{$area_manager->phone}}</td>
                                <td><img src="{{$area_manager->image}}" alt="" height="100px" ></td>
                                <td>{{$area_manager->Area->name}}</td>
                                <td>{{$area_manager->address}}</td>
                                <td class="text-center">
                                    <a  href="{{route('area_manager.edit',$area_manager->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <form class="" action="{{route('area_manager.destroy',$area_manager->id)}}" method="post" style="display:inline">
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
                        <li class="page-item"><a class="page-link" href="{{$area_managers->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$area_managers->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$area_managers->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$area_managers->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection


