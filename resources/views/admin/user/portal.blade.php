@extends('layout.admin.master')
@section('breadcrumb')
@endsection
@section('content')
    @if($user->action_table=='App\Shopkeeper')

    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{asset($user->Shopkeeper->image)}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$user->Shopkeeper->name}}</h3>
                            <p class="text-muted text-center">Shopkeeper</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>E-mail</b> <a class="float-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Password</b> <a class="float-right">********</a>
                            </li>
                        </ul>
                        <a href="" class="btn btn-primary btn-block"><b>Update Profile</b></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <strong><i class="fas fa-phone mr-1"></i> Phone</strong>

                    <p class="text-muted">
                        {{$user->Shopkeeper->phone}}
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                    <p class="text-muted">{{$user->Shopkeeper->address}}</p>

                    <hr>

                    <strong><i class="fas fa-house-user mr-1"></i> Shop Name</strong>

                    <p class="text-muted">
                        {{$user->Shopkeeper->ShopRegistration->name}}
                    </p>

                    <hr>

                    <strong><i class="fa fa-home mr-1"></i> Shop Address</strong>

                    <p class="text-muted">{{$user->Shopkeeper->ShopRegistration->address}}</p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Transaction</a></li>
                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
{{--                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>--}}
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>DUE</th>
                                    <th>PAID</th>
                                    <th>TOTAL</th>
                                </tr>
                                </thead>
                                <td>{{$due}}</td>
                                <tbody>
                                </tbody>
                            </table>
                                <button type="submit" class="btn btn-info float-right" data-toggle="modal" data-target="#modal-info" >Want to Pay?</button>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">

                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
                <div class="modal fade" id="modal-info">
                    <div class="modal-dialog">
                        <div class="modal-content bg-info">
                            <div class="modal-header">
                                <h4 class="modal-title">Info Modal</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Total Due :</p>
                                <div class="form-group">
                                    <label for="name">Amount</label>
                                    <input type="number" name="amount" value="" class="form-control" id="amount" placeholder="Enter Amount you want to pay" >
                                    @error('amount')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline-light">Pay</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
        </div>
        <!-- /.col -->
    </div>
        @elseif($user->action_table=='App\AreaManager')
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{asset($user->AreaManager->image)}}" alt="" height="100px" >
                            </div>
                            <h3 class="profile-username text-center">{{$user->AreaManager->name}}</h3>
                            <p class="text-muted text-center">Area Manager</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>E-mail</b> <a class="float-right">{{$user->email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Password</b> <a class="float-right">**********</a>
                                </li>
                            </ul>
                            <a href="" class="btn btn-primary btn-block"><b>Update Profile</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-phone mr-1"></i> Phone</strong>

                            <p class="text-muted">
                                {{$user->AreaManager->phone}}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                            <p class="text-muted">{{$user->AreaManager->address}}</p>

                            <hr>

                            <strong><i class="fas fa-house-user mr-1"></i> Area Name</strong>

                            <p class="text-muted">
                                {{$user->AreaManager->Area->name}}
                            </p>

                            <hr>

                            <strong><i class="fa fa-home mr-1"></i> Salary per Month</strong>

                            <p class="text-muted">BDT.{{$user->AreaManager->salary}}</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Salary Status</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Commission Status</a></li>
                                {{--                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>--}}
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>Basic Salary</th>
                                            <th>Bonus</th>
                                            <th>Total Salary</th>
                                            <th>Month</th>
                                            <th>Is Approved?</th>
                                            <th>Is Paid?</th>
                                            <th>Payment Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <td>{{$salary_status->salary}}</td>
                                        <td>{{$salary_status->bonus}}</td>
                                        <td>{{$salary_status->bonus+$salary_status->salary}}</td>
                                        <td>{{$salary_status->month}}</td>
                                        <td>{{$salary_status->is_approved}}</td>
                                        <td>{{$salary_status->is_paid}}</td>
                                        <td>{{$salary_status->payment_date}}</td>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
    @endif
@endsection

