@extends('layout.admin.master')
@push('css')
    <style>
        input.form-check-input {
            width: 20px;
            height: 20px;
        }
    </style>
@endpush
@section('breadcrumb')
    <div class="col-sm-6 text-right">
    </div>
@endsection
@section('content')
    <form action="{{route('employee.salaryListStore')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                    <div class="" style="float: right">
                        <label for="Month" style="padding:8px">Month :</label>
                        <div class="form-group" style="float: right">
                            <select class="form-control select2 user" id="month" name="month" style="width:268.417px;">
                                <option value="">Select Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        @error('month')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    @error('id')
                    <div class="alert alert-danger"><?php echo 'Select at least one employee'?></div>
                    @enderror
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th style="width: 10px">Sl No</th>
                            <th>Select</th>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>National ID</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Area Assigned</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Bonus</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($area_managers as $key=>$area_manager)
                            <tr>
                                <td>{{++$key}}</td>
                                <td><div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$area_manager->id}}" name="id[]">
                                    </div>
                                </td>
                                <td>{{$area_manager->name}}</td>
                                <td>{{$area_manager->date}}</td>
                                <td>{{$area_manager->nid}}</td>
                                <td>{{$area_manager->email}}</td>
                                <td>{{$area_manager->phone}}</td>
                                <td><img src="{{$area_manager->image}}" alt="" height="100px" ></td>
                                <td>{{$area_manager->Area->name}}</td>
                                <td>{{$area_manager->address}}</td>
                                <td>{{$area_manager->salary}}</td>
                                <td><div class="form-group">
                                        <input type="number" name="bonus[{{$area_manager->id}}]" value="{{old('bonus')}}" class="form-control" id="bonus" placeholder="Enter Bonus Amount" >
                                    </div></td>
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
                    <h3 class="card-title float-right"><button type="submit" class="btn btn-primary">Submit</button></h3>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    </form>
@endsection
