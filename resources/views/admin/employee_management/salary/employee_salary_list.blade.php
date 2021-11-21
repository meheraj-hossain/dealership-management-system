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
                            <th>Employee Name</th>
                            <th>Employee Image</th>
                            <th>Assigned Area</th>
                            <th>Basic Salary</th>
                            <th>Bonus</th>
                            <th>Total Salary</th>
                            <th>Month</th>
                            <th>Is Approved?</th>
                            <th>Is Paid?</th>
                            <th>Payment Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salary_lists as $key=>$salary_list)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$salary_list->AreaManager->name}}</td>
                                <td><img src="{{$salary_list->AreaManager->image}}" alt="" height="90px" width="75px"></td>
                                <td>{{$salary_list->AreaManager->Area->name}}</td>
                                <td>{{$salary_list->salary}}</td>
                                <td>{{$salary_list->bonus}}</td>
                                <td>{{$salary_list->bonus+$salary_list->salary}}</td>
                                <td>{{$salary_list->month}}</td>
                                <td>{{$salary_list->is_approved}}</td>
                                <td>{{$salary_list->is_paid}}</td>
                                <td>{{$salary_list->payment_date}}</td>
{{--                                <td class="text-center">--}}
{{--                                    <a  href="{{route('area_manager.edit',$area_manager->id)}}" class="btn btn-info btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i>Edit--}}
{{--                                    </a>--}}
{{--                                    <form class="" action="{{route('area_manager.destroy',$area_manager->id)}}" method="post" style="display:inline">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button title="Delete" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">--}}
{{--                                            <i class="fa fa-trash"></i>Delete--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- Pagination -->
                <div class="card-footer clearfix">
{{--                    <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                        <li class="page-item"><a class="page-link" href="{{$area_managers->previousPageUrl()}}">&laquo;</a></li>--}}
{{--                        @for($i=1;$i<=$area_managers->lastPage();$i++)--}}
{{--                            <li class="page-item"><a class="page-link" href="{{$area_managers->url($i)}}">{{$i}}</a></li>--}}
{{--                        @endfor--}}
{{--                        <li class="page-item"><a class="page-link" href="{{$area_managers->nextPageUrl()}}">&raquo;</a></li>--}}
{{--                    </ul>--}}
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection

