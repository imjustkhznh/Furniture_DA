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
      <div class="col-6">
        <h4 class="checkout-title">Thanks you 🧡💛💚💙</h4>
        <div class="checkout-cart-total">
        <p>Cảm ơn bạn đã mua hàng tại shop bạn có thể xem tình trạng đơn hàng tại &nbsp; &nbsp;<a href="{{URL::to('/my-account#orders')}}">ĐÂY</a></p>
      </div>
        <a type="submit" href="{{URL::to('/shop')}}" class="lezada-button lezada-button--medium mt-30">Tiếp tục mua hàng</a>
      </div>
      <div class="col-6">
        <div class="lezada-form">
          <form method="post" class="checkout-form">
            @foreach ($info_ship as $key => $info)
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
                      <p>Người đặt hàng <span><?php echo $info->ShippingName;?></span></p>
                      <p>Email <span><?php echo $info->ShippingEmail;?></span></p>
                      <p>Số điện thoại <span><?php echo $info->ShippingPhone;?></span></p>
                      <p>Địa chỉ <span><?php echo $info->ShippingAddress;?></span></p>
                      @foreach ($info_order_tbl as $key => $value_total)
                      @if (Session::get('discount'))
                        @foreach (Session::get('discount') as $key => $val)
                          <p>Mã khuyến mãi <span>{{$val['DiscountCode']}}</span></p>
                          @if ($val['DiscountType'] == 1)
                            <p>
                              Khuyến mãi :
                              <span>{{$val['DiscountValue']}} %</span>
                            </p>
                          @endif
                          @if ($val['DiscountType'] == 2)
                            <p>
                              Khuyến mãi
                              <span>{{number_format($val['DiscountValue'])}} VNĐ</span>
                            </p>
                          @endif
                        @endforeach
                      @endif
                      <p>Phí ship : <span>{{number_format(Session::get('ShipMon'))}} VNĐ</span></p>
                      <h4>Tổng tiền : <span>{{number_format($value_total->OrderTotal)}} VNĐ</span></h4>
                      @endforeach
                    </div>

                  </div>

                </div>
              </div>

            </div>
            @endforeach
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
