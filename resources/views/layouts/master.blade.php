<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid bg-dark text-white">
        <div class="row">
            <div class="col-12">
                <div class="py-3">
                    <h1 class="text-center">Ide jön vmi</h1>
                </div>
            </div>
        </div>
    </div>


    @yield('content')


    <footer class="bg-dark container-fluid mt-5">
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