@extends('layout')
@section('content')
<div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="breadcrumb-title">Liên hệ</h1>

        <!--=======  breadcrumb list  =======-->

        <ul class="breadcrumb-list">
          <li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
          <li class="breadcrumb-list__item breadcrumb-list__item--active">Liên hệ</li>
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

<div class="section-title-container mb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!--=======  section title  =======-->

        <div class="section-title section-title--one text-center">

          <?php
          $ct= Session::get('contact');
          if (isset($ct)) {
            echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$ct.'</p>';
            Session::put('contact',null);
          }else {
            echo '<p class="subtitle subtitle--deep">Chào mừng quý khách</p>';
        } ?>
          <h1>Liên hệ với chúng tôi</h1>
        </div>

        <!--=======  End of section title  =======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of section title container ======-->


<!--=============================================
=            icon box area         =
=============================================-->

<div class="icon-box-area mb-100 mb-md-30 mb-sm-30">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-md-70 mb-sm-70">
        <!--=======  single icon box  =======-->

        <div class="single-icon-box">
          <div class="icon-box-icon">
            <i class="ion-location"></i>
          </div>
          <div class="icon-box-content">
            <h3 class="title">Địa chỉ</h3>
            <p class="content">Trường ĐH-CNTT và TT Việt Hàn</p>
          </div>
        </div>

        <!--=======  End of single icon box  =======-->
      </div>
      <div class="col-md-4 mb-md-70 mb-sm-70">
        <!--=======  single icon box  =======-->

        <div class="single-icon-box mb-10">
          <div class="icon-box-icon">
            <i class="ion-ios-telephone"></i>
          </div>
          <div class="icon-box-content">
            <h3 class="title">Liên hệ</h3>
            <p class="content">Mobile: 0705459542 <span>Hotline: 1900 1006</span></p>
          </div>
        </div>

        <div class="single-icon-box">
          <div class="icon-box-icon">
            <i class="ion-ios-email"></i>
          </div>
          <div class="icon-box-content">
            <p class="content"> Email: nsthien.19it4@vku.udn.vn </p>
          </div>
        </div>

        <!--=======  End of single icon box  =======-->
      </div>
      <div class="col-md-4 mb-md-70 mb-sm-70">
        <!--=======  single icon box  =======-->

        <div class="single-icon-box">
          <div class="icon-box-icon">
            <i class="ion-ios-clock-outline"></i>
          </div>
          <div class="icon-box-content">
            <h3 class="title">Giờ mở của</h3>
            <p class="content">Thứ 2 - Thứ 6 : 06:00 – 19:00<span>Thứ 7 - Chủ nhật: 10:30 – 18:00</span></p>
          </div>
        </div>

        <!--=======  End of single icon box  =======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of icon box area  ======-->

<!--=============================================
=            box layout map         =
=============================================-->

<div class="box-layout-map-area mb-100">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!--=======  box layout map container  =======-->

        <div class="box-layout-map-container">
          <div class="google-map" id="google-map-one"></div>
        </div>

        <!--=======  End of box layout map container  =======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of box layout map  ======-->

<!--=============================================
=            section title  container      =
=============================================-->

<div class="section-title-container mb-50">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!--=======  section title  =======-->

        <div class="section-title section-title--one text-center">
          <h1>Liên lạc</h1>
        </div>

        <!--=======  End of section title  =======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of section title container ======-->


<!--=============================================
=            contact form area         =
=============================================-->

<div class="contact-form-area mb-60">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="lezada-form contact-form">
          <form id="contact-form" action="{{URL::to('/contact-mail')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-6 mb-40">
                <input type="text" placeholder="Name *" name="customerName" id="customername" required>
              </div>
              <div class="col-md-6 mb-40">
                <input type="email" placeholder="Email *" name="customerEmail" id="customerEmail" required>
              </div>
              <div class="col-lg-12 mb-40">
                <input type="text" placeholder="Subject" name="contactSubject" id="contactSubject">
              </div>
              <div class="col-lg-12 mb-40">
                <textarea cols="30" rows="10" placeholder="Message" name="contactMessage"
                  id="contactMessage"></textarea>
              </div>
              <div class="col-lg-12 text-center">
                <button type="submit" value="submit" id="submit"
                  class="lezada-button lezada-button--medium">Gửi</button>
              </div>
            </div>
          </form>
        </div>
        <p class="form-messege pt-10 pb-10 mt-10 mb-10"></p>
      </div>
    </div>
  </div>
</div>
@endsection
