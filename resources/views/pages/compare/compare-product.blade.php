@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">So sánh</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">so sánh</li>
        </ul>

        <!--=======  End of breadcrumb list  =======-->

      </div>
    </div>
  </div>
</div>

<!--=======  End of breadcrumb area =======-->

<!--=============================================
=            compare page content         =
=============================================-->

<div class="compare-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- Compare Page Content Start -->
        <div class="compare-page-content-wrap">
          <div class="compare-table table-responsive">
            @if (Session::get('Compare'))
            <table class="table table-bordered mb-0">
              <tbody>

                <tr>
                  <th class="first-column">Thông tin sản phẩm</th>
                  @foreach (Session::get('Compare') as $key => $value)
                  <td class="product-image-title">
                    <div class="compare-remove">
                      <a href="{{URL::to('/remove-compare_'.$value['ProductID'].'')}}"><i class="fa fa-times"></i>Loại bỏ</a>
                    </div>
                    <a href="shop-product-basic.html" class="image-compare">
                      <img class="img-fluid" src="{{asset('Upload/Product/'.$value['ProductImage'])}}"  alt="Compare Product">
                    </a>
                    <div class="pro-title">
                      <a href="shop-product-basic.html">{{$value['ProductName']}}</a>
                    </div>
                    <div class="compare-btn">
                      <a href="#">Thêm vào giỏ hàng</a>
                    </div>
                  </td>
                  @endforeach
                </tr>
                <tr>
                  <th class="first-column">Giá</th>
                  @foreach (Session::get('Compare') as $key => $value)
                  <td class="pro-price">{{number_format($value['ProductPrice'])}} VNĐ</td>
                  @endforeach
                </tr>

                <tr>
                  <th class="first-column">Mã sản phẩm</th>
                  @foreach (Session::get('Compare') as $key => $value)
                  <td class="pro-sku">PR. D-{{$value['ProductID']}}</td>
                  @endforeach
                </tr>
                <tr>
                  <th class="first-column">Mô tả</th>
                  @foreach (Session::get('Compare') as $key => $value)
                  <td class="pro-desc">
                    <p>{!!$value['ProductDescrip']!!}</p>
                  </td>
                  @endforeach
                </tr>
                <tr>
                  <th class="first-column">Danh mục sản phẩm</th>
                  @foreach (Session::get('Compare') as $key => $value)
                  <td class="pro-weight">{{$value['ProductCategory']}}</td>
                  @endforeach
                </tr>
                <tr>
                  <th class="first-column">Thương hiệu</th>
                  @foreach (Session::get('Compare') as $key => $value)
                  <td class="pro-dimensions">{{$value['ProductBrand']}}</td>
                  @endforeach
                </tr>
              </tbody>
            </table>
            @else
              <p>Chưa có sản phẩm nào được thêm</p>
            @endif
          </div>
        </div>
        <!-- Compare Page Content End -->
      </div>
    </div>
  </div>
</div>
@endsection
