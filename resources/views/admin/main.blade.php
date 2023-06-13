<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="icon" href="{{asset('images/yiri_mali_logo.png')}}" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yiri-Mali</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>


    <!-- Scripts -->

    <!-- Styles -->
    @livewireStyles
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('images/yiri_mali_logo.png')}}" alt="" height="80" width="80">
        </div>

        <!-- Navbar -->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-green elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="{{asset('images/yiri_mali_logo.png')}}" alt="" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light">Yiri-Mali</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-2 pb-2 mb-2 d-flex">

                    <div class="info" style="display: flex;align-items: center;justify-content: space-around;">
                        <span class="d-block nav-link text-black">

                            @auth
                            {{Auth::user()->name}}
                            <form action="{{route('admin.logout')}}" method="post">
                                @csrf
                                @method('POST')
                                <input type="submit" class="btn btn-danger" value="Déconnexion">
                            </form>
                            @endauth
                        </span>

                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{route('admin.categorie')}}" class="nav-link {{request()->routeIs('admin.categorie') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-folder-tree"></i>
                                <p>
                                    Catégories
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.produit')}}" class="nav-link {{request()->routeIs('admin.produit') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-procedures"></i>
                                <p>
                                    Produits
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.image')}}" class="nav-link {{request()->routeIs('admin.image') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-images"></i>
                                <p>
                                    Images
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.commande')}}" class="nav-link {{request()->routeIs('admin.commande') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-images"></i>
                                <p>
                                    Commande
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.commande')}}" class="nav-link {{request()->routeIs('admin.commande') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-images"></i>
                                <p>
                                    Maintenance
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.commande')}}" class="nav-link {{request()->routeIs('admin.commande') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-images"></i>
                                <p>
                                    Formation
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.achat')}}" class="nav-link {{request()->routeIs('admin.achat') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-images"></i>
                                <p>
                                    Achats
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.client')}}" class="nav-link {{request()->routeIs('admin.client') ? 'active' : ''}}">
                                <i class="nav-icon fa fa-images"></i>
                                <p>
                                    Clients
                                </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-book"></i>
                                <p>
                                    Paiement
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            Mensuel
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="nav-icon fa fa-book"></i>
                                        <p>
                                            Mensuel
                                        </p>
                                    </a>
                                </li>


                            </ul>
                        </li> --}}


                    </ul>


                    </ul>
                    </li>

                    </ul>
                </nav>


                <!-- Sidebar Menu -->

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    {{-- all pages --}}
                    @yield('page')
                    @yield('modal')
                    
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2023-{{date('Y')}} </strong>
            {{-- All rights reserved. --}}
            <div class="float-right d-none d-sm-inline-block">
                {{-- <b>Version</b> 3.2.0 --}}
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="dist/js/demo.js"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('dist/js/pages/dashboard.js')}}"></script>

    @stack('scripts')

    <script>

    </script>
</body>

</html>