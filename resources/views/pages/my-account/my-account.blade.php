@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Tài khoản</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">Tài khoản</li>
        </ul>

        <!--=======  End of breadcrumb list  =======-->

      </div>
    </div>
  </div>
</div>

<!--=======  End of breadcrumb area =======-->

<!--=============================================
=            my account page content         =
=============================================-->

<div class="my-account-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="myaccount-tab-menu nav" role="tablist">
              <a href="#dashboad" class="active" data-toggle="tab">
                Bảng quản lý</a>
              <a href="#orders" data-toggle="tab"> Đơn hàng</a>
              <a href="#account-info" data-toggle="tab"> Chi tiết tài khoản</a>
              <a href="{{URL::to('/logout-customer')}}">Đăng xuất</a>
            </div>
          </div>
          <!-- My Account Tab Menu End -->
          <!-- My Account Tab Content Start -->
          <div class="col-lg-12 col-md-12">
            <div class="tab-content" id="myaccountContent">
              <!-- Single Tab Content Start -->
              <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                <div class="myaccount-content">
                  <h3>WELLCOME !</h3>
                  <?php
									$name = Session::get('CustomerName');
									?>
                  <div class="welcome">
                    <p>Xin chào, <strong><?php if(isset($name)){echo $name;} ?></strong> (Nếu không phải <strong><?php if(isset($name)){echo $name;}?>!</strong><a
                        href="{{URL::to('/logout-customer')}}" class="logout"> Đăng xuất</a>)</p>
                  </div>

                  <p class="mb-0">Ở đây bạn có thể xem đơn hàng , tình trạng đơn ,đổi địa chỉ giao hàng và thay đổi thông tin cá nhân.</p>
                </div>
              </div>
              <!-- Single Tab Content End -->
              <!-- Single Tab Content Start -->
              <div class="tab-pane fade" id="orders" role="tabpanel">
                <div class="myaccount-content">
                  <h3>Orders</h3>
                  <div class="myaccount-table table-responsive text-center">
                    <table class="table table-bordered">
                      <thead class="thead-light">
                        <tr>
                          <th>Đơn hàng</th>
                          <th>Ngày mua</th>
                          <th>Trạng thái</th>
                          <th>Tổng tiền</th>
                          <th>Xem</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($Order_customer as $key => $value)
                        <tr>
                          <td>{{$value->OrderID}}</td>
                          <td>{{$value->OrderDate}}</td>
                          @if ($value->OrderStatus == 1)
                            <td>Đã xác nhận</td>
                          @endif
                          @if ($value->OrderStatus == 0)
                            <td>Chờ xử lí</td>
                          @endif
                          <td>{{$value->OrderTotal}} VNĐ</td>
                          <td><a href="{{URL::to('/track-ID')}}" class="check-btn sqr-btn ">Xem</a></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Single Tab Content End -->

              <!-- Single Tab Content Start -->
              <div class="tab-pane fade" id="account-info" role="tabpanel">
                <div class="myaccount-content">
                  <h3>Chi tiết tài khoản</h3>
                  <div class="account-details-form">
                    <form action="{{URL::to('/change-info')}}" method="post">
                      @csrf
                      @foreach ($My_info as $key => $info_custom)
                      <input type="hidden" name="CusID" value="{{$info_custom->CustomerID}}">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="fname" class="required">Họ</label>
                            <input type="text" name="Fname" value="{{$info_custom->CustomerFirstName}}" id="fname" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="name" class="required">Tên</label>
                            <input type="text" name="Name" value="{{$info_custom->CustomerName}}" id="name" />
                          </div>
                        </div>
                      </div>
                        <div class="row">
                        <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="phone" class="required">Số điện thoại</label>
                            <input type="text" name="Phone" value="{{$info_custom->CustomerPhone}}" id="phone" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="address" class="required">Địa chỉ</label>
                            <input type="text" name="address" value="{{$info_custom->CustomerAddress}}" id="address" />
                          </div>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="email" class="required">Email</label>
                            <input type="email" name="Email" value="{{$info_custom->CustomerEmail}}" id="email" />
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="Username" class="required">Tài khoản</label>
                            <input type="text" name="Username" value="{{$info_custom->CustomerUsername}}" id="Username" />
                          </div>
                        </div>
                      </div>
                      <fieldset>
                        <legend>Đổi mật khẩu</legend>

                        <div class="row">
                          <div class="col-lg-6">
                          <div class="single-input-item">
                            <label for="current-pwd"  class="required">Mật khẩu hiện tại</label>
                            <input type="password" name="password" placeholder="Nhập mật khẩu hiện tại" id="current-pwd" />
                          </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="single-input-item">
                              <label for="new-pwd"  class="required">Mật khẩu mới</label>
                              <input type="password" name="Newpass" placeholder="Nhập mật khẩu mới" id="new-pwd" />
                            </div>
                          </div>
                        </div>
                      </fieldset>
                      <div class="single-input-item">
                        <button type="submit" class="check-btn sqr-btn ">Lưu thay đổi</button>
                      </div>
                      @endforeach
                    </form>
                  </div>
                </div>
              </div> <!-- Single Tab Content End -->
            </div>
          </div> <!-- My Account Tab Content End -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
