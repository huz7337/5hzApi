<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex">
    <!-- Custom fonts for this template -->
    <script src="https://kit.fontawesome.com/1afd572273.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/sob34v2hj93jb3u5jm75bvcptdm6ydnw12jspfx1vd6vwlv7/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>

    <!-- Custom styles for this template -->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon">
                <svg width="202" height="59" viewBox="0 0 202 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M58.2674 0H0V58.2674H58.2674V0Z" fill="#F9DC06"></path>
                    <path
                        d="M31.1716 43.6914L34.9825 35.5443L38.1909 28.6879H31.8353L35.6462 20.5448H44.4366L46.3828 16.3838H31.8353H28.0406L26.0944 20.5448H26.0863L22.2753 28.6879H26.5382H28.8101L25.6018 35.5443H23.3299H17.6745L13.8677 43.6914H19.5189H31.1716Z"
                        fill="black"></path>
                    <path
                        d="M96.1775 47.8077C90.3796 47.8077 85.9661 46.9282 82.9328 45.1694C79.8996 43.4105 78.1081 40.9798 77.5503 37.8773H89.9888C89.9888 38.545 90.4244 39.1028 91.2917 39.5507C92.5457 40.2184 94.0277 40.5523 95.7337 40.5523C96.5724 40.5523 97.517 40.4383 98.5715 40.2143C99.626 39.9904 100.587 39.4977 101.454 38.7364C102.321 37.9791 102.757 36.9083 102.757 35.528C102.757 34.1966 102.346 33.1421 101.523 32.3644C100.082 31.0005 98.1114 30.3165 95.6156 30.3165C95.3509 30.3165 94.8502 30.345 94.1051 30.3979C93.36 30.4508 92.5457 30.6951 91.6622 31.1308C90.6239 31.6438 90.0661 32.3319 89.9888 33.1991H77.5503L81.3653 13.8065H111.385V20.0603H91.5278L91.1329 23.57C92.6678 23.3705 94.3494 23.2687 96.1775 23.2687C102.301 23.2687 107.004 24.2784 110.293 26.302C113.583 28.3255 115.224 31.3995 115.224 35.5199C115.224 39.6402 113.579 42.7224 110.293 44.75C107.004 46.7939 102.301 47.8077 96.1775 47.8077Z"
                        fill="white"></path>
                    <path
                        d="M160.634 47.1562H148.146V34.0867H130.94V47.1562H118.477V13.8105H130.94V26.8801H148.146V13.8105H160.634V47.1562Z"
                        fill="white"></path>
                    <path
                        d="M202 47.1563H164.123V37.9709L186.235 22.9959H164.123V13.8146H202V23L180.934 37.975H202V47.1563Z"
                        fill="white"></path>
                </svg>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>



        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('posts.index') }}">
                <i class="fa-solid fa-file-pen"></i>
                <span>Posts</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('services.index') }}">
                <i class="fa-brands fa-hive"></i>
                <span>Services</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('projects.index') }}">
                <i class="fa-solid fa-list-check"></i>
                <span>Projects</span>
            </a>
        </li>
<!--        employees-->
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fa-solid fa-people-group"></i>
                <span>Employees</span>
            </a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="fa-solid fa-user-tie"></i>
                <span>Users</span></a>
        </li>


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline mt-3">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Topbar Navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto px-3">
                        <li class="nav-item">
                            <a class="nav-link" disabled>
                                {{ Auth::user()?->name }}
                            </a>
                        </li>

                        @include('partials/language_switcher')

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End of Topbar -->

            @yield('content')
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; 2022</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('js/admin.js')}}"></script>
@stack('custom-scripts')
</body>
</html>
