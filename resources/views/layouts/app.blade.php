<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- CSRF Token -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/images/logo.png')}}">
    <title>Store Management</title>

    {{--    Loading animation style--}}
    <link href="{{asset('css/loading_animation.css')}}" rel="stylesheet">
    <link href="{{asset('css/chips.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/quill/dist/quill.snow.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/style.min.css')}}">
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5" s>
                <!-- This is for the sidebar toggle which is visible on mobile only -->
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <a class="navbar-brand" href="{{route('home')}}">
                    <!-- Logo icon -->
                    <b class="logo-icon p-l-10">
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{{asset('assets/images/logo.png')}}" width="50" height="50" alt="homepage"
                             class="light-logo"/>

                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <span class="logo-text" style="color: white;">
                             <!-- dark Logo text -->
                            &nbsp &nbsp  BGI ETHIOPIA
                        <!--   <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        </span>
                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                    <!-- </b> -->
                    <!--End Logo icon -->
                </a>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Toggle which is visible on mobile only -->
                <!-- ============================================================== -->
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                   data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                   aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                                                              href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
                                class="mdi mdi-menu font-24"></i></a></li>
                    <!-- ============================================================== -->
                    <!-- create new -->
                    <!-- ============================================================== -->
                    <!--  <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <span class="d-none d-md-block">Create New <i class="fa fa-angle-down"></i></span>
                           <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                      </li> -->
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                    <!--      <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                              <form class="app-search position-absolute">
                                  <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                              </form>
                          </li> -->
                </ul>
                <!-- ============================================================== -->
                <!-- Right side toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav float-right">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                    {{--                        Bell--}}
                    {{--                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"--}}
                    {{--                           aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"--}}
                    {{--                                                                          style="color: white;"></i>--}}
                    {{--                        </a>--}}
                    <!--    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="#">Action</a>
                               <a class="dropdown-item" href="#">Another action</a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#">Something else here</a>
                           </div> -->
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        {{--                        Message--}}
                        {{--                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2"--}}
                        {{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i--}}
                        {{--                                class="font-24 mdi mdi-comment-processing" style="color: white;"></i>--}}
                        {{--                        </a>--}}
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown"
                             aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="">
                                        <!-- Message -->
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-success btn-circle"><i
                                                        class="ti-calendar"></i></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Event today</h5>
                                                    <span class="mail-desc">Just a reminder that event</span>
                                                </div>
                                            </div>
                                        </a>
                                        <!-- Message -->
                                        <!--  <a href="javascript:void(0)" class="link border-top">
                                              <div class="d-flex no-block align-items-center p-10">
                                                  <span class="btn btn-info btn-circle"><i class="ti-settings"></i></span>
                                                  <div class="m-l-10">
                                                      <h5 class="m-b-0">Settings</h5>
                                                      <span class="mail-desc">You can customize this template</span>
                                                  </div>
                                              </div>
                                          </a> -->
                                        <!-- Message -->

                                        <!-- Message -->

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{auth()->user()->name}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        @endguest
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('/home')}}" aria-expanded="false"><i
                                class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('/Transaction')}}" aria-expanded="false"><i
                                class="mdi mdi-transcribe"></i><span class="hide-menu">Transaction</span></a></li>
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('/Event')}}" aria-expanded="false"><i
                                class="fab fa-wpforms"></i><span class="hide-menu">Event</span></a></li>
                    {{--                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"--}}
                    {{--                                                aria-expanded="false"><i class="mdi mdi-shuffle-variant"></i><span--}}
                    {{--                                class="hide-menu">Stock Movement</span></a></li>--}}
                    @role('Admin')
                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('/event/approve')}}" aria-expanded="false"><i
                                class="fa fa-check-square"></i><span class="hide-menu">Approval</span></a></li>
                    @endrole

                <!--    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{url('/ItemRequest')}}" aria-expanded="false"><i class="mdi mdi-creation"></i><span class="hide-menu">Requests</span></a></li> -->


                    <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link"
                                                href="{{url('/Stock')}}" aria-expanded="false"><i
                                class="mdi mdi-eye"></i><span class="hide-menu">Stock View</span></a></li>

                    @role('Admin')
                    <li class="sidebar-item"><a class="sidebar-link has-arrow waves-effect waves-dark"
                                                href="javascript:void(0);" aria-expanded="false"><i
                                class="mdi mdi-receipt"></i><span class="hide-menu">Setting </span></a>
                        <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a href="{{url('/Category')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span
                                        class="hide-menu"> Item Type </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/Color')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span class="hide-menu"> Item Color </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{url('/Brand')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span
                                        class="hide-menu"> Item Brand/Type </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/Fabric')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span class="hide-menu"> Item Fabric </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{url('/Manufacture')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span
                                        class="hide-menu"> Item Manufacture </span></a></li>
                            <li class="sidebar-item"><a href="{{url('/StockRoom')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span class="hide-menu"> Stock Room </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{url('/Item')}}  " class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span class="hide-menu"> Create Item </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{url('/Eventtype')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span class="hide-menu"> Event Type </span></a>
                            </li>
                            <li class="sidebar-item"><a href="{{route('super_admin_role')}}" class="sidebar-link"><i
                                        class="fas fa-hand-point-right"></i><span
                                        class="hide-menu"> Role Management </span></a></li>
                        </ul>
                    </li>
                    @endrole


                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales Cards  -->
            <!-- ============================================================== -->
            @yield('content')
            <div class="modal"></div>
            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('dist/js/custom.min.js')}}"></script>
<!-- This Page JS -->
<script src="{{asset('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/pages/mask/mask.init.js')}}"></script>
<script src="{{asset('assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
<script src="{{asset('assets/libs/select2/dist/js/select2.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
<script src="{{asset('assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
<script src="{{asset('assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/libs/quill/dist/quill.min.js')}}"></script>
<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script>
    $(document).ready(function () {
        /************************************
         *            For select 2           *
         ************************************/
        $(".select2").select2();
        // $(".select2").on("change", function () { debugger; });

        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#datatable_table').DataTable();
        let $body = $("body");
        $(document).on({
            ajaxStart: function () {
                $body.addClass("loading");
            },
            ajaxStop: function () {
                $body.removeClass("loading");
            }
        });
    });

    /*colorpicker*/
    $('.demo').each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
            control: $(this).attr('data-control') || 'hue',
            position: $(this).attr('data-position') || 'bottom left',

            change: function (value, opacity) {
                if (!value) return;
                if (opacity) value += ', ' + opacity;
                if (typeof console === 'object') {
                    console.log(value);
                }
            },
            theme: 'bootstrap'
        });

    });
    /*datwpicker*/
    jQuery('.mydatepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    // var quill = new Quill('#editor', {
    //     theme: 'snow'
    // });

</script>
</body>

</html>
