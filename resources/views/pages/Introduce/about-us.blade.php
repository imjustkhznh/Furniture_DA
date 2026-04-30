@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-2 pt-50 pb-70 mb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Giới thiệu</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">Giới thiệu</li>
        </ul>

        <!--=======  End of breadcrumb list  =======-->

      </div>
    </div>
  </div>
</div>

<!--=======  End of breadcrumb area =======-->


<!--=============================================
=            section title  container      =
=============================================-->

<div class="section-title-container mb-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <!--=======  section title  =======-->

        <div class="section-title section-title--one text-center">

          <h1>Tổng quan</h1>
          <p class="subtitle subtitle--deep mb-0">FURNI-ORANGE</p>
        </div>

        <!--=======  End of section title  =======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of section title container ======-->

<!--=============================================
  =            about us page content         =
  =============================================-->

<div class="about-page-content mb-100 mb-sm-45">
  <div class="container wide">

    <div class="row">

      <div class="col-lg-6 mb-md-50 mb-sm-50">
        <!--=======  about page 2 image  =======-->

        <div class="about-page-2-image">
          <img src="{{ asset('frontend/images/image-about-us.jpg') }}" class="img-fluid" alt="">
        </div>

        <!--=======  End of about page 2 image  =======-->
      </div>

      <div class="offset-xl-1 col-xl-4 col-lg-6 col-md-6 mb-sm-50">

        <div class="about-page-text">
          <p class=" mb-35">Với sự phát triển không ngừng đến nay công ty CP quảng cáo và trang trí nội thất ORANGE mới có gần 1 năm trên thị trường thiết kế nội thất.
            Các sản phẩm về nội thất của shop đã bắt đầu được biết đến và tin tưởng tại thị trường trong nước.
            Lần ra mắt thương hiệu này nằm trong chiến lược phát triển mới giai đoạn 2019 – 2021, nhằm đưa ORANGE trở thành một trong những
             thương hiệu hàng đầu Việt Nam và đánh dấu cho những bước tiến mới sang thị trường nước ngoài.
            </p>
        </div>

        <div class="lezada-widget lezada-widget--about mb-35">
          <h2 class="widget-title mb-25">Địa chỉ</h2>
          <p class="widget-content">Trường ĐH-CNTT và TT Việt Hàn</p>
        </div>

        <div class="lezada-widget lezada-widget--about mb-35">
          <h2 class="widget-title mb-25">Số điện thoại</h2>
          <p class="widget-content">Mobile: 0705459542</p>
          <p class="widget-content">Hotline: 1900 1006</p>
        </div>

        <div class="lezada-widget lezada-widget--about">
          <h2 class="widget-title mb-25">Email</h2>
          <p class="widget-content">nsthien.19it4@vku.udn.vn</p>
        </div>

      </div>
    </div>
  </div>
</div>

<!--=====  End of about us page content  ======-->


<!--=============================================
=            instagram slider area         =
=============================================-->

<div class="instagram-slider-area mb-100">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 order-1 ">
        <!--=======  instagram intro  =======-->

        <div
          class="instagram-section-intro pl-50 pl-lg-50 pl-md-0 pl-sm-0 pl-xs-0 pl-xxs-0 mb-0 mb-lg-0 mb-md-50 mb-sm-50 mb-xs-50 mb-xxs-50">
          <p><a href="#">@Orange-Furni</a></p>
          <h3>Theo dõi chúng tôi </h3>
        </div>

        <!--=======  End of instagram intro  =======-->
      </div>
      <div class="col-lg-8 order-2">
        <!--=============================================
                  =            instagram image slider         =
                  =============================================-->

        <div class="instagram-image-slider-area">
          <!--=======  instagram image container  =======-->

          <div class="instagram-image-slider-container">
            <div class="instagram-feed-thumb">
              <div id="instagramFeedThree" class="instagram-carousel">
              </div>
            </div>
          </div>

          <!--=======  End of instagram image container  =======-->
        </div>

        <!--=====  End of instagram image slider  ======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of instagram slider area  ======-->


<!--=============================================
  =            about us video content         =
  =============================================-->

<div class="about-video-content mb-45">
  <div class="container wide">
    <div class="row">
      <div class="col-lg-12">
        <!--=======  about video area  =======-->

        <div
          class="about-video-bg-area about-video-bg-1 pt-300 pb-300 pt-sm-200 pb-sm-200  pt-xs-150 pb-xs-150  mb-50">


          <!--=======  End of floating-text left  =======-->
          <div class="play-icon text-center mb-40">
            <a href="https://www.youtube.com/watch?v=7SreWE8CCwc" class="popup-video">
              <img src="{{ asset('frontend/images/icons/icon-play-100x100.png') }}" class="img-fluid" alt="">
            </a>
          </div>
          <h1>OUR STORY</h1>

        </div>

        <!--=======  End of about video area  =======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of about us video content  ======-->

<!--=============================================
  =            about two page content         =
  =============================================-->

<div class="about-page-content mb-100">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-6 mb-sm-50">
        <!--=======  about single block  =======-->

        <div class="about-single-block">
          <p class="subtitle">Khi mua với trên 900.000 VNĐ</p>
          <h1>Miễn phí vận chuyển</h1>
          <p>Miễn phí vận chuyển khi mua hàng trên 900.000đ tại Furni-Orange và còn nhiều ưu đãi khác.</p>
          <a href="#">Xem thêm</a>
        </div>

        <!--=======  End of about single block  =======-->
      </div>
      <div class="col-12 col-md-6">
        <!--=======  about single block  =======-->

        <div class="about-single-block">
          <p class="subtitle">Hỗ trợ 24/7</p>
          <h1>Hoàn tiền</h1>
          <p>Hỗ trợ 24/7 cho khách hàng và có dịch vụ hoàn tiền khi trả hàng trong vòng 10 ngày.</p>
          <a href="#">Xem thêm</a>
        </div>

        <!--=======  End of about single block  =======-->
      </div>
    </div>
  </div>
</div>
@endsection
