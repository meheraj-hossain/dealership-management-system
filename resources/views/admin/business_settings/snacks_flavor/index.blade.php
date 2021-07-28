@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6 text-right">
        <a href="{{route('snacks_flavor.create')}}" class="btn btn-warning pull-right addNew">Add New</a>
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($snacks_flavors as $snacks_flavor)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$snacks_flavor->name}}</td>
                                <td>{{$snacks_flavor->details}}</td>
                                <td>{{$snacks_flavor->status}}</td>
                                <td class="text-center">
                                    <a  href="{{route('snacks_flavor.edit',$snacks_flavor->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <form class="" action="{{route('snacks_flavor.destroy',$snacks_flavor->id)}}" method="post" style="display:inline">
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
                        <li class="page-item"><a class="page-link" href="{{$snacks_flavors->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$snacks_flavors->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$snacks_flavors->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$snacks_flavors->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection


