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
                            <th>Commission</th>
                            <th>Total Salary</th>
                            <th>Month</th>
                            <th>Is Approved?</th>
                            <th>Is Paid?</th>
                            <th>Payment Date</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($salary_lists as $salary_list)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$salary_list->AreaManager->name}}</td>
                                <td><img src="{{$salary_list->AreaManager->image}}" alt="" height="90px" width="75px"></td>
                                <td>{{$salary_list->AreaManager->Area->name}}</td>
                                <td>{{isset($salary_list->salary)?$salary_list->salary:0}}/-</td>
                                <td>{{isset($salary_list->bonus)?$salary_list->bonus:0}}/-</td>
                                <td>{{isset($salary_list->commission)?$salary_list->commission:0}}/-</td>
                                <td>BDT. {{$salary_list->bonus+$salary_list->salary+$salary_list->commission}}</td>
                                <td>{{$salary_list->month}}</td>
                                <td>{{$salary_list->is_approved}}</td>
                                <td>{{$salary_list->is_paid}}</td>
                                <td>{{$salary_list->payment_date}}</td>
                                <td class="text-center">
                                    @if($salary_list->is_approved != 'Yes')
                                    <a  href="{{route('employee.isApproved',$salary_list->id)}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Is Approved?
                                    </a>
                                        @elseif($salary_list->is_paid != 'Yes')
                                        <a  href="{{route('employee.isPaid',$salary_list->id)}}" class="btn btn-info btn-sm">
                                            <i class="fa fa-edit"></i>Is Paid?
                                        </a>

                                        @endif
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
                        <li class="page-item"><a class="page-link" href="{{$salary_lists->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$salary_lists->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$salary_lists->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$salary_lists->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection

