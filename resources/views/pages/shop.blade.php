@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-2 pt-50 pb-70">
  <div class="container">
<div class="row">
  <div class="col-lg-12">
    <h1 class="breadcrumb-title">Shop</h1>

    <!--=======  breadcrumb list  =======-->

    <ul class="breadcrumb-list">
      <li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
      <li class="breadcrumb-list__item breadcrumb-list__item--active">Sản phẩm</li>
    </ul>

    <!--=======  End of breadcrumb list  =======-->

  </div>
</div>
</div>
</div>

<!--=======  End of breadcrumb area =======-->

<!--=============================================
=            shop page content         =
=============================================-->

<div class="shop-page-wrapper">

<!--=======  shop page header  =======-->

<div class="shop-page-header">
<div class="container wide">
  <div class="row align-items-center">

    <div class="col-12 col-lg-7 col-md-10 d-none d-md-block">
      <!--=======  fitler titles  =======-->
      <div class="filter-title filter-title--type-two">
        <ul class="product-filter-menu">
          <li class="active" data-filter="*">Tất cả</li>
          <li data-filter=".hot">HOT</li>
          <li data-filter=".new">New</li>
          <li data-filter=".sale">sale</li>
          <li class="active" style="color:Green"><i class="fa fa-undo"></i><a href="{{URL::to('/shop')}}">Làm Mới</a></li>
        </ul>
      </div>
      <!--=======  End of fitler titles  =======-->
    </div>

    <div class="col-12 col-lg-5 col-md-2">
      <!--=======  filter icons  =======-->

      <div class="filter-icons">
        <!--=======  filter dropdown  =======-->

        <div class="single-icon filter-dropdown">
          <select name="form" class="nice-select" onchange="location = this.value;">
            <option value="">Lọc</option>
            <option value="{{URL::to('/shop')}}">Sắp xếp mặc định</option>
            <option value="{{URL::to('/shop-tangdan')}}">Sắp xếp giá tăng dần</option>
            <option value="{{URL::to('/shop-giamdan')}}">Sắp xếp giá giảm dần</option>
          </select>
        </div>

        <!--=======  End of filter dropdown  =======-->

        <!--=======  grid icons  =======-->

        <div class="single-icon grid-icons">
          <a data-target="five-column"  href="javascript:void(0)"><i
              class="ti-layout-grid4-alt"></i></a>
          <a data-target="four-column"  class="active" href="javascript:void(0)"><i class="ti-layout-grid3-alt"></i></a>
          <a data-target="three-column" href="javascript:void(0)"><i class="ti-layout-grid2-alt"></i></a>
          <a data-target="list" href="javascript:void(0)"><i class="ti-view-list"></i></a>
        </div>

        <!--=======  End of grid icons  =======-->

        <!--=======  advance filter icon  =======-->

        <div class="single-icon advance-filter-icon">
          <a href="javascript:void(0)" id="advance-filter-active-btn"><i class="ion-android-funnel"></i>
            Filters</a>
        </div>

        <!--=======  End of advance filter icon  =======-->
      </div>

      <!--=======  End of filter icons  =======-->
    </div>

  </div>
</div>
</div>

<!--=======  End of shop page header  =======-->

<!--=============================================
  =            shop advance filter area         =
  =============================================-->

<div class="shop-advance-filter-area" id="shop-advance-filter-area">
<div class="shop-advance-filter-wrapper pt-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
        <!--=======  single advance filte  =======-->

        <div class="single-filter-widget">
          <h2 class="single-filter-widget--title">Sort by</h2>
          <ul class="single-filter-widget--list">
            <li><a href="#">Default</a></li>
            <li><a href="#">Popularity</a></li>
            <li><a href="#">Average rating</a></li>
            <li><a href="#">Newness</a></li>
            <li><a href="#">Price: low to high</a></li>
            <li><a href="#">Price: high to low</a></li>
          </ul>
        </div>

        <!--=======  End of single advance filte  =======-->
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
        <!--=======  single advance filte  =======-->

        <div class="single-filter-widget">
          <h2 class="single-filter-widget--title">Categories</h2>
          <ul class="single-filter-widget--list single-filter-widget--list--category">
            <li class="has-children">
              <a href="shop-left-sidebar.html">Cosmetic </a> <span class="quantity">5</span>
              <ul>
                <li><a href="shop-left-sidebar.html">For body</a></li>
                <li><a href="shop-left-sidebar.html">Make up</a></li>
                <li><a href="shop-left-sidebar.html">New</a></li>
                <li><a href="shop-left-sidebar.html">Perfumes</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="shop-left-sidebar.html">Furniture </a> <span class="quantity">23</span>
              <ul>
                <li><a href="shop-left-sidebar.html">Sofas</a></li>
                <li><a href="shop-left-sidebar.html">Armchairs</a></li>
                <li><a href="shop-left-sidebar.html">Desk Chairs</a></li>
                <li><a href="shop-left-sidebar.html">Dining Chairs</a></li>
              </ul>
            </li>
            <li><a href="shop-left-sidebar.html">Watches </a> <span class="quantity">12</span></li>
          </ul>
        </div>

        <!--=======  End of single advance filte  =======-->
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
        <!--=======  single advance filte  =======-->

        <div class="single-filter-widget">
          <h2 class="single-filter-widget--title">Price filter</h2>
          <ul class="single-filter-widget--list">
            <li><a href="#">All</a></li>
            <li><a href="#">$0.00 - $70.00</a></li>
            <li><a href="#">$70.00 - $140.00</a></li>
            <li><a href="#">$140.00 - $210.00</a></li>
            <li><a href="#">$210.00 - $280.00</a></li>
            <li><a href="#">$280.00 - $350.00</a></li>
          </ul>
        </div>

        <!--=======  End of single advance filte  =======-->
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
        <!--=======  single advance filte  =======-->

        <div class="single-filter-widget">
          <h2 class="single-filter-widget--title">Color</h2>
          <ul class="single-filter-widget--list single-filter-widget--list--color">
            <li><a class="active" href="#" data-tippy="Black" data-tippy-inertia="true"
                data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                data-tippy-theme="sharpborder"><span class="color-picker black"></span></a></li>
            <li><a href="#" data-tippy="Blue" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker blue"></span></a></li>
            <li><a href="#" data-tippy="Brown" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker brown"></span></a></li>
            <li><a href="#" data-tippy="Gold" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker gold"></span></a></li>
            <li><a href="#" data-tippy="Green Coral" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker green-coral"></span></a></li>
            <li><a href="#" data-tippy="Grey" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker grey"></span></a></li>
            <li><a href="#" data-tippy="Oak" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker oak"></span></a></li>
            <li><a href="#" data-tippy="Pink" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker pink"></span></a></li>
            <li><a href="#" data-tippy="Silver" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker silver"></span></a></li>
            <li><a href="#" data-tippy="White" data-tippy-inertia="true" data-tippy-animation="shift-away"
                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span
                  class="color-picker white"></span></a></li>
          </ul>
        </div>

        <!--=======  End of single advance filte  =======-->
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
        <!--=======  single advance filte  =======-->

        <div class="single-filter-widget">
          <h2 class="single-filter-widget--title">Size</h2>
          <ul class="single-filter-widget--list single-filter-widget--list--size">
            <li><a href="#">L</a> <span class="quantity">5</span></li>
            <li><a href="#">M</a> <span class="quantity">5</span></li>
            <li><a href="#">S</a> <span class="quantity">5</span></li>
            <li><a href="#">XS</a> <span class="quantity">5</span></li>
          </ul>
        </div>

        <!--=======  End of single advance filte  =======-->
      </div>

      <div class="col-lg-2 col-md-4 col-sm-6 mb-50">
        <!--=======  single advance filte  =======-->

        <div class="single-filter-widget">
          <h2 class="single-filter-widget--title">Brands</h2>
          <ul class="single-filter-widget--list single-filter-widget--list--brand">
            <li><a href="#">Alliop</a> <span class="quantity">(12)</span></li>
            <li><a href="#">Burberry</a> <span class="quantity">(15)</span></li>
            <li><a href="#">Catmen</a> <span class="quantity">(13)</span></li>
            <li><a href="#">Houdini</a> <span class="quantity">(10)</span></li>
            <li><a href="#">Love</a> <span class="quantity">(70)</span></li>
            <li><a href="#">Made</a> <span class="quantity">(15)</span></li>
          </ul>
        </div>

        <!--=======  End of single advance filte  =======-->
      </div>
    </div>
  </div>
</div>
</div>
<div class="shop-page-content mt-100 mb-100">
<div class="container wide">
  <div class="row">
    <div class="col-xl-3 col-lg-3 order-2 order-lg-1">
      <!--=======  page sidebar  =======-->

      <div class="page-sidebar">
        <!--=======  single sidebar widget  =======-->

        <div class="single-sidebar-widget mb-40">
          <!--=======  search widget  =======-->

          <div class="search-widget">
            <form action="{{URL::to('/search')}}">
              <input type="search" name="Search" placeholder="Search products ...">
              <button type="submit"><i class="ion-android-search"></i></button>
            </form>
          </div>

          <!--=======  End of search widget  =======-->
        </div>


        <!--=======  End of single sidebarwidget  =======-->

        <!--=======  single sidebar widget  =======-->

        <div class="single-sidebar-widget mb-40">
          <h2 class="single-sidebar-widget--title">Danh mục sản phẩm</h2>
          <ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
            @foreach ($cateProduct as $key => $value)
            <li><a href="{{URL::to('/product-of-category_'.$value->CategoryID.'')}}">{{$value->CategoryName}}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="single-sidebar-widget mb-40">
          <h2 class="single-sidebar-widget--title">Thương hiệu sản phẩm</h2>
          <ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
            @foreach ($brandProduct as $key => $value)
            <li><a href="{{URL::to('/product-of-brand_'.$value->BrandID.'')}}">{{$value->BrandName}}</a></li>
            @endforeach
          </ul>
        </div>

        <!--=======  End of single sidebar widget  =======-->

        <!--=======  single sidebar widget  =======-->

        <div class="single-sidebar-widget mb-40">
          <h2 class="single-sidebar-widget--title">Filters</h2>
          <form class="" id="my_form" action="{{URL::to('/filter_price')}}" method="post">
            @csrf
          <div class="sidebar-price">
            <div id="price-range"></div>
            <div class="output-wrapper mt-20">
              <input type="text" id="price-amount" class="price-amount" readonly style="width:200px">
              <input type="hidden" id="start-amount" name="Start" value="0">
              <input type="hidden" id="end-amount" name="End" value="30000000">
              <a class="price-range-button" onclick="document.getElementById('my_form').submit();"><i class="ion-android-funnel"></i> Lọc giá</a>
            </div>
          </div>
          </form>
        </div>

        <!--=======  End of single sidebar widget  =======-->

        <!--=======  single sidebar widget  =======-->

        <div class="single-sidebar-widget mb-40">
          <h2 class="single-sidebar-widget--title">Sản phẩm mua nhiều</h2>

          <!--=======  widget product wrapper  =======-->
          <div class="widget-product-wrapper">
            @foreach ($Popular as $key => $value)
            <!--=======  single widget product  =======-->
            <div class="single-widget-product-wrapper">
              <div class="single-widget-product">
                <!--=======  image  =======-->

                <div class="single-widget-product__image">
                  <a href="{{URL::to('/Detail-product_'.$value->ProductID.'')}}">
                    <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
                  </a>
                </div>

                <!--=======  End of image  =======-->

                <!--=======  content  =======-->

                <div class="single-widget-product__content">

                  <div class="single-widget-product__content__top">
                    <h3 class="product-title"><a href="{{URL::to('/Detail-product_'.$value->ProductID.'')}}">{{$value->ProductName}}</a></h3>
                    <div class="price">
                      <span class="discounted-price">{{number_format($value->ProductPrice)}} VNĐ</span>
                    </div>

                  </div>

                </div>

                <!--=======  End of content  =======-->
              </div>
            </div>
            @endforeach

            <!--=======  End of single widget product  =======-->
          </div>

          <!--=======  End of widget product wrapper  =======-->
        </div>

        <!--=======  End of single sidebar widget  =======-->

        <!--=======  single sidebar widget  =======-->

        <div class="single-sidebar-widget">
          <h2 class="single-sidebar-widget--title">Tags</h2>

          <div class="tag-container">
            <a href="#">bags</a>
            <a href="#">chair</a>
            <a href="#">clock</a>
            <a href="#">comestic</a>
            <a href="#">fashion</a>
            <a href="#">furniture</a>
            <a href="#">holder</a>
            <a href="#">mask</a>
            <a href="#">men</a>
            <a href="#">oil</a>
          </div>
        </div>

        <!--=======  End of single sidebar widget  =======-->
      </div>

      <!--=======  End of page sidebar  =======-->
    </div>

<!--=====  End of shop advance filter area  ======-->

<!--=============================================
=            shop page content         =
=============================================-->
@yield('shop_content')

</div>
</div>
</div>

<!--=====  End of shop page content  ======-->
</div>

@endsection
