@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Kiểm tra đơn hàng</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">Kiểm đơn</li>
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
            <div class="row row-40">
              <div class="col-lg-12">
                <div class="row">

                  <!-- Cart Total -->
                  <div class="col-12 mb-60">

                    <h4 class="checkout-title">Đơn của bạn</h4>

                    <div class="checkout-cart-total">
                      <h4>Sản phẩm <span>Tổng tiền</span></h4>

                      <ul>
                        @foreach ($info_order as $key => $value)
                        <li>{{$value->ProductName}} X {{$value->ProductQuanty}} <span>{{number_format($value->ProductPrice * $value->ProductQuanty,0)}} VNĐ</span></li>
                        @endforeach
                      </ul>
                      @foreach ($info_order_tbl as $key => $info)
                      <p>Người đặt hàng <span><?php echo $info->ShippingName;?></span></p>
                      <p>Email <span><?php echo $info->ShippingEmail;?></span></p>
                      <p>Số điện thoại <span><?php echo $info->ShippingPhone;?></span></p>
                      <p>Địa chỉ <span><?php echo $info->ShippingAddress;?></span></p>
                      @if ($info->OrderStatus == 1)
                          <p>Tình trạng <span><strong>Đang giao hàng</strong></span></p>
                      @endif
                      @if ($info->OrderStatus == 0)
                          <p>Tình trạng <span><strong>Chờ xác nhận</strong></span></p>
                      @endif
                      @endforeach
                      @foreach ($info_order_tbl as $key => $value_total)
                      <h4>Tổng tiền : <span>{{number_format($value_total->OrderTotal)}} VNĐ</span></h4>
                      @endforeach
                    </div>

                  </div>

                </div>
              </div>

            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
