<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height:100%;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    @vite('resources/sass/app.scss')

    @yield('css')
</head>
<body class="hold-transition sidebar-mini h-100">
    @if(Auth::check())
        <div class="wrapper h-100" id="app">
            <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="/" class="brand-link" target="_blank">
                    <span class="fa-stack text-primary">
                        <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                        <i class="fas fa-code fa-stack-1x"></i>
                    </span>
                    <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
                </a>

                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <span class="fa-stack text-primary">
                                <i class="fas fa-circle fa-stack-2x fa-inverse"></i>
                                <i class="fas fa-user fa-stack-1x"></i>
                            </span>
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                        </div>
                    </div>

                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-fw fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            @include('templates.menu')
                            <li class="nav-header">&nbsp;</li>
                            <li class="nav-item">
                                <form action="/logout" method="post">
                                    {{csrf_field()}}
                                    <a href='#' onclick='this.parentNode.submit(); return false;' class="nav-link">
                                        <i class="nav-icon fa fa-sign-out-alt"></i>
                                        <p>Cerrar sesión</p>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <div class="content-wrapper" style="min-height: 395px;">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">@yield('title')</h1>
                            </div>
                            <div class="col-sm-6">
                                @yield('breadcrumb')
                            </div>
                        </div>
                    </div>
                </div>
                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                Todos los derechos reservados &copy; {{ date('Y') }}
                <div class="float-right d-none d-sm-inline-block">
                    <b>{{ env('APP_VERSION')}}</b>
                </div>
            </footer>
        </div>
    @endif

    @vite(['resources/js/app.js'])

    @yield('javascript')

    <script type="module">
        $(document).ready(function() {
            var navParent = $('.nav-item .active').closest('.has-treeview');
            navParent.addClass('menu-open');
            navParent.children('.nav-link').addClass('active');
        });
    </script>
</body>
</html>
