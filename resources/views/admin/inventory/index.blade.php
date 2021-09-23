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
                            <th style="width: 10px">Sl No</th>
                            <th>Inventory Type</th>
                            <th> Category</th>
                            <th>Name</th>
                            <th>Details</th>
                            <th>Size</th>
                            <th>Upload Image</th>
                            <th>Type</th>
                            <th>Flavor</th>
                            <th>Price per carton</th>
                            <th>Quantity</th>
                            <th>total price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inventories as $inventory)
                            <tr>
                                <td>{{$serial++}}</td>
                                <td>{{$inventory->inventory_type}}</td>
                                <td>{{$inventory->category}}</td>
                                <td>{{$inventory->name}}</td>
                                <td>{{$inventory->details}}</td>
                                <td>{{$inventory->size}}</td>
                                <td>{{$inventory->image}}</td>
                                <td>{{$inventory->type}}</td>
                                <td>{{$inventory->flavor}}</td>
                                <td>{{$inventory->price_per_carton}}</td>
                                <td>{{$inventory->quantity}}</td>
                                <td>{{$inventory->total_price}}</td>
                                <td>{{$inventory->status}}</td>
                                <td class="text-center">
                                    <a  href="{{route('inventory.edit',[$inventory->inventory_type,$inventory->id])}}" class="btn btn-info btn-sm">
                                        <i class="fa fa-edit"></i>Edit
                                    </a>
                                    <a  href="{{route('stock.edit',$inventory->id)}}" class="btn btn-info btn-sm"  >
                                        <i class="fa fa-edit"></i>Add stock
                                    </a>


                                    <form class="" action="{{route('inventory.destroy',$inventory->id)}}" method="post" style="display:inline">
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
                        <li class="page-item"><a class="page-link" href="{{$inventories->previousPageUrl()}}">&laquo;</a></li>
                        @for($i=1;$i<=$inventories->lastPage();$i++)
                            <li class="page-item"><a class="page-link" href="{{$inventories->url($i)}}">{{$i}}</a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" href="{{$inventories->nextPageUrl()}}">&raquo;</a></li>
                    </ul>
                </div>
                <!-- Pagination ends -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->

    </div>
@endsection


