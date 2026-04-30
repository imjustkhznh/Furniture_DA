@extends('layout')
@section('content')
@foreach ($product as $key => $value)
	<div class="breadcrumb-area breadcrumb-bg-2 pt-50 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Shop</h1>
					<!--=======  breadcrumb list  =======-->
					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
						<li class="breadcrumb-list__item"><a href="shop-left-sidebar.html">SHOP</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">{{$value->ProductName}}</li>
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

	<div class="shop-page-wrapper mt-100 mb-100">
		<div class="container">
			<?php
			$message = Session::get('message');
			if (isset($message)) {
				echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$message.'</p>';
				Session::put('message',null);
			}else {
				echo '<p class="text-muted mb-4 mt-3">.</p>';
		} ?>
			<div class="row">
				<div class="col-lg-12">
					<!--=======  shop product content  =======-->

					<div class="shop-product">
						<div class="row pb-100">
							<div class="col-lg-6 mb-md-70 mb-sm-70">
								<!--=======  shop product big image gallery  =======-->

								<div class="shop-product__big-image-gallery-wrapper mb-30">

									<!--=======  shop product gallery icons  =======-->
									<div class="single-product__floating-badges single-product__floating-badges--shop-product">
										<span class="hot">Star</span>
									</div>


									<div class="shop-product-rightside-icons">
										<span class="wishlist-icon">
											<a href="{{URL::to('/add-wishlist_id='.$value->ProductID.'')}}" data-tippy="Thêm vào yêu thích" data-tippy-placement="left" data-tippy-inertia="true"
												data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
												data-tippy-theme="sharpborder"><i class="ion-android-favorite-outline"></i></a>
										</span>
										<span class="enlarge-icon">
											<a class="btn-zoom-popup" href="#" data-tippy="Click to enlarge" data-tippy-placement="left"
												data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
												data-tippy-arrow="true" data-tippy-theme="sharpborder"><i class="ion-android-expand"></i></a>
										</span>
									</div>

									<!--=======  End of shop product gallery icons  =======-->

									<div class="shop-product__big-image-gallery-sticky">

										<!--=======  single image  =======-->

										<div class="single-image mb-10">
											<img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
										</div>

										<!--=======  End of single image  =======-->

										<!--=======  single image  =======-->

										<div class="single-image mb-10">
											<img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" class="img-fluid" alt="">
										</div>

										<!--=======  End of single image  =======-->

										<!--=======  single image  =======-->

										<div class="single-image mb-10">
											<img src="{{ asset('Upload/Product/'.($value->ProductImage3 && file_exists(public_path('Upload/Product/'.$value->ProductImage3)) ? $value->ProductImage3 : 'no-image.svg')) }}" class="img-fluid" alt="">
										</div>

										<!--=======  End of single image  =======-->

										<!--=======  single image  =======-->
										<!--=======  End of single image  =======-->
									</div>

								</div>

								<!--=======  End of shop product big image gallery  =======-->

							</div>

							<div class="col-lg-6">
								<!--=======  shop product description  =======-->

								<div class="shop-product__description sidebar-sticky">
									<!--=======  shop product navigation  =======-->

									<div class="shop-product__navigation">
										<a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-left"></i></a>
										<a href="shop-product-basic.html"><i class="ion-ios-arrow-thin-right"></i></a>
									</div>

									<!--=======  End of shop product navigation  =======-->

									<!--=======  shop product rating  =======-->

									<div class="shop-product__rating mb-15">
										<span class="product-rating">
											@if ($Rating)
												@php
													$sao = (int)$Rating;
												@endphp
											@for ($i=1; $i<=$sao; $i++)
												<i class="active ion-android-star"></i>
											@endfor
											@else
												<i class="active ion-android-star"></i>
												<i class="active ion-android-star"></i>
												<i class="active ion-android-star"></i>
												<i class="active ion-android-star"></i>
												<i class="active ion-android-star"></i>
											@endif
										</span>

										<span class="review-link ml-20">
											<a href="#">Review</a>
										</span>
									</div>

									<!--=======  End of shop product rating  =======-->

									<!--=======  shop product title  =======-->

									<div class="shop-product__title mb-15">
										<h2>{{$value->ProductName}}</h2>
									</div>

									<!--=======  End of shop product title  =======-->

									<!--=======  shop product price  =======-->

									<div class="shop-product__price mb-30">
										<span class="discounted-price">{{number_format($value->ProductPrice,2)}} VNĐ</span>
									</div>

									<!--=======  End of shop product price  =======-->

									<!--=======  shop product short description  =======-->

									<div class="shop-product__short-desc mb-50">
										{{$value->ProductContent}}
									</div>

									<!--=======  End of shop product short description  =======-->

									<!--=======  shop product size block  =======-->
                  <form class="" action="{{URL::to('/add-to-cart')}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="ProID" value="{{$value->ProductID}}">
									<div class="shop-product__block shop-product__block--size mb-20">
										<div class="shop-product__block__title">Kích thước: </div>
										<div class="shop-product__block__value">
											<div class="shop-product-size-list">
                        <label for="size" class="single-size-active">250x280
                        <input type="hidden" value="{{$value->ProductSize}}" id="" name="ProSize"/>
                        </label>

											</div>
										</div>
									</div>

									<!--=======  End of shop product size block  =======-->

									<!--=======  shop product color block  =======-->

									<div class="shop-product__block shop-product__block--color mb-20">
										<div class="shop-product__block__title">Màu sắc: </div>
                    <input type="hidden" name="ProColor" value="{{$value->ProductColor}}">
										<div class="shop-product__block__value">
											<div class="shop-product-color-list">
                        <ul class="single-filter-widget--list single-filter-widget--list--color">
                            <li class="mb-0 pt-0 pb-0 mr-10"><a href="" class="active" data-tippy="{{$value->ProductColor}}" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder"><span >{{$value->ProductColor}}</span></a></li>
                          </ul>
											</div>
										</div>
									</div>

									<!--=======  End of shop product color block  =======-->

									<!--=======  shop product quantity block  =======-->

									<div class="shop-product__block shop-product__block--quantity mb-40">
										<div class="shop-product__block__title">Số lượng: </div>
										<div class="shop-product__block__value">
											<div class="pro-qty d-inline-block mx-0 pt-0">
												<input type="text" name="Quanty" value="1" min="1">
											</div>
										</div>
									</div>

									<!--=======  End of shop product quantity block  =======-->

									<!--=======  shop product buttons  =======-->

									<div class="shop-product__buttons mb-40">
										<button class="lezada-button lezada-button--medium" type="submit" >Thêm vào giỏ hàng</button>
										<a class="lezada-compare-button ml-20" href="{{URL::to('/add-to-compare_id='.$value->ProductID.'')}}" data-tippy="Compare" data-tippy-inertia="true"
											data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-placement="left"
											data-tippy-arrow="true" data-tippy-theme="sharpborder"><i class="ion-ios-shuffle"></i></a>
									</div>
              </form>

									<!--=======  End of shop product buttons  =======-->

									<!--=======  other info table  =======-->

									<div class="quick-view-other-info pb-0">
										<table>
											<tr class="single-info">
												<td class="quickview-title">SKU: </td>
												<td class="quickview-value">PD{{$value->ProductID}}</td>
											</tr>
											<tr class="single-info">
												<td class="quickview-title">Loại sản phẩm: </td>
												<td class="quickview-value">
													<a href="#">{{$value->CategoryName}}</a>,
												</td>
											</tr>
											<tr class="single-info">
												<td class="quickview-title">Thương hiệu: </td>
												<td class="quickview-value">
													<a href="#">{{$value->BrandName}}</a>
												</td>
											</tr>
											<tr class="single-info">
												<td class="quickview-title">Share on: </td>
												<td class="quickview-value">
													<ul class="quickview-social-icons">
														<li><a href="#"><i class="fa fa-facebook"></i></a></li>
														<li><a href="#"><i class="fa fa-twitter"></i></a></li>
														<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
														<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
													</ul>
												</td>
											</tr>
										</table>
									</div>

									<!--=======  End of other info table  =======-->
								</div>

								<!--=======  End of shop product description  =======-->
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<!--=======  shop product description tab  =======-->

								<div class="shop-product__description-tab pt-100">
									<!--=======  tab navigation  =======-->

									<div class="tab-product-navigation tab-product-navigation--product-desc mb-50">
										<div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
											<a class="nav-item nav-link active" id="product-tab-1" data-toggle="tab" href="#product-series-1"
												role="tab" aria-selected="true">Mô tả chi tiết</a>
											<a class="nav-item nav-link" id="product-tab-2" data-toggle="tab" href="#product-series-2"
												role="tab" aria-selected="false">Thông tin sản phẩm</a>
											<a class="nav-item nav-link" id="product-tab-3" data-toggle="tab" href="#product-series-3"
												role="tab" aria-selected="false">Đánh giá</a>
										</div>
									</div>

									<!--=======  End of tab navigation  =======-->

									<!--=======  tab content  =======-->

									<div class="tab-content" id="nav-tabContent2">

										<div class="tab-pane fade show active" id="product-series-1" role="tabpanel"
											aria-labelledby="product-tab-1">
											<!--=======  shop product long description  =======-->

											<div class="shop-product__long-desc mb-30">
												<p>{!!$value->ProductDescrip!!}.</p>
											</div>

											<!--=======  End of shop product long description  =======-->
										</div>

										<div class="tab-pane fade" id="product-series-2" role="tabpanel" aria-labelledby="product-tab-2">
											<!--=======  shop product additional information  =======-->

											<div class="shop-product__additional-info">
												<table class="shop-attributes">
													<tbody>
														<tr>
															<th>Kích thước</th>
															<td>
																<p>250x280</p>
															</td>
														</tr>
														<tr>
															<th>Màu sắc</th>
															<td>
																<p>{{$value->ProductColor}}</p>
															</td>
														</tr>
													</tbody>
												</table>
											</div>

											<!--=======  End of shop product additional information  =======-->
										</div>


										<div class="tab-pane fade" id="product-series-3" role="tabpanel" aria-labelledby="product-tab-3">
											<!--=======  shop product reviews  =======-->

											<div class="shop-product__review">
												<h2 class="review-title mb-20">3 Đánh giá cho {{$value->ProductName}}</h2>

												<!--=======  single review  =======-->
												@if (isset($comment))
												@foreach ($comment as $key => $com)
												<div class="single-review">
													<div class="single-review__image">
														<img src="{{ asset('frontend/images/user.png') }}" class="img-fluid" alt="">
													</div>
													<div class="single-review__content">
														<!--=======  rating  =======-->

														<div class="shop-product__rating">
															<span class="product-rating">

																@for ($i=1; $i <= $com->Rating; $i++)
																	<i class="active ion-android-star"></i>
																@endfor

															</span>
														</div>

														<!--=======  End of rating  =======-->

														<!--=======  username and date  =======-->

														<p class="username">{{$com->CommentName}} <span class="date">/ {{$com->CommentDate}}</span></p>

														<!--=======  End of username and date  =======-->

														<!--=======  message  =======-->

														<p class="message">
															{!!$com->CommentDetail!!}
														</p>

														<!--=======  End of message  =======-->
													</div>
												</div>
												@endforeach
												@endif

												<!--=======  End of single review  =======-->
												<h2 class="review-title mb-20">Thêm bình luận</h2>
												<p class="text-center">Nhập tên và email của bạn để viết bình luận
												</p>

												<!--=======  review form  =======-->

												<div class="lezada-form lezada-form--review">
													@foreach ($Customer as $key => $valueCs)
													<form action="{{URL::to('/comment')}}" method="post">
														@csrf
														<input type="hidden" name="ProID" value="{{$value->ProductID}}">
														<div class="row">
															<div class="col-lg-6 mb-20">
																<input type="text" name="CommentName" value="{{$valueCs->CustomerFirstName.' '.$valueCs->CustomerName}}" placeholder="Tên của bạn *" readonly required>
															</div>
															<div class="col-lg-6 mb-20">
																<input type="email" name="CommentEmail" placeholder="Email *" value="{{$valueCs->CustomerEmail}}" readonly required>
															</div>
															<div class="col-lg-12 mb-20">
																<span class="rating-title mr-30">Đánh giá của bạn</span>
																<span class="product-rating">
															  <fieldset class="starability-slot">
															    <input type="radio" id="rate5" name="rating" value="1" />
															    <label for="rate5" title="Tệ">1 stars</label>

															    <input type="radio" id="rate4" name="rating" value="2" />
															    <label for="rate4" title="Xấu">2 stars</label>

															    <input type="radio" id="rate3" name="rating" value="3" />
															    <label for="rate3" title="Bình thường">3 stars</label>

															    <input type="radio" id="rate2" name="rating" value="4" />
															    <label for="rate2" title="Chưa tốt">4 stars</label>

															    <input type="radio" id="rate1" name="rating" value="5" />
															    <label for="rate1" title="Rất tuyệt">5 star</label>
															  </fieldset>
																</span>
															</div>
															<div class="col-lg-12 mb-20">
																<textarea cols="30" rows="5" name="Comment" placeholder="Bình luận của bạn *"></textarea>
															</div>
															<div class="col-lg-12 text-center">
																<button type="submit" class="lezada-button lezada-button--medium">Đánh giá</button>
															</div>
														</div>
													</form>
												@endforeach
												</div>

												<!--=======  End of review form  =======-->


											</div>

											<!--=======  End of shop product reviews  =======-->
										</div>

									</div>

									<!--=======  End of tab content  =======-->
								</div>

								<!--=======  End of shop product description tab  =======-->
							</div>
						</div>
					</div>

					<!--=======  End of shop product content  =======-->
				</div>
			</div>
		</div>
	</div>

@endforeach

<div class="section-title-container mb-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!--=======  section title  =======-->

        <div class="section-title section-title--one text-center">
          <h1>Sản phẩm liên quan</h1>
          <p>Dưới đây là những sản phẩm tương tự.</p>
        </div>

        <!--=======  End of section title  =======-->
      </div>
    </div>
  </div>
</div>

<!--=====  End of section title container ======-->

<!--=============================================
  =            product carousel container         =
  =============================================-->

<div class="product-carousel-container mb-70">
  <div class="container">
    <div class="row">
      <!--=======  single product  =======-->
      @foreach ($product_recen as $key => $value)
      <!--=======  single product  =======-->
      <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
        <div class="single-product">
          <!--=======  single product image  =======-->

          <div class="single-product__image">
            <a class="image-wrap" href="{{URL::to('/Detail-product_'.$value->ProductID.'')}}">
              <img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" class="img-fluid" alt="">
              <img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" class="img-fluid" alt="">
            </a>

            <div class="single-product__floating-badges">
            </div>

            <div class="single-product__floating-icons">
              <span class="wishlist"><a href="#" data-tippy="Add to wishlist" data-tippy-inertia="true"
                  data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                  data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                    class="ion-android-favorite-outline"></i></a></span>
              <span class="compare"><a href="#" data-tippy="Compare" data-tippy-inertia="true"
                  data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                  data-tippy-theme="sharpborder" data-tippy-placement="left"><i
                    class="ion-ios-shuffle-strong"></i></a></span>
              <span class="quickview"><a class="cd-trigger" href="#qv-{{$value->ProductID}}" data-tippy="Quick View"
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
              <span class="discounted-price">{{number_format($value->ProductPrice,0)}} VNĐ</span>
            </div>
          </div>

          <!--=======  End of single product content  =======-->
        </div>
      </div>
      @endforeach
      <!--=======  End of single product  =======-->
    </div>

    <div class="row">
      <div class="col-lg-12 text-center mb-25 mt-30">
        <a class="lezada-loadmore-button" href="#"><i class="ion-ios-plus-empty"></i> LOAD MORE ...</a>
      </div>
    </div>
  </div>
</div>

<!--=====  End of product carousel container  ======-->



	<!--=====  End of shop page content  ======-->
@endsection
