<head dir="rtl">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="{{ asset('Front_Assets/css/chosen.min.css') }}">

   <link rel="stylesheet" href="{{ asset('Front_Assets/css/bootstrap.rtl.min.css') }}">
   <link rel="stylesheet" href="{{ asset('Front_Assets/css/style.css') }}">
   @yield('css')

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>
        @yield('page_title')
    </title>
    @toastr_css
</head>
