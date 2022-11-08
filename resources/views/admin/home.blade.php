<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$title}}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/bootstrap/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/bootstrap/template/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="/bootstrap/template/css/style.css">
    <link rel="shortcut icon" href="/bootstrap/template/images/favicon.png" />
    <script src="/template/sweetalert/dist/jquery-3.6.1.min.js"></script>
    <script src="/template/sweetalert/dist/sweetalert2.all.min.js"></script>
    <!-- End layout styles -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-scroller">

        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
                <div class="container-fluid">
                    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                        <ul class="navbar-nav navbar-nav-left">
                        </ul>
                        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                            <a class="navbar-brand brand-logo" href="index.html"><img src="/bootstrap/template/images/logo.svg" alt="logo" /></a>
                            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="/bootstrap/template/images/logo-mini.svg" alt="logo" /></a>
                        </div>
                        <ul class="navbar-nav navbar-nav-right">
                            <li class="nav-item nav-profile dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                                    <span class="nav-profile-name">{{Auth::user()->name}}</span>
                                    <span class="online-status"></span>
                                    <img src="/bootstrap/template/images/faces/face28.png" alt="profile" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                    <a href='/admin/changepassword' class="dropdown-item">
                                        <i class="mdi mdi-settings text-primary"></i>
                                        Đổi mật khẩu
                                    </a>
                                    <a href='/admin/logout' class="dropdown-item">
                                        <i class="mdi mdi-logout text-primary"></i>
                                        Đăng xuất
                                    </a>
                                </div>
                            </li>
                        </ul>
                        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div>
            </nav>
            <nav class="bottom-navbar">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-cube-outline menu-icon"></i>
                                <span class="menu-title">Quản lý danh mục</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul>
                                    <li class="nav-item"><a class="nav-link" href="/admin/menu/add">Thêm danh mục</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/admin/menu/list">Danh sách danh mục</a></li>
                                </ul>
                            </div>
                        </li>




                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-codepen menu-icon"></i>
                                <span class="menu-title">Quản lý sản phẩm</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="/admin/product/add">Thêm sản phẩm</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/admin/product/list">Danh sách sản phẩm </a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/order/list" class="nav-link">
                                <i class="mdi mdi-cart-outline"></i>

                                <span class="menu-title">Quản lý đơn hàng</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <!-- <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="/admin/product/add">Thêm sản phẩm</a></li>
                                    <li class="nav-item"><a class="nav-link" href="/admin/product/list">Danh sách sản phẩm </a></li>
                                </ul>
                            </div> -->
                        </li>
                        <li class="nav-item">
                            <a href="/admin/comment/list" class="nav-link">
                                <i class="mdi mdi-comment"></i>

                                <span class="menu-title">Quản lý bình luận</span>
                                <i class="menu-arrow"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                @yield('content')
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <script src="/bootstrap/template/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <script src="/bootstrap/template/vendors/chart.js/Chart.min.js"></script>
    <script src="/bootstrap/template/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/bootstrap/template/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="/bootstrap/template/vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="/bootstrap/template/vendors/justgage/justgage.js"></script>
    <script src="/bootstrap/template/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="/bootstrap/template/js/dashboard.js"></script>


    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/template/admin/js/main.js"></script>
    <script src="/template/admin/js/alert.js"></script>

    <!-- End custom js for this page -->
</body>

</html>