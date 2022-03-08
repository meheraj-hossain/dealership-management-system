@extends('layout.admin.master')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('user.index')}}">User</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <!-- left column -->
        <div class="offset-3 col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        @include('admin.user._form')
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
    </div>
@endsection
@push('js')
    <script>
        $(function () {
            $('body').on('change', '.user',  function (e) {

                var userRole = $('#user').val();
                var url = "{{ route('user.getdata') }}"
                $.ajax({
                    url     : url,
                    data    : {userRole: userRole},
                    method    : 'GET',
                    cache   : false,
                    success: function (data) {
                        $('#htmlAppend').empty();

                        console.log(data);
                        let htmlInput = [];
                        $.each(data.user, function (index, value) {
                            console.log(value.id);
                            $('#htmlAppend').append("<option value='"+value.id+"'>"+value.name+":"+value.email+"</option>");
                        });
                    }
                });
            });
        });
    </script>
@endpush
