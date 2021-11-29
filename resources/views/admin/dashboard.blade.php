@extends('layout.admin.master')
@section('content')
    <!-- Small boxes (Stat box) -->
    @if(\Illuminate\Support\Facades\Auth::user()->action_table == 'App\Admin')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        @php
                        $total_order = \App\Order::where('created_at',\Carbon\Carbon::today())->get()->count();
                            @endphp
                        {{$total_order}}
                    </h3>

                    <p>Today's Total Order</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>@php
                            $total_payment = \App\Transaction::where('created_at',\Carbon\Carbon::today())->get()->count();
                        @endphp
                        {{$total_payment}}</h3>

                    <p>Today's total Transactions</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>@php
                            $total_sale = \App\Transaction::where('created_at',\Carbon\Carbon::today())->sum('paid_amount');
                        @endphp
                        {{$total_sale}}</h3>

                    <p>Today's Total sale</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>@php
                            $total_product = \App\Inventory::get()->count();
                        @endphp
                        {{$total_product}}</h3>

                    <p>Total Products In The Inventory </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            </div>
        </div>

{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box bg-success">--}}
{{--                <div class="inner">--}}
{{--                    <h3>@php--}}
{{--                            $total_payment = \App\Stock::where('created_at',\Carbon\Carbon::today())->get()->count();--}}
{{--                        @endphp--}}
{{--                        {{$total_payment}}</h3>--}}

{{--                    <p>Today's total Transactions</p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="ion ion-stats-bars"></i>--}}
{{--                </div>--}}
{{--                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- ./col -->--}}
{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box bg-warning">--}}
{{--                <div class="inner">--}}
{{--                    <h3>@php--}}
{{--                            $total_sale = \App\Transaction::where('created_at',\Carbon\Carbon::today())->sum('paid_amount');--}}
{{--                        @endphp--}}
{{--                        {{$total_sale}}</h3>--}}

{{--                    <p>Today's Total sale</p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="ion ion-person-add"></i>--}}
{{--                </div>--}}
{{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!-- ./col -->--}}
{{--        <div class="col-lg-3 col-6">--}}
{{--            <!-- small box -->--}}
{{--            <div class="small-box bg-danger">--}}
{{--                <div class="inner">--}}
{{--                    <h3>@php--}}
{{--                            $total_product = \App\Inventory::get()->count();--}}
{{--                        @endphp--}}
{{--                        {{$total_product}}</h3>--}}

{{--                    <p>Total Products In The Inventory </p>--}}
{{--                </div>--}}
{{--                <div class="icon">--}}
{{--                    <i class="ion ion-pie-graph"></i>--}}
{{--                </div>--}}
{{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- ./col -->
    </div>
 @elseif(\Illuminate\Support\Facades\Auth::user()->action_table == 'App\AreaManager')
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            @php
                                $total_order_delivered = \App\Order::where('created_at',\Carbon\Carbon::today())->where('delivered_by',\Illuminate\Support\Facades\Auth::user()->id)->get()->count();
                            @endphp
                            {{$total_order_delivered}}
                        </h3>

                        <p>Today's delivered Order</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    {{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>@php
                                $total_shopkeeper = \App\Shopkeeper::where('created_at',\Carbon\Carbon::today())->get()->count();
                            @endphp
                            {{$total_shopkeeper}}</h3>

                        <p>Today's total Shopkeeper Registered</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    {{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                </div>
            </div>
            <!-- ./col -->
{{--            <div class="col-lg-3 col-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-warning">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>@php--}}
{{--                                $total_sale = \App\Transaction::where('created_at',\Carbon\Carbon::today())->sum('paid_amount');--}}
{{--                            @endphp--}}
{{--                            {{$total_sale}}</h3>--}}

{{--                        <p>Today's Total sale</p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-person-add"></i>--}}
{{--                    </div>--}}
{{--                    --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- ./col -->--}}
{{--            <div class="col-lg-3 col-6">--}}
{{--                <!-- small box -->--}}
{{--                <div class="small-box bg-danger">--}}
{{--                    <div class="inner">--}}
{{--                        <h3>@php--}}
{{--                                $total_product = \App\Inventory::get()->count();--}}
{{--                            @endphp--}}
{{--                            {{$total_product}}</h3>--}}

{{--                        <p>Total Products In The Inventory </p>--}}
{{--                    </div>--}}
{{--                    <div class="icon">--}}
{{--                        <i class="ion ion-pie-graph"></i>--}}
{{--                    </div>--}}
{{--                    --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                </div>--}}
{{--            </div>--}}

        {{--        <div class="col-lg-3 col-6">--}}
        {{--            <!-- small box -->--}}
        {{--            <div class="small-box bg-success">--}}
        {{--                <div class="inner">--}}
        {{--                    <h3>@php--}}
        {{--                            $total_payment = \App\Transaction::where('created_at',\Carbon\Carbon::today())->get()->count();--}}
        {{--                        @endphp--}}
        {{--                        {{$total_payment}}</h3>--}}

        {{--                    <p>Today's total Transactions</p>--}}
        {{--                </div>--}}
        {{--                <div class="icon">--}}
        {{--                    <i class="ion ion-stats-bars"></i>--}}
        {{--                </div>--}}
        {{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <!-- ./col -->--}}
        {{--        <div class="col-lg-3 col-6">--}}
        {{--            <!-- small box -->--}}
        {{--            <div class="small-box bg-warning">--}}
        {{--                <div class="inner">--}}
        {{--                    <h3>@php--}}
        {{--                            $total_sale = \App\Transaction::where('created_at',\Carbon\Carbon::today())->sum('paid_amount');--}}
        {{--                        @endphp--}}
        {{--                        {{$total_sale}}</h3>--}}

        {{--                    <p>Today's Total sale</p>--}}
        {{--                </div>--}}
        {{--                <div class="icon">--}}
        {{--                    <i class="ion ion-person-add"></i>--}}
        {{--                </div>--}}
        {{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--        <!-- ./col -->--}}
        {{--        <div class="col-lg-3 col-6">--}}
        {{--            <!-- small box -->--}}
        {{--            <div class="small-box bg-danger">--}}
        {{--                <div class="inner">--}}
        {{--                    <h3>@php--}}
        {{--                            $total_product = \App\Inventory::get()->count();--}}
        {{--                        @endphp--}}
        {{--                        {{$total_product}}</h3>--}}

        {{--                    <p>Total Products In The Inventory </p>--}}
        {{--                </div>--}}
        {{--                <div class="icon">--}}
        {{--                    <i class="ion ion-pie-graph"></i>--}}
        {{--                </div>--}}
        {{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <!-- ./col -->
        </div>
        @elseif(\Illuminate\Support\Facades\Auth::user()->action_table == 'App\Shopkeeper')
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                @php
                                    $total_order = \App\Order::where('created_at',\Carbon\Carbon::today())->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get()->count();
                                @endphp
                                {{$total_order}}
                            </h3>

                            <p>Today's Total Order</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        {{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>@php
                                    $total_payment = \App\Transaction::where('created_at',\Carbon\Carbon::today())->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get()->count();
                                @endphp
                                {{$total_payment}}</h3>

                            <p>Today's total Transactions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        {{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
{{--                <div class="col-lg-3 col-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-warning">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>@php--}}
{{--                                    $total_sale = \App\Transaction::where('created_at',\Carbon\Carbon::today())->sum('paid_amount');--}}
{{--                                @endphp--}}
{{--                                {{$total_sale}}</h3>--}}

{{--                            <p>Today's Total sale</p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-person-add"></i>--}}
{{--                        </div>--}}
{{--                                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- ./col -->--}}
{{--                <div class="col-lg-3 col-6">--}}
{{--                    <!-- small box -->--}}
{{--                    <div class="small-box bg-danger">--}}
{{--                        <div class="inner">--}}
{{--                            <h3>@php--}}
{{--                                    $total_product = \App\Inventory::get()->count();--}}
{{--                                @endphp--}}
{{--                                {{$total_product}}</h3>--}}

{{--                            <p>Total Products In The Inventory </p>--}}
{{--                        </div>--}}
{{--                        <div class="icon">--}}
{{--                            <i class="ion ion-pie-graph"></i>--}}
{{--                        </div>--}}
{{--                        --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

            {{--        <div class="col-lg-3 col-6">--}}
            {{--            <!-- small box -->--}}
            {{--            <div class="small-box bg-success">--}}
            {{--                <div class="inner">--}}
            {{--                    <h3>@php--}}
            {{--                            $total_payment = \App\Transaction::where('created_at',\Carbon\Carbon::today())->get()->count();--}}
            {{--                        @endphp--}}
            {{--                        {{$total_payment}}</h3>--}}

            {{--                    <p>Today's total Transactions</p>--}}
            {{--                </div>--}}
            {{--                <div class="icon">--}}
            {{--                    <i class="ion ion-stats-bars"></i>--}}
            {{--                </div>--}}
            {{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <!-- ./col -->--}}
            {{--        <div class="col-lg-3 col-6">--}}
            {{--            <!-- small box -->--}}
            {{--            <div class="small-box bg-warning">--}}
            {{--                <div class="inner">--}}
            {{--                    <h3>@php--}}
            {{--                            $total_sale = \App\Transaction::where('created_at',\Carbon\Carbon::today())->sum('paid_amount');--}}
            {{--                        @endphp--}}
            {{--                        {{$total_sale}}</h3>--}}

            {{--                    <p>Today's Total sale</p>--}}
            {{--                </div>--}}
            {{--                <div class="icon">--}}
            {{--                    <i class="ion ion-person-add"></i>--}}
            {{--                </div>--}}
            {{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            {{--        <!-- ./col -->--}}
            {{--        <div class="col-lg-3 col-6">--}}
            {{--            <!-- small box -->--}}
            {{--            <div class="small-box bg-danger">--}}
            {{--                <div class="inner">--}}
            {{--                    <h3>@php--}}
            {{--                            $total_product = \App\Inventory::get()->count();--}}
            {{--                        @endphp--}}
            {{--                        {{$total_product}}</h3>--}}

            {{--                    <p>Total Products In The Inventory </p>--}}
            {{--                </div>--}}
            {{--                <div class="icon">--}}
            {{--                    <i class="ion ion-pie-graph"></i>--}}
            {{--                </div>--}}
            {{--                --}}{{--                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
            {{--            </div>--}}
            {{--        </div>--}}
            <!-- ./col -->
            </div>
    @endif
@endsection
