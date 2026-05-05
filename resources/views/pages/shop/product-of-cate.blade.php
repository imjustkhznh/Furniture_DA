@extends('pages.shop')
@section('shop_content')
    <div class="col-xl-9 col-lg-9 order-1 order-lg-2 mb-md-80 mb-sm-80">
      <div class="row product-isotope shop-product-wrap four-column">



        <?php
          if (isset($product_of_Cate)){
            $Product_of = $product_of_Cate;
          }
          if (isset($pro_fil)){
            $Product_of = $pro_fil;
          }
          if (isset($product_of_Brand)){
            $Product_of = $product_of_Brand;
          }
          if (isset($search_resu)){
            $Product_of = $search_resu;
          }
          if (isset($product_tangdan)){
            $Product_of = $product_tangdan;
          }
          if (isset($product_giamdan)){
            $Product_of = $product_giamdan;
          }
        ?>
        @foreach ($Product_of as $key => $value)
        <!--=======  single product  =======-->
        <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot">
          <div class="single-product">
            <!--=======  single product image  =======-->

            <div class="single-product__image">
              <a class="image-wrap" href="{{URL::to('/Detail-product_'.$value->ProductID.'')}}">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
                <img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" class="img-fluid" alt="">
              </a>

              <div class="single-product__floating-icons">
                <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-android-favorite-outline"></i></a></span>
                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                      class="ion-ios-shuffle-strong"></i></a></span>
                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
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
                <a href="#">Thêm vào giỏ hàng</a>
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

              <div class="single-product__floating-badges">
                <span class="hot">hot</span>
              </div>

              <div class="single-product__floating-icons">
                <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-android-favorite-outline"></i></a></span>

                <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                    data-tippy-theme="sharpborder" data-tippy-placement="bottom"><i
                      class="ion-ios-shuffle-strong"></i></a></span>

                <span class="quickview"><a class="cd-trigger" href="#qv-1" data-tippy="Quick View"
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
              <p class="short-desc"> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium
                consequuntur voluptatem ad molestiae. Expedita nesciunt quam totam, sapiente eveniet consectetur
                voluptas quas harum impedit quia quibusdam tempora ab facilis. Non assumenda veritatis,
              </p>

              <a href="#" class="lezada-button lezada-button--medium">ADD TO CART</a>

            </div>

            <!--=======  End of single product content  =======-->
          </div>
        </div>
      @endforeach
      </div>
      <div class="row">
        <div class="col-lg-12 text-center mt-30">
          <a class="lezada-button lezada-button--medium lezada-button--icon--left" href="#"><i
              class="ion-android-add"></i> MORE</a>
        </div>
      </div>

    </div>
@endsection
