@extends('admin.layouts.basic')

@section('title','Admin')

@section('body')
    <div class="wrapper">
        <header class="main-header">
            <a href="index2.html" class="logo">
                <span class="logo-mini"><b>T</b>e</span>
                <span class="logo-lg"><b>T</b>ravel</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="javascript:void(0);" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                        </li>
                        <li class="dropdown notifications-menu">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                        </li>
                        <li class="dropdown tasks-menu">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="http://owst2hgsv.bkt.clouddn.com/boy.jpg" class="user-image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="http://owst2hgsv.bkt.clouddn.com/boy.jpg" class="img-circle"
                                         alt="User Image">
                                    <p>
                                        Alexander Pierce
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="javascript:void(0);" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('admin.auth.logout') }}" id="logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="http://owst2hgsv.bkt.clouddn.com/boy.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                @include('admin.layouts.menus')
            </section>
        </aside>
        <div class="content-wrapper" id="main">
            @include('admin.layouts.breadcrumb')
            <section class="content">
                @yield('main')
            </section>
        </div>
        @include('admin.layouts.footer')
    </div>
    <script>
        $('#logout').on('click', function (event) {
            event.preventDefault()
            $.get($(this).attr('href'), {}, respond => {
                window.location.href = '{{ route('admin.auth.login') }}'
            })
        })
    </script>
@stop