@extends('layout.admin.master')
@push('css')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.print.js')}}">
@endpush
@section('breadcrumb')
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <!-- /.card -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total Sell</th>
                            <th>Employee Salary</th>
                            <th>Employee Bonus</th>
                            <th>Commission</th>
                            <th>Purchased Amount</th>
                            <th>Other Expenses</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <body>
                        @foreach($output as $result)
                        <tr>
                            <td>{{ $result['months']}}</td>
                            <td>{{ $result['total_sale']}}</td>
                            <td>{{ $result['total_salary']}}</td>
                            <td>{{ $result['total_bonus']}}</td>
                            <td>{{ $result['total_commission']}}</td>
                            <td>{{ $result['total_purchase']}}</td>
                            <td>{{ $result['total_expense']}}</td>
                            <td>{{ $result['total_sale']-($result['total_expense']+$result['total_expense']+$result['total_purchase']+$result['total_commission']+$result['total_bonus']+$result['total_salary'])}}</td>
                        </tr>
                        @endforeach
                        </body>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy","excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endpush
