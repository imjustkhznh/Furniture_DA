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

        <div class="cart-table-container">
          <table class="cart-table">
            <?php
            $data_cart = Cart::getContent();
             ?>
             <?php
             $message = Session::get('message');
             if (isset($message)) {
               echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$message.'</p>';
               Session::put('message',null);
             }else {
               echo '<p class="text-muted mb-4 mt-3">.</p>';
           } ?>
            <thead>
              <tr>
                <th class="product-name" colspan="2">Sản phẩm</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-subtotal">Tổng tiền</th>
                <th class="product-remove">&nbsp;</th>
                <th class="product-remove">&nbsp;</th>
              </tr>
            </thead>

            <tbody>
              @php
                $total = 0;
              @endphp
              @foreach ($data_cart as $key => $value)
                @php
                  $thanhtien = $value->price * $value->quantity;
                  $total += $thanhtien;
                @endphp
              <form class="" id="my_form"  action="{{URL::to('/update_quanty/rowID='.$value->id.'')}}" method="post">
                {{csrf_field()}}
              <tr>
                <td class="product-thumbnail">
                  <a href="shop-product-basic.html">
                    <img src="{{ asset('Upload/Product/'.($value->attributes->image && file_exists(public_path('Upload/Product/'.$value->attributes->image)) ? $value->attributes->image : 'no-image.svg')) }}" class="img-fluid" alt="">
                  </a>
                </td>
                <td class="product-name">
                  <a href="shop-product-basic.html">{{$value->name}}</a>
                  <span class="product-variation">Màu sắc: {{$value->attributes->color}}</span>
                </td>

                <td class="product-price"><span class="price">{{number_format($value->price,0)}} VNĐ</span></td>

                <td class="product-quantity">
                  <div class="pro-qty d-inline-block mx-0">
                    <input type="text" name="Quanty" value="{{$value->quantity}}">
                  </div>
                </td>

                <td class="total-price"><span class="price">{{number_format($value->quantity * $value->price,0)}} VNĐ</span></td>

                <td class="product-remove">

                  <a href="{{URL::to('/remove/id='.$value->id.'')}}">
                    <i class="ion-android-close"></i>
                  </a>

                </td>

                <td class="product-remove">
                  <input type="hidden" name="RowID" value="{{$value->id}}">
                  <button type="submit" class="lezada-button lezada-button--medium">
                    <i class="ion-android-refresh"></i>
                  </button>

                </td>

              </tr>
              </form>
              @endforeach
            </tbody>
          </table>
        </div>

        <!--=======  End of cart table  =======-->
      </div>



      @if (Session::get('Cart'))
      <div class="col-lg-12 mb-80">
        <!--=======  coupon area  =======-->

        <div class="cart-coupon-area pb-30">
          <div class="row align-items-center">
            <div class="col-lg-6 mb-md-30 mb-sm-30">
              <!--=======  coupon form  =======-->

              <div class="lezada-form coupon-form">
                <form action="{{URL::to('/check-discount')}}" method="post">
                  @csrf
                  <div class="row">
                    <div class="col-md-4 mb-sm-10">
                      <input type="text" name="DiscountCode" placeholder="Nhập mã giảm giá nếu có">
                    </div>
                    <div class="col-md-4">
                      <button type="submit" class="lezada-button lezada-button--medium">Sử dụng</button>
                    </div>
                    @if (Session::get('discount'))
                    <div class="col-md-4">
                      <a type="submit" href="{{URL::to('delete-code')}}" class="lezada-button lezada-button--medium">Xóa mã</a>
                    </div>
                    @endif
                  </div>
                </form>
              </div>

              <!--=======  End of coupon form  =======-->
            </div>

            <div class="col-lg-6 text-left text-lg-right">
              <!--=======  update cart button  =======-->
              <a href="{{URL::to('/delete-all')}}" class="lezada-button lezada-button--medium">Xóa tất cả</a>
              <!--=======  End of update cart button  =======-->
            </div>
          </div>
        </div>

        <!--=======  End of coupon area  =======-->
      </div>

      <div class="col-xl-4 offset-xl-8 col-lg-5 offset-lg-7">
        <div class="cart-calculation-area">
          <h2 class="mb-40">Tổng giỏ hàng</h2>

          <table class="cart-calculation-table mb-30">
            <tr>
              <th>Tổng đơn</th>
              <td>{{number_format($total)}} VNĐ</td>
            </tr>
          @if (Session::get('discount'))
            @foreach (Session::get('discount') as $key => $val)
              @if ($val['DiscountType'] == 1)
                <tr>
                  <th>Khuyến mãi</th>
                  <td >{{$val['DiscountValue']}} %</td>
                  @php
                    $total = $total - $total * $val['DiscountValue']/100;
                  @endphp
                </tr>
              @endif
              @if ($val['DiscountType'] == 2)
                <tr>
                  <th>Khuyến mãi</th>
                  <td >{{number_format($val['DiscountValue'])}} VNĐ</td>
                  @php
                    $total = $total - $val['DiscountValue'] ;
                  @endphp
                </tr>
              @endif
            {{-- <tr>
              <th>Khuyến mãi</th>
              <td > VNĐ</td>
            </tr> --}}
            @endforeach
          @endif
            {{-- <tr>
              <th>Thuế VAT</th>
              <td class="subtotal">0 VNĐ</td>
            </tr>
            <tr>
              <th>Phí vận chuyển</th>
              <td class="subtotal">Free ship</td>
            </tr> --}}
            <tr>
              <th>Tất cả</th>
              <td class="subtotal">{{number_format($total)}} VNĐ</td>
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
      @endif
    </div>
  </div>
</div>
@endsection
