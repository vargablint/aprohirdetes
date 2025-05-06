<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body class="d-flex flex-column min-vh-100">
   
    <div style="order: 1">
        @include('layouts.navbar')
    </div>
 

    <div style="order: 2;">
        @yield('content')
    </div>
    


    <footer class="bg-dark container-fluid mt-auto" style="order: 3;">
        <div class="row">
            <div class="col-12">
                <div class="text-center text-white p-5">
                    Szoftverfejlesztő-tesztelő 2025 &copy;
                </div>
            </div>
         </div>
    </footer>



   
</body>
</html>