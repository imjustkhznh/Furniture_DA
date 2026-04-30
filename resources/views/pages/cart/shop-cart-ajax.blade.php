@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Giỏ hàng</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">Giỏ hàng</li>
        </ul>

        <!--=======  End of breadcrumb list  =======-->

      </div>
    </div>
  </div>
</div>

<!--=======  End of breadcrumb area =======-->

<!--=============================================
=            cart page content         =
=============================================-->

<div class="shopping-cart-area mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 mb-30">
        <!--=======  cart table  =======-->
        <form class="{{URL::to('/update_cart')}}" id="my_form"  action="" method="post">
        <div class="cart-table-container">
          <table class="cart-table">
            <thead>
              <tr>
                <th class="product-name" colspan="2">Sản phẩm</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal">Tổng tiền</th>
                <th class="product-remove">&nbsp;</th>
              </tr>
            </thead>

            <tbody>

                @php
                  $total = 0;
                @endphp
                @foreach (Session::get('Cart') as $key => $value)
                  @php
                    $thanhtien = $value['ProductPrice'] * $value['ProductQuanty'];
                    $total += $thanhtien;
                  @endphp
              <tr>
                <td class="product-thumbnail">
                  <a href="shop-product-basic.html">
                    <img src="{{ asset('Upload/Product/'.(!empty($value['ProductImage']) && file_exists(public_path('Upload/Product/'.$value['ProductImage'])) ? $value['ProductImage'] : 'no-image.svg')) }}" class="img-fluid" alt="">
                  </a>
                </td>
                <td class="product-name">
                  <a href="shop-product-basic.html">{{$value['ProductName']}}</a>
                  <span class="product-variation">Màu sắc:{{$value['ProductColor']}}</span>
                </td>

                <td class="product-price"><span class="price">{{number_format($value['ProductPrice'])}} VNĐ</span></td>

                <td class="product-quantity">
                  <div class="pro-qty d-inline-block mx-0">
                    <input type="text" name="Quanty" value="{{$value['ProductQuanty']}}">
                  </div>
                </td>

                <td class="total-price"><span class="price">{{number_format($thanhtien)}} VNĐ</span></td>

                <td class="product-remove">

                  <a href="{{URL::to('/delete-pro/id='.$value['Session_Cart'].'')}}">
                    <i class="ion-android-close"></i>
                  </a>

                </td>

              </tr>
              @endforeach


            </tbody>
          </table>
        </div>

        <!--=======  End of cart table  =======-->
      </div>
      <div class="col-lg-12 mb-80">
        <!--=======  coupon area  =======-->

        <div class="cart-coupon-area pb-30">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-md-30 mb-sm-30">
              <!--=======  coupon form  =======-->

              <div class="lezada-form coupon-form">
                <form action="#">
                  <div class="row">
                    <div class="col-md-7 mb-sm-10">
                      <input type="text" class="form-control" placeholder="Nhập mã giảm giá nếu có">
                    </div>
                    <div class="col-md-5">
                      <button class="lezada-button lezada-button--medium">Sử dụng</button>
                    </div>
                  </div>
                </form>
              </div>

              <!--=======  End of coupon form  =======-->
            </div>

            <div class="col-lg-6 text-left text-lg-right">
              <!--=======  update cart button  =======-->
              <a href="javascript:{}" onclick="document.getElementById('my_form').submit();" class="lezada-button lezada-button--medium">Cập nhật giỏ hàng</a>
              <!--=======  End of update cart button  =======-->
            </div>
          </div>
        </div>

        <!--=======  End of coupon area  =======-->
      </div>
      </form>

      <div class="col-xl-4 offset-xl-8 col-lg-5 offset-lg-7">
        <div class="cart-calculation-area">
          <h2 class="mb-40">Tổng giỏ hàng</h2>

          <table class="cart-calculation-table mb-30">
            <tr>
              <th>Tổng đơn</th>
              <td class="subtotal">{{number_format($total)}} VNĐ</td>
            </tr>
            <tr>
              <th>Thuế VAT</th>
              <td class="subtotal"> VNĐ</td>
            </tr>
            <tr>
              <th>Phí vận chuyển</th>
              <td class="subtotal">Free ship</td>
            </tr>
            <tr>
              <th>Tất cả</th>
              <td class="total"> VNĐ</td>
            </tr>
          </table>

          <div class="cart-calculation-button text-center">
            <?php
            $name = Session::get('CustomerName');
            $cusID = Session::get('CustomerID');
            ?>
            <?php if(isset($name)==false){ ?>
            <a class="lezada-button lezada-button--medium" href="{{URL::to('/check-login')}}">Thanh toán</a>
            <?php } ?>
            <?php if(isset($name)){ ?>
            <a class="lezada-button lezada-button--medium" href="{{URL::to('/check-out/'.$cusID.'')}}">Thanh toán</a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
