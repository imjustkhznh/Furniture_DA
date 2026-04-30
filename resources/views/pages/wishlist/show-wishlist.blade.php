@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Wishlist</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">HOME</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">wishlist</li>
        </ul>

        <!--=======  End of breadcrumb list  =======-->

      </div>
    </div>
  </div>
</div>

<!--=======  End of breadcrumb area =======-->

<!--=============================================
=            wishlist page content         =
=============================================-->

<div class="shopping-cart-area mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!--=======  cart table  =======-->

        <div class="cart-table-container">
          @if (isset($Product_wishlist))
          <table class="cart-table">
            <thead>
              <tr>
                <th class="product-name" colspan="2">Sản phẩm</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal">&nbsp;</th>
                <th class="product-remove">&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($Product_wishlist as $key => $value)
              <tr>
                <td class="product-thumbnail">
                  <a href="shop-product-basic.html">
                  <img src="{{ asset('Upload/Product/'.($value->ProductImage && file_exists(public_path('Upload/Product/'.$value->ProductImage)) ? $value->ProductImage : 'no-image.svg')) }}" class="img-fluid" alt="">
                  </a>
                </td>
                <td class="product-name">
                  <a href="shop-product-basic.html">{{$value->ProductName}}</a>
                  <span class="product-variation">Màu sắc: {{$value->ProductColor}}</span>
                </td>

                <td class="product-price"><span class="price">{{$value->ProductPrice}} VNĐ</span></td>

                <td class="product-quantity">
                  <div class="pro-qty d-inline-block mx-0">
                    <input type="text" value="{{$value->ProductQuanty}}">
                  </div>
                </td>

                <td class="add-to-cart"><button class="lezada-button lezada-button--small lezada-button--icon--left">
                    <i class="ion-ios-cart-outline"></i> Thêm vào giỏ hàng</button></td>

                <td class="product-remove">
                  <a href="{{URL::to('remove_wl_'.$value->WishlistID.'')}}">
                    <i class="ion-android-close"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          @else
          <p>Chưa có sản phẩm nào trong danh sách yêu thích</p>
          @endif
        </div>

        <!--=======  End of cart table  =======-->
      </div>
    </div>
  </div>
</div>
@endsection
