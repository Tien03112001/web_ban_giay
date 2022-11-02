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
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <img src="/bootstrap/template/images/logo.svg" alt="logo">
                                </div>
                                <h4>Đăng ký</h4>
                                <form class="pt-3" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="name" placeholder="Tên người dùng">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" name="email" placeholder="Địa chỉ Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" name="password" placeholder="Mật khẩu ">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" name="confirm_password" placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <label class="form-check-label text-muted">
                                                <input type="checkbox" name="agree" class="form-check-input">
                                                Đồng ý với tất cả điều khoản
                                                <i class="input-helper"></i></label>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Đăng ký </button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Bạn đã có tài khoản? <a href="/admin/user/login" class="text-primary">Trở lại đăng nhập</a>
                                    </div>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="/bootstrap/template/vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="/bootstrap/template/js/template.js"></script>
    <!-- endinject -->
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
</body>

</html>