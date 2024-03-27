<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar top-nav navbar-expand-lg bg-body-tertiary border shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <div class="row">
                    <div class="col">
                        <img src="{{ asset('img/logo_kediri.svg') }}" alt="logo" style="width: 30px;" class="m-2">
                    </div>
                    <div class="col m-auto">
                        <p class="m-auto fs-4 fw-semibold">Bakesbangpol</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="container-fluid justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item m-auto me-4 d-none d-md-block">
                    <form action="" method="post">
                        @csrf
                        <input type="text" placeholder="Search participant..." class="form-control">
                    </form>
                </li>
                <li class="nav-item">
                    <div class="d-flex">
                        <span class="mt-3 mb-3 me-2 material-symbols-outlined">
                            account_circle
                        </span>
                        <div class="dropdown m-auto">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                User
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Setting</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Side Navbar -->
    <nav class="sidenav border">
        <div class="d-flex flex-column flex-shrink-0 p-2  ">
            <ul class="nav nav-pills flex-column" id="myMenu">
                <li class="mb-2">
                    <a href="{{url('dashboard-user')}}" class="nav-link d-flex gap-1">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{'jadwal-seleksi'}}" class="nav-link d-flex gap-1">
                        <span class="material-symbols-outlined">
                            description
                        </span>
                        <span>
                            Jadwal Seleksi
                        </span>
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="nav-link d-flex gap-1">
                        <span class="material-symbols-outlined">
                            inventory
                        </span>
                        <span>
                            Hasil Seleksi
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Side Navbar -->

    <!-- Main Content -->
    <div class="main">
        @yield('content')
    </div>
    <!-- End Main Content -->


</body>

</html>