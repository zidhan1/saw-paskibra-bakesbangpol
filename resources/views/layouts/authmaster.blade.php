<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'SAW Bakesbangpol') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .btn-custom {
            background-color: #FFBC57;
            color: white;
        }

        .btn-custom:hover {
            background-color: #FF9F1C;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-sm m-4">
        <div class="d-sm-flex flex-row mb-3 justify-content-evenly ">
            @yield('content')
            <div class="d-none d-md-block">
                <img src=" {{ asset('img/1.jpg') }}" alt="gambar login" style="width: 370px; border-radius: 6%;">
            </div>
        </div>

    </div>
</body>

</html>