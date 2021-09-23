@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6 text-right">
        <a href="{{route('inventory.create','beverages')}}" class="btn btn-warning pull-right addNew">Add New Beverages</a>
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

                            <th>Name</th>
                            <th> Existed Stock</th>
                            <th> Add Stock</th>

                        </tr>
                        </thead>
                        <tbody>

                            <tr><form role="form" action="{{route('stock.store')}}" method="post" >
                                    @csrf
                                <td>{{$inventory->name}}</td>
                                <td>{{$inventory->quantity}}</td>
                                <td>
                                        <input type="number" name="stock">
                                    @error('stock')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="inventory_id" value="{{$inventory->id}}">
                                    </td>
                                <td class="text-center">
                                   <button type="submit" class="btn btn-outline-primary btn-block"> save</button>

                                </td>
                                </form></tr>

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <!-- Pagination -->

                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection



