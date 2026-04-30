@extends('pages.shop')
@section('shop_content')
    <div class="col-xl-9 col-lg-9 order-1 order-lg-2 mb-md-80 mb-sm-80">

      <div class="row product-isotope shop-product-wrap four-column">




        @foreach ($hot_product as $key => $value)
        <!--=======  single product  =======-->
        <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot">
          <div class="single-product">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
              <a class="image-wrap" href="{{URL::to('/Detail-product_'.$value->ProductID.'')}}">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" class="img-fluid" alt="">
              </a>

              <div class="single-product__floating-badges">
                <span class="hot">Hot</span>
              </div>

              <div class="single-product__floating-icons">
                <span class="wishlist"><a href="{{URL::to('/add-wishlist_id='.$value->ProductID.'')}}" data-tippy="Thêm vào yêu thích" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-android-favorite-outline"></i></a></span>
                <span class="compare"><a href="{{URL::to('/add-to-compare_id='.$value->ProductID.'')}}" data-tippy="So sánh" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-ios-shuffle-strong"></i></a></span>
                <span class="quickview"><a class="cd-trigger" href="#qv-{{$value->ProductID}}" data-tippy="Xem nhanh"
                    data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                    data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-ios-search-strong"></i></a></span>
              </div>
            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">
              <div class="title">
                <h3> <a href="shop-product-basic.html">{{$value->ProductName}}</a></h3>
                <a href="{{URL::to('/add-cart-home/id='.$value->ProductID.'')}}">Thêm vào giỏ hàng</a>
              </div>
              <div class="price">
                <span class="discounted-price">{{number_format($value->ProductPrice,2)}} VNĐ</span>
              </div>
            </div>

            <!--=======  End of single product content  =======-->
          </div>
          <div class="single-product--list">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
              <a class="image-wrap" href="shop-product-basic.html">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" class="img-fluid" alt="">
              </a>



              <div class="single-product__floating-icons">
                <span class="wishlist"><a href="{{URL::to('/add-wishlist_id='.$value->ProductID.'')}}" data-tippy="Thêm vào yêu thích" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-android-favorite-outline"></i></a></span>

                <span class="compare"><a href="{{URL::to('/add-to-compare_id='.$value->ProductID.'')}}" data-tippy="So sánh" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-ios-shuffle-strong"></i></a></span>

                <span class="quickview"><a class="cd-trigger" href="#qv-{{$value->ProductID}}" data-tippy="Xem nhanh"
                    data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                    data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-ios-search-strong"></i></a></span>
              </div>



            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">

              <div class="title">
                <h3> <a href="shop-product-basic.html">{{$value->ProductName}}</a></h3>
              </div>
              <div class="price">
                <span class="discounted-price">{{number_format($value->ProductPrice,2)}} VNĐ</span>
              </div>
              <p class="short-desc"> {{$value->ProductContent}}
              </p>

              <a href="{{URL::to('/add-cart-home/id='.$value->ProductID.'')}}" class="lezada-button lezada-button--medium">THÊM VÀO GIỎ HÀNG</a>

            </div>

            <!--=======  End of single product content  =======-->
          </div>
        </div>
      @endforeach







        <!--=======  End of single product  =======-->
        @foreach ($new_product as $key => $value)
        <!--=======  single product  =======-->
        <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 new">
          <div class="single-product">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
              <a class="image-wrap" href="{{URL::to('/Detail-product_'.$value->ProductID.'')}}">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" class="img-fluid" alt="">
              </a>

              <div class="single-product__floating-badges">
                <span class="onsale">New</span>
              </div>

              <div class="single-product__floating-icons">
                <span class="wishlist"><a href="{{URL::to('/add-wishlist_id='.$value->ProductID.'')}}" data-tippy="Thêm vào yêu thích" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-android-favorite-outline"></i></a></span>
                <span class="compare"><a href="{{URL::to('/add-to-compare_id='.$value->ProductID.'')}}" data-tippy="So sánh" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-ios-shuffle-strong"></i></a></span>
                <span class="quickview"><a class="cd-trigger" href="#qv-{{$value->ProductID}}" data-tippy="Xem nhanh"
                    data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                    data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-ios-search-strong"></i></a></span>
              </div>
            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">
              <div class="title">
                <h3> <a href="shop-product-basic.html">{{$value->ProductName}}</a></h3>
                <a href="{{URL::to('/add-cart-home/id='.$value->ProductID.'')}}">Thêm vào giỏ hàng</a>
              </div>
              <div class="price">
                <span class="discounted-price">{{number_format($value->ProductPrice,2)}} VNĐ</span>
              </div>
            </div>

            <!--=======  End of single product content  =======-->
          </div>


          <div class="single-product--list">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
              <a class="image-wrap" href="shop-product-basic.html">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" class="img-fluid" alt="">
              </a>



              <div class="single-product__floating-icons">
                <span class="wishlist"><a href="{{URL::to('/add-wishlist_id='.$value->ProductID.'')}}" data-tippy="Thêm vào yêu thích" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-android-favorite-outline"></i></a></span>

                <span class="compare"><a href="{{URL::to('/add-to-compare_id='.$value->ProductID.'')}}" data-tippy="So sánh" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-ios-shuffle-strong"></i></a></span>

                <span class="quickview"><a class="cd-trigger" href="#qv-{{$value->ProductID}}" data-tippy="Xam nhanh"
                    data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                    data-tippy-arrow="true" data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-ios-search-strong"></i></a></span>
              </div>



            </div>

            <!--=======  End of single product image  =======-->

            <!--=======  single product content  =======-->

            <div class="single-product__content">

              <div class="title">
                <h3> <a href="shop-product-basic.html">{{$value->ProductName}}</a></h3>
              </div>
              <div class="price">
                <span class="discounted-price">{{number_format($value->ProductPrice,2)}} VNĐ</span>
              </div>
              <p class="short-desc"> {{$value->ProductContent}}
              </p>

              <a href="{{URL::to('/add-cart-home/id='.$value->ProductID.'')}}" class="lezada-button lezada-button--medium">THÊM VÀO GIỎ HÀNG</a>

            </div>

            <!--=======  End of single product content  =======-->
          </div>
        </div>
        @endforeach










        <!--=======  End of single product  =======-->


      </div>

      <div class="row">
        <div class="col-lg-12 text-center mt-30">
          <a class="lezada-button lezada-button--medium lezada-button--icon--left" href="#"><i
              class="ion-android-add"></i>Xem thêm</a>
        </div>
      </div>

    </div>
@endsection
