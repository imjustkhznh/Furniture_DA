<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Admin || Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->

		      <!-- App css -->
            <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
            <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

                <link href="{{asset('backend/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
                  <link href="{{asset('backend/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
              <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<!-- icons -->
        <link href="{{asset('backend/css/materialdesignicons.min.css')}}" rel="stylesheet" type="text/css"/>

    <body class="loading authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="index.html" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="{{asset('backend/images/logo-dark.png')}}" alt="" height="22">
                                            </span>
                                        </a>

                                        <a href="index.html" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="../assets/images/logo-light.png" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                    <?php
                                    $message = Session::get('message');
                                    if (isset($message)) {
                                      echo '<p class="text-muted mb-4 mt-3">'.$message.'</p>';
                                      Session::put('message',null);
                                    }else {
                                      echo '<p class="text-muted mb-4 mt-3">Nhập Email và mật khẩu để đăng nhập.</p>';
                                  } ?>

                                </div>

                                <form action="{{URL::to('/admin-dashboard')}}" method="post">
                                  {{ csrf_field() }}
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email</label>
                                        <input class="form-control" type="email" name="email_admin" id="emailaddress" required="" placeholder="Nhập email của bạn">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Mật khẩu</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="pass_admin" class="form-control" placeholder="Nhập mật khẩu của bạn">
                                            <div class="input-group-append" data-password="false">
                                                <div class="input-group-text">
                                                    <span class="fa fa-key"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Lưu mật khẩu</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit"> Đăng nhập </button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Đăng nhập với</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fa fa-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fa fa-github"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="auth-recoverpw.html" class="text-white-50 ml-1">Quên mật khẩu ?</a></p>
                                <p class="text-white-50">Bạn chưa có tài khoản ? <a href="auth-register.html" class="text-white ml-1"><b>Đăng kí</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
        </footer>

        <!-- Vendor js -->
        <script src="{{asset('backend/js/vendor.min.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('backend/js/app.min.js')}}"></script>


        <script src="../assets/libs/footable/footable.all.min.js"></script>

        <!-- Init js -->
        <script src="../assets/js/pages/foo-tables.init.js"></script>


    </body>
</html>
