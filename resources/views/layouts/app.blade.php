<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Doccure - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/img/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('backend/assets/css/feathericon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/morris/morris.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/font-awesome.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('backend/assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>

@section('content')
@show

<!-- jQuery -->
<script src="{{ asset('backend/assets/js/jquery-3.2.1.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"></script>

{{--Others JS--}}
<script src="{{ asset('backend/assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/chart.morris.js') }}"></script>

<!-- Sweet Alert  -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Custom JS -->
<script src="{{ asset('backend/assets/js/script.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>

</body>

</html>
