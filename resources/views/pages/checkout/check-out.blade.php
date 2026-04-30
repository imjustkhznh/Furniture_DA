@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Thanh toán</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">Thanh toán</li>
        </ul>

        <!--=======  End of breadcrumb list  =======-->

      </div>
    </div>
  </div>
</div>

<!--=======  End of breadcrumb area =======-->

<!--=============================================
=            checkout page content         =
=============================================-->
<div class="checkout-page-area mb-130">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="lezada-form">
          <!-- Checkout Form s-->
          <?php
          $message = Session::get('message');
          if (isset($message)) {
            echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$message.'</p>';
            Session::put('message',null);
          }else {
            echo '<p class="text-muted mb-4 mt-3">.</p>';
          } ?>
          <form action="{{URL::to('/send-info-shipping')}}" method="post" class="checkout-form">
            @csrf
            <div class="row row-40">

              <div class="col-lg-7 mb-20">
                <?php
                $cusID = Session::get('CustomerID');
                ?>
                <input type="hidden" name="CustomerID" value="{{$cusID}}">
                <!-- Billing Address -->
                <div id="billing-form" class="mb-40">
                  <h4 class="checkout-title">Địa chỉ thanh toán</h4>
                  @foreach ($info_custom as $key => $value)
                  <div class="row">

                    <div class="col-md-6 col-12 mb-20">
                      <label>Họ *</label>
                      <input type="text" value="{{$value->CustomerFirstName}}" name="FirstName" placeholder="Họ">
                    </div>

                    <div class="col-md-6 col-12 mb-20">
                      <label>Tên *</label>
                      <input type="text" value="{{$value->CustomerName}}" name="Name" placeholder="Tên">
                    </div>

                    <div class="col-md-6 col-12 mb-20">
                      <label>Địa chỉ Email *</label>
                      <input type="email" value="{{$value->CustomerEmail}}" name="Email" placeholder="Địa chỉ Email">
                    </div>

                    <div class="col-md-6 col-12 mb-20">
                      <label>Số điện thoại *</label>
                      <input type="text" value="{{$value->CustomerPhone}}" name="Phone" placeholder="Số điện thoại">
                    </div>
                    <div class="col-md-6 col-12 mb-20">
                      <label>Tỉnh /Thành phố *</label>
                      <select class="nice-select city choose" name="City" id="city" required>
                        <option value="0">---Chọn Tỉnh / Thành phố---</option>
                        @if (isset($city))
                        @foreach ($city as $key => $ct)
                        <option value="{{$ct->matp}}">{{$ct->name_city}}</option>
                        @endforeach
                        @endif
                      </select>
                    </div>
                    <div class="col-md-6 col-12 mb-20">
                      <label>Quận / Huyện*</label>
                      <select class="nice-select district choose" name="District" id="district" required>
                        <option value="0">---Chọn Quận / Huyện---</option>

                      </select>
                    </div>
                    <div class="col-md-6 col-12 mb-20">
                      <label>Xã / Phường*</label>
                      <select class="nice-select commune" name="Commune" id="Commune" required>
                        <option value="0">---Chọn Xã / Thị trấn---</option>
                      </select>
                    </div>

                    <div class="col-md-6 col-12 mb-20">
                      <label>Địa chỉ chi tiết *</label>
                      <input type="text" value="{{$value->CustomerAddress}}" name="Address" placeholder="Địa chỉ nhận hàng chi tiết">
                    </div>
                    @if (Session::get('ShipMon'))
                      <div class="col-12 mb-20">
                        <label>Đổi địa chỉ *</label>
                          <input type="submit" name="change_ship" class="lezada-button lezada-button--small lezada-button--icon lezada-button--icon--left" value="Đổi địa chỉ" style="background-color: darkslategrey;">
                      </div>
                    @else
                      <div class="col-12 mb-20">
                        <label>Tính phí vận chuyển *</label>
                          <input type="submit" name="caculator_ship" class="lezada-button lezada-button--small lezada-button--icon lezada-button--icon--left" value="Xác nhận địa chỉ" style="background-color: darkslategrey;">
                      </div>
                    @endif
                  </div>
                @endforeach

                </div>
              </div>

              <div class="col-lg-5">
                <div class="row">

                  <!-- Cart Total -->
                  <div class="col-12 mb-60">

                    <h4 class="checkout-title">Đơn của bạn</h4>

                    <div class="checkout-cart-total">
                      <?php
                      $data_cart = Cart::getContent();
                       ?>
                      <h4>Sản phẩm <span>Tổng tiền</span></h4>



                    {{-- SẢN PHẨM --}}
                      <ul>
                        @php
                          $total = 0;
                        @endphp
                        @foreach ($data_cart as $key => $value)
                          @php
                            $thanhtien = $value->price * $value->quantity;
                            $total += $thanhtien;
                          @endphp
                        <li>{{$value->name}} X {{$value->quantity}} <span>{{number_format($value->quantity * $value->price,0)}} VNĐ</span></li>
                        @endforeach
                      </ul>

                      {{-- Giảm giá --}}

                      @if (Session::get('discount'))
                        @foreach (Session::get('discount') as $key => $val)
                          @if ($val['DiscountType'] == 1)
                            <p>
                              Khuyến mãi
                              <span>{{$val['DiscountValue']}} %</span>
                              <input type="hidden" name="DiscountCode" value="{{$val['DiscountCode']}}">
                              <input type="hidden" name="DiscountValue" value="{{$val['DiscountValue']}}">
                              @php
                                $total = $total - $total * $val['DiscountValue']/100;
                              @endphp
                            </p>
                          @endif
                          @if ($val['DiscountType'] == 2)
                            <p>
                              Khuyến mãi
                              <span>{{number_format($val['DiscountValue'])}} VNĐ</span>
                              <input type="hidden" name="DiscountCode" value="{{$val['DiscountCode']}}">
                              <input type="hidden" name="DiscountValue" value="{{$val['DiscountValue']}}">
                              @php
                                $total = $total - $val['DiscountValue'] ;
                              @endphp
                            </p>
                          @endif
                        @endforeach
                        @else
                          <p>Khuyến mãi <span>0 VNĐ</span></p>
                      @endif


                        {{-- Phí ship --}}

                      @if (Session::get('ShipMon'))
                        <p>Phí Ship <span>{{number_format(Session::get('ShipMon'))}} VNĐ</span></p>
                        <input type="hidden" name="Ship" value="{{Session::get('ShipMon')}}">
                        @php
                          $total = $total + Session::get('ShipMon');
                        @endphp
                      @endif
                      <p>Tổng đơn <span>{{number_format($total)}} VNĐ</span></p>
                    </div>

                  </div>


                  <!-- Payment Method -->
                  @if (Session::get('ShipMon'))
                  <div class="col-12">
                    <input type="hidden" name="Total" value="{{$total}}">
                    <h4 class="checkout-title">Phương thức thanh toán</h4>

                    <div class="checkout-payment-method">

                      <div class="single-method">
                        <input type="radio" id="payment_check" name="payment_method" value="Thanh toán khi nhận hàng">
                        <label for="payment_check">Thanh toán khi nhận hàng</label>
                        <p data-method="check">Thanh toán khi đã nhận được hàng , khách hàng có thể kiểm tra hàng trước khi nhận và có nhu cầu đổi trả.</p>
                      </div>

                      <div class="single-method">
                        <input type="radio" id="payment_cash" name="payment_method" value="Chuyển khoản ATM">
                        <label for="payment_cash">Chuyển khoản trực tiếp</label>
                        <p data-method="cash">Bạn vui lòng điền đầy đủ thông tin thẻ ở bước tiếp theo.</p>
                      </div>

                      <div class="single-method">
                        <input type="radio" id="payment_paypal" name="payment_method" value="Paypal">
                        <label for="payment_paypal">Paypal</label>
                        <p data-method="paypal">.</p>
                      </div>

                      <div class="single-method">
                        <input type="checkbox" value="OK" name="Accept" id="accept_terms">
                        <label for="accept_terms">Tôi đã xem lại đơn và chấp thuận các điều khoản mua hàng !</label>
                      </div>

                    </div>

                    <button type="submit" class="lezada-button lezada-button--medium mt-30">Đặt ngay</button>

                  </div>
                  @endif

                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
