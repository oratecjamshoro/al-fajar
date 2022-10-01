<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | {{ config('app.name', '') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

        <!-- C3 Chart css -->
        <link href="{{asset('assets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
        <link href="{{asset('assets/libs/jquery-toast/jquery.toast.min.css')}}" rel="stylesheet" type="text/css" />

        @yield('style')
        <style>
            .header-title
            {
                text-align:right;
            }
        </style>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
                        <!-- <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('assets/images/flags/us.jpg')}}" alt="lang-image" height="12">
                        </a> -->
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <img src="assets/images/flags/germany.jpg" alt="lang-image" class="mr-1" height="12"> <span
                                    class="align-middle">German</span>
                            </a> -->


                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i>
                            <span class="badge badge-pink rounded-circle noti-icon-badge">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow m-0"><span class="float-right">
                                    <span class="badge badge-danger float-right">0</span>
                                    </span>Notification</h5>
                            </div>

                            <div class="slimscroll noti-scroll">

                                <!-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                    <p class="notify-details">Robert S. Taylor commented on Admin<small class="text-muted">1 min ago</small></p>
                                </a> -->

                            </div>

                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                View all
                                <i class="fi-arrow-right"></i>
                            </a>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{Auth::user()->profile_photo_url}}" alt="user-image" class="rounded-circle">
                            <span class="pro-user-name ml-1">
                            {{Auth::user()->name}}  <i class="mdi mdi-chevron-down"></i> 
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                            <a href="user/profile" class="dropdown-item notify-item">
                                <i class="fe-user"></i>
                                <span>Profile</span>
                            </a>

                            <!-- item-->
                            <a href="user/profile" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Settings</span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                
                                <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class="fe-log-out"></i>
                                {{ __('Logout') }}
                                </a>
                            </form>

                        </div>
                    </li>

                    <li class="dropdown notification-list">
                        <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                            <i class="fe-settings noti-icon"></i>
                        </a>
                    </li>


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{asset('assets/images/logo-light.png')}}" alt="" height="100">
                            <!-- <span class="logo-lg-text-light">UBold</span> -->
                        </span>
                        <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">U</span> -->
                            <img src="{{asset('assets/images/logo-sm.png')}}" alt="" height="28">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                    <li class="d-none d-sm-block">
                            <form class="app-search">
                                <div class="app-search-box">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="fe-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </li>

                </ul>
            </div>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu pt-4">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li>
                                <a href="{{Route('dashboard')}}">
                                    <i class="fe-airplay"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            @can('today-access')
                            <li>
                                <a href="{{Route('milk_detail.index')}}">
                                    <i class="fe-airplay"></i>
                                    <span>Today List</span>
                                </a>
                            </li>
                            @endcan
                            

                            @can('mcc-access')
                            <li>
                                <a href="{{Route('mcc.index')}}">
                                    <i class="fe-airplay"></i>
                                    <span>MCC</span>
                                </a>
                            </li>
                            @endcan
                            

                            @can('mmt-access')
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span>MMT</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                @can('mmt-access')
                                    <li><a href="#">View MMT</a></li>
                                @endcan
                                @can('mmt-create')
                                    <li><a href="#">Add MMT</a></li>
                                @endcan
                                </ul>
                            </li>
                            @endcan
                            
                            @can('today-list-access')
                            <li>
                                <a href="{{Route('milk_detail.index')}}">
                                    <i class="fe-airplay"></i>
                                    <span>Today list</span>
                                </a>
                            </li>
                            @endcan
                            @can('received-milk-access')
                            <li>
                                <a href="#">
                                    <i class="fe-airplay"></i>
                                    <span>Received Milk list</span>
                                </a>
                            </li>
                            @endcan
                           
                            @can('supplier-access')
                            <li>
                                <a href="{{Route('supplier.index')}}">
                                    <i class="fe-airplay"></i>
                                    <span>Supplier</span>
                                </a>
                            </li>
                            @endcan
                           
                            @can('doodi-access')
                            <li>
                                <a href="#">
                                    <i class="fe-airplay"></i>
                                    <span>Doodi</span>
                                </a>
                            </li>
                            @endcan


                            <li>
                                <a href="{{route('inv_request.index')}}">
                                    <i class="fe-airplay"></i>
                                    <span>Inventory</span>
                                </a>
                            </li>
                            

                            @can('utility-access')
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span>Utility</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="#">Generator Reading</a></li>
                                    <li><a href="#">Wapda Reading</a></li>
                                </ul>
                            </li>
                            @endcan

                            @can('account-access')
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span>Account</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="#">Received Payment</a></li>
                                    <li><a href="#">Expanses</a></li>
                                </ul>
                            </li>
                            @endcan
                           
                            @can('hr-access')
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span>HR</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{Route('employees.index')}}">Employees</a></li>
                          
                                </ul>
                            </li>
                          @endcan
                      
                          @can('inventory-access')
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span>Inventory</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{Route('inv_category.index')}}">Category</a></li>
                                    <li><a href="{{Route('inv_item.index')}}">Items</a></li>
                                </ul>
                            </li>
                            @endcan

                            @can('report-access')
                            <li>
                                <a href="#">
                                    <i class="fe-airplay"></i>
                                    <span>Report</span>
                                </a>
                            </li>
                            @endcan
                            
                            @can('user-access')
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span>Users</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                @can('user-access')
                                    <li><a href="{{Route('users.index')}}">Manage Users</a></li>
                                @endcan
                                @can('role-access')
                                    <li><a href="{{Route('roles.index')}}">Roles</a></li>
                                @endcan
                                @can('permission-access')
                                    <li><a href="{{Route('permissions.index')}}">Permissions</a></li>
                                @endcan
                                </ul>
                            </li>
                            @endcan
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            @yield('content')
            
                

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                &copy; 2022 - Developed by <a href="https://orasoft.pk">OraSoft.pk</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h4 class="font-16 m-0 text-white">Theme Customizer</h4>
            </div>
            <div class="slimscroll-menu">
        
                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, layout, etc.
                    </div>
                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/light.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/dark.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="{{asset('assets/css/bootstrap-dark.min.css')}}" 
                            data-appStyle="{{asset('assets/css/app-dark.min.css')}}" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
            
                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/rtl.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="{{asset('assets/images/layouts/dark-rtl.png')}}" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                            data-appStyle="assets/css/app-dark-rtl.min.css" />
                        <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                    </div>

                    <a href="https://1.envato.market/y2YAD" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                </div>
            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
            <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
        </a>

        <!-- Vendor js -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        @yield('script')
        <!-- App js -->
        <script src="{{asset('assets/js/app.min.js')}}"></script>
        <script src="{{asset('assets/libs/jquery-toast/jquery.toast.min.js')}}"></script>
    </body>
</html>

@if($message = Session::get('success'))
<script>
    $.toast({heading:"Well done!",text:"{!! $message !!}",position:"top-right",loaderBg:"#5ba035",icon:"success",hideAfter:3e3,stack:1})
</script>
@endif

@if($message = Session::get('error'))
<script>
    $.toast({heading:"Oh snap!",text:"{!! $message !!}",position:"top-right",loaderBg:"#bf441d",icon:"error",hideAfter:3e3,stack:1})
</script>
@endif
