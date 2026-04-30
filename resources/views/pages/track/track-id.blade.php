@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Kiểm đơn</h1>

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
  =            order tracking content         =
  =============================================-->

<div class="order-tracking-area mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-10 col-12 offset-lg-3 offset-md-1">
        <!--=======  order tracking box  =======-->

        <div class="order-tracking-box pt-50 pr-50 pb-50 pl-50  pt-xxs-40 pr-xxs-20 pb-xxs-40 pl-xxs-20">
          <p class="info-text mb-20">Nhập Mã đơn hàng trong phần <a href="{{URL::to('/my-account')}}"><strong>Đơn của bạn</strong></a> để kiểm tra.</p>

          <!--=======  order-tracking form  =======-->

          <div class="lezada-form order-tracking-form">
            <form action="send-bill" method="post">
              @csrf
              <div class="row">
                <div class="col-lg-12 mb-20">
                  <label for="orderId">Mã Đơn</label>
                  <input type="text" id="orderId" name="OrderID" placeholder="Nhập mã đơn hàng">
                </div>
                <div class="col-lg-12 text-center mt-40">
                  <button type="submit" class="lezada-button lezada-button--medium order-tracking-button">Kiểm tra</button>
                </div>
              </div>
            </form>
          </div>

          <!--=======  End of order-tracking form  =======-->
        </div>

        <!--=======  End of order tracking box  =======-->
      </div>
    </div>
  </div>
</div>
@endsection
