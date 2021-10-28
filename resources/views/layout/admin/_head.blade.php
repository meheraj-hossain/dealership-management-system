<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>DMS | {{isset($title)?$title:null}}</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/select2/css/select2.css')}}">
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
@stack('css')

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<style>
    .show-cart li {
        display: flex;
    }
    .card-img-top {
        width: 200px;
        height: 200px;
        align-self: center;
    }
</style>

<style>
    #container {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #edf7f6;
    }
    #card {
        position: relative;
        display: flex;
        justify-content: center;
        transition: all 250ms ease-in-out;
    }
    #card:after {
        content: '';
        position: absolute;
        top: 0;
        display: block;
        height: 100%;
        width: 100%;
        background-color: #3e363f;
        opacity: 0;
        transition: all 500ms ease-in-out;
    }
    #card:hover:after {
        opacity: 0.5;
    }
    #card:hover > .product__viewBtn {
        visibility: visible;
        opacity: 1;
        z-index: 1;
    }
    .product__viewBtn {
        cursor: pointer;
        position: absolute;
        bottom: 10%;
        background: #212527;
        color: #edf7f6;
        padding: 10px 20px;
        font-weight: bold;
        text-align: center;
        text-transform: uppercase;
        opacity: 0;
        visibility: hidden;
        transition: all 250ms ease-in-out;
    }
    .product__viewBtn:hover {
        color: #212527;
        background: #edf7f6;
    }


</style>
