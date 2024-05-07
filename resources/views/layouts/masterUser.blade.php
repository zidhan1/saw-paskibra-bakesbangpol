<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Google Icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <link rel="stylesheet" href="{{asset('css/styles.css')}}">


    <!-- Bootstrap JavaScript and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
                                {{Auth()->user()->name}}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('user-profile')}}">Profile</a></li>
                                <li><a class="dropdown-item" href="{{url('user-settings')}}">Setting</a></li>
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
                <li class="nav-item mb-2">
                    <a href="{{ url('dashboard-user') }}" class="nav-link d-flex gap-1 {{ request()->is('dashboard-user*') ? 'active-red' : '' }}">
                        <span class="material-symbols-outlined">
                            dashboard
                        </span>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{url('user-pendaftaran')}}" class="nav-link d-flex gap-1 {{ request()->is('user-pendaftaran*') ? 'active-red' : '' }}">
                        <span class="material-symbols-outlined">
                            app_registration
                        </span>
                        <span>
                            Pendaftaran
                        </span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{url('jadwal-seleksi')}}" class="nav-link d-flex gap-1 {{ request()->is('jadwal-seleksi*') ? 'active-red' : '' }}">
                        <span class="material-symbols-outlined">
                            description
                        </span>
                        <span>
                            Jadwal Seleksi
                        </span>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{url('hasil-seleksi')}}" class="nav-link d-flex gap-1 {{ request()->is('hasil-seleksi*') ? 'active-red' : '' }}">
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

    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
</body>

</html>