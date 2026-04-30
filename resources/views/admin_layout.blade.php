<!DOCTYPE html>
<html lang="en">
<head>

        <meta charset="utf-8" />
        <title>Dashboard | Furni-ORANGE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->

        <link href="{{asset('backend/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/libs/summernote/summernote-bs4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- third party css -->
        <link href="{{asset('backend/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
        <link href="{{asset('backend/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
        <link href="{{asset('backend/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
        <link href="{{asset('backend/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
        <link href="{{asset('backend/feather.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
        <link href="{{asset('backend/libs/bootstrap-table/bootstrap-table.min.css')}}" rel="stylesheet" type="text/css" />

        <!-- icons -->


    </head>

    <body class="load">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="d-none d-lg-block">
                            <form class="app-search">
                                <div class="app-search-box dropdown">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="Search..." id="top-search">
                                        <div class="input-group-append">
                                            <button class="btn" type="submit">
                                                <i class="feather-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                                        <!-- item-->
                                        <div class="dropdown-header noti-title">
                                            <h5 class="text-overflow mb-2">Found 22 results</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="feather-home mr-1"></i>
                                            <span>Analytics Report</span>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <i class="feather-aperture mr-1"></i>
                                            <span>How can I help you?</span>
                                        </a>

                                        <!-- item-->
                                        <div class="dropdown-header noti-title">
                                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                        </div>

                                        <div class="notification-list">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                                        <span class="font-12 mb-0">UI Designer</span>
                                                    </div>
                                                </div>
                                            </a>

                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                                        <span class="font-12 mb-0">Developer</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </li>

                        <li class="dropdown d-inline-block d-lg-none">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="feather-search noti-icon"></i>
                            </a>
                            <div class="dropdown-menu dropdown-lg dropdown-menu-right p-0">
                                <form class="p-3">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                </form>
                            </div>
                        </li>

                        <li class="dropdown d-none d-lg-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="fullscreen" href="#">
                                <i class="feather-maximize noti-icon"></i>
                            </a>
                        </li>

                        <li class="dropdown d-none d-lg-inline-block topbar-dropdown">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="feather-grid noti-icon"></i>
                            </a>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="feather-bell noti-icon"></i>
                                <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="m-0">
                                        <span class="float-right">
                                            <a href="#" class="text-dark">
                                                <small>Clear All</small>
                                            </a>
                                        </span>Notification
                                    </h5>
                                </div>

                                <div class="noti-scroll" data-simplebar>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon">
                                            <img src="{{asset('backend/images/user-1.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Cristina Pride</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Hi, How are you? What about our next meeting</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-primary">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">1 min ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon">
                                            <img src="{{asset('backend/images/user-4.jpg')}}" class="img-fluid rounded-circle" alt="" /> </div>
                                        <p class="notify-details">Karen Robinson</p>
                                        <p class="text-muted mb-0 user-msg">
                                            <small>Wow ! this admin looks good and awesome design</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning">
                                            <i class="mdi mdi-account-plus"></i>
                                        </div>
                                        <p class="notify-details">New user registered.
                                            <small class="text-muted">5 hours ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info">
                                            <i class="mdi mdi-comment-account-outline"></i>
                                        </div>
                                        <p class="notify-details">Caleb Flakelar commented on Admin
                                            <small class="text-muted">4 days ago</small>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-secondary">
                                            <i class="mdi mdi-heart"></i>
                                        </div>
                                        <p class="notify-details">Carlos Crouch liked
                                            <b>Admin</b>
                                            <small class="text-muted">13 days ago</small>
                                        </p>
                                    </a>
                                </div>

                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                    View all
                                    <i class="feather-arrow-right"></i>
                                </a>

                            </div>
                        </li>

                        <li class="dropdown notification-list topbar-dropdown">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <span class="pro-user-name ml-1">
                                  <?php
                                  $name = Session::get('name_admin');
                                  if (isset($name)) {
                                    echo $name;
                                  }
                                  ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome !</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="feather-user"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="feather-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="feather-lock"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="{{URL::to('/logout')}}" class="dropdown-item notify-item">
                                    <i class="feather-log-out"></i>
                                    <span>Đăng xuất</span>
                                </a>



                            </div>
                        </li>
                    </ul>

                    <!-- LOGO -->
                    <div class="logo-box">
                        <a href="index.html" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                                <!-- <span class="logo-lg-text-light">UBold</span> -->
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="20">
                                <!-- <span class="logo-lg-text-light">U</span> -->
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </span>
                        </a>
                    </div>

                    <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                        <li>
                            <button class="button-menu-mobile waves-effect waves-light">
                                <i class="feather-menu"></i>
                            </button>
                        </li>

                        <li>
                            <!-- Mobile menu toggle (Horizontal Layout)-->
                            <a class="navbar-toggle nav-link" data-toggle="collapse" data-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                    <!-- User box -->
                    <div class="user-box text-center">
                        <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                            class="rounded-circle avatar-md">
                        <div class="dropdown">
                            <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                                data-toggle="dropdown">Geneva Kennedy</a>
                            <div class="dropdown-menu user-pro-dropdown">

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="feather-user mr-1"></i>
                                    <span>My Account</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="feather-settings mr-1"></i>
                                    <span>Settings</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="feather-lock mr-1"></i>
                                    <span>Lock Screen</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="feather-log-out mr-1"></i>
                                    <span>Logout</span>
                                </a>

                            </div>
                        </div>
                        <p class="text-muted">Admin Head</p>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="{{URL::to('/dashboard')}}">
                                    <i data-feather="airplay"></i>
                                    <span> Dashboards </span>
                                </a>
                            </li>

                            <li class="menu-title mt-2">Apps</li>
                            <li>
                                <a href="{{URL::to('/view-category')}}">
                                    <i data-feather="shopping-cart"></i>
                                    <span> Danh mục sản phẩm </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/view-brand')}}">
                                    <i data-feather="aperture"></i>
                                    <span> Thương hiệu sản phẩm </span>
                                    <span class="menu-arrow"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/view-product')}}">
                                    <i data-feather="shopping-bag"></i>
                                    <span> Quản lí sản phẩm </span>
                                    <span class="menu-arrow"></span>
                                </a>
                            </li>
                            <li>
                                <a href="{{URL::to('/order-manager')}}">
                                    <i data-feather="calendar"></i>
                                    <span> Đơn hàng </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('/discount-manager')}}">
                                    <i data-feather="calendar"></i>
                                    <span> Khuyến mãi </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('/delivery-manager')}}">
                                    <i data-feather="calendar"></i>
                                    <span> Phí vận chuyển </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('/slide-manager')}}">
                                    <i data-feather="book"></i>
                                    <span> Quản lí slide </span>
                                </a>
                            </li>

                            <li>
                                <a href="{{URL::to('/mail-manager')}}">
                                    <i data-feather="mail"></i>
                                    <span> Email </span>
                                </a>
                            </li>
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

            <div class="content-page">

<!--Viet noi dung o day-->
              @yield('admin_content')

                <!-- Footer Start -->
                <footer class="footer">

                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->
        <!-- Modal -->
        <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Thêm phí vận chuyển</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body p-4">
                        <form action="{{URL::to('/add-feeship')}}" method="post">
                          @csrf
                            <div class="form-group">
                                <label for="city">Chọn Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                <select class="form-control select2 city choose" name="City" id="city">
                                  <option value="0">---- Chọn Tỉnh / Thành phố ----</option>
                                  @if (isset($city))
                                  @foreach ($city as $key => $ct)
                                  <option value="{{$ct->matp}}">{{$ct->name_city}}</option>
                                  @endforeach
                                  @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dictrict">Chọn Quận/Huyện <span class="text-danger">*</span></label>
                                <select class="form-control select2 district choose" name="District" id="district">
                                    <option value="0">---- Chọn Quận / Huyện ----</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Commune">Chọn Xã/Phường <span class="text-danger">*</span></label>
                                <select class="form-control select2 commune" name="Commune" id="Commune">
                                    <option value="0">---- Chọn Xã / Thị trấn ----</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="feeship">Phí vận chuyển <span class="text-danger">*</span></label>
                                <input type="text" id="feeship" name="shipmoney" class="form-control" placeholder="Phí vận chuyển">
                            </div>
                            <div class="text-right">
                                <button type="submit" name="add_delivery"  class="btn btn-success waves-effect waves-light add_delivery">Thêm</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">Trở lại</button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- Right bar overlay-->
        <!-- Vendor js -->
        <script src="{{asset('backend/js/vendor.min.js')}}"></script>

        <script src="{{asset('backend/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{asset('backend/libs/selectize/js/standalone/selectize.min.js')}}"></script>

        <!-- Dashboar 1 init js-->
        <script src="{{asset('backend/js/pages/dashboard-1.init.js')}}"></script>

        <!-- App js-->
        <script src="{{asset('backend/js/app.min.js')}}"></script>

        <!-- Summernote js -->
        <script src="{{asset('backend/libs/summernote/summernote-bs4.min.js')}}"></script>
        <!-- Select2 js-->
        <script src="{{asset('backend/libs/select2/js/select2.min.js')}}"></script>
        <!-- Dropzone file uploads-->
        <script src="{{asset('backend/libs/dropzone/min/dropzone.min.js')}}"></script>

        <!-- Init js-->
        <script src="{{asset('backend/js/pages/form-fileuploads.init.js')}}"></script>

        <!-- Init js -->
        <script src="{{asset('backend/js/pages/add-product.init.js')}}"></script>

        <script src="{{asset('backend/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>

        <script src="{{asset('backend/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

        <script src="{{asset('backend/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>

        <script src="{{asset('backend/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

        <script src="{{asset('backend/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js')}}"></script>
        <!-- third party js ends -->
        <script src="{{asset('backend/libs/bootstrap-table/bootstrap-table.min.js')}}"></script>

        <!-- Init js -->
        <script src="{{asset('backend/js/pages/bootstrap-tables.init.js')}}"></script>

        <!-- Datatables init -->
        <script src="{{asset('backend/js/pages/customers.init.js')}}"></script>

        <script src="{{asset('backend/js/pages/inbox.js')}}"></script>

        <script src="{{asset('backend/libs/summernote/summernote-bs4.min.js')}}"></script>

        <script>
            jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 230,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
            });
        </script>

        <script type="text/javascript">
          $(document).ready(function(){
            $('.choose').on('change',function(){
              var action = $(this).attr('id');
              var matp = $(this).val();
              var _token =  $('input[name="_token"]').val();
              var result = '';
              if (action == 'city') {
                result = 'district';
              }else {
                result = 'Commune';
              }
              $.ajax({
                url : '{{url('/select-delivery')}}',
                method : 'POST',
                data:{action:action,matp:matp,_token:_token},
                success:function(data){
                  $('#'+result).html(data);
                }
              });
            });
            // $('.add_delivery').click(function(){
            //   var city = $('.city').val();
            // });
          })
       </script>

    </body>
</html>
