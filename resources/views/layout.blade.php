<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Shop Nội Thất Furni-Orange</title>
	{{-- Seo --}}
	{{-- <meta name="description" content="{{$meta_descrip}}">
	 <meta name="keywords" content="{{$meta_keyword}}"/>
	 <meta name="robots" content="INDEX,FOLLOW"/>
	 <link  rel="canonical" href="{{$url_cano}}" />
	 <meta name="author" content=""> --}}
	 <link  rel="icon" type="image/x-icon" href="" />
	 {{-- Seo end --}}

	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Favicon -->

	<!-- CSS
	============================================ -->
	<!-- Bootstrap CSS -->
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">

	<link href="{{asset('frontend/css/satabli.min.css')}}" rel="stylesheet">

	<!-- FontAwesome CSS -->
	<link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">

	<!-- Ionicons CSS -->
	<link href="{{asset('frontend/css/ionicons.min.css')}}" rel="stylesheet">

	<!-- Themify CSS -->
	<link href="{{asset('frontend/css/themify-icons.css')}}" rel="stylesheet">

	<!-- Plugins CSS -->
	<link href="{{asset('frontend/css/plugins.css')}}" rel="stylesheet">

	<!-- Helper CSS -->
	<link href="{{asset('frontend/css/helper.css')}}" rel="stylesheet">

	<link href="{{asset('frontend/css/sweetalert2.min.css')}}" rel="stylesheet">

	<!-- Main CSS -->
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">



	<!-- Revolution Slider CSS -->
	<link href="{{asset('frontend/revolution/css/settings.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/revolution/css/navigation.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/revolution/custom-setting.css')}}" rel="stylesheet">

	<!-- Modernizer JS -->
	<script src="{{asset('frontend/js/vendor/modernizr-2.8.3.min.js')}}"></script>

</head>

<body>


	<!--=============================================
	=            Header without topbar         =
	=============================================-->

	<header class="header header-without-topbar header-sticky">

		<!--=======  header bottom  =======-->

		<div class="header-bottom pt-md-40 pb-md-40 pt-sm-40 pb-sm-40">
			<div class="container wide">


				<!--=======  header bottom container  =======-->

				<div class="header-bottom-container">

					<!--=======  logo with off canvas  =======-->

					<div class="logo-with-offcanvas d-flex">



						<!--=======  logo   =======-->

						<div class="logo">
							<a href="index.html">
								<img src="{{asset('frontend/images/logo_furni.png')}}" style="width:50%" class="img-fluid" alt="">
							</a>
						</div>

						<!--=======  End of logo   =======-->
					</div>

					<!--=======  End of logo with off canvas  =======-->

					<!--=======  header bottom navigation  =======-->

					<div class="header-bottom-navigation">
						<div class="site-main-nav d-none d-lg-block">
							<nav class="site-nav center-menu">
								<ul>
									<li class="menu-item-has-children"><a href="{{URL::to('/home')}}">Trang chủ</a>	</li>
									<li class="menu-item-has-children"><a href="{{URL::to('/shop')}}">Shop</a></li>
									<li class="menu-item-has-children"><a href="{{URL::to('/compare')}}">So sánh</a></li>
									<li class="menu-item-has-children"><a href="{{URL::to('/about')}}">Giới thiệu</a></li>
									<li class="menu-item-has-children"><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
									<li class="menu-item-has-children "><a href="{{URL::to('/track-ID')}}">Kiểm đơn</a></li>
								</ul>
							</nav>
						</div>
					</div>

					<!--=======  End of header bottom navigation  =======-->

					<!--=======  headeer right container  =======-->

					<div class="header-right-container">

						<!--=======  header right icons  =======-->

						<div class="header-right-icons d-flex justify-content-end align-items-center h-100">
							<!--=======  single-icon  =======-->

							<div class="single-icon search">
								<a href="javascript:void(0)" id="search-icon">
									<i class="ion-ios-search-strong"></i>
								</a>
							</div>

							<!--=======  End of single-icon  =======-->
							<!--=======  single-icon  =======-->

							<div class="single-icon user-login">
									<?php
									$name = Session::get('CustomerName');
									?>
									<?php if(isset($name)==false){ ?>
									<a href="{{URL::to('/check-login')}}">
									<i class="ion-android-person"></i></a>
									<?php	} ?>
									<?php if(isset($name)){ ?>
									<a href="{{URL::to('/my-account')}}">
									<i class="ion-android-person"></i></a>
									<?php	} ?>
							</div>

							<!--=======  End of single-icon  =======-->
							<!--=======  single-icon  =======-->

							<div class="single-icon wishlist">
								<a href="javascript:void(0)" id="offcanvas-wishlist-icon">
									<i class="ion-android-favorite-outline"></i>
									@php
										$a = 0;
										if (Session::get('Wishlist')) {
										$b = Session::get('Wishlist');
										$c = count($b);
									}else {
										$c = -1;
									}
									@endphp
									@for ($i=1; $i <= $c; $i++)
										@php
											$a = $i;
										@endphp
									@endfor
									<span class="count"><?=$a?></span>
								</a>
							</div>

							<!--=======  End of single-icon  =======-->
							<!--=======  single-icon  =======-->

							<div class="single-icon cart">
								<a href="javascript:void(0)" id="offcanvas-cart-icon">
									<i class="ion-ios-cart"></i>
									@php
										$x = Cart::getContent();
										$z = count($x);
									@endphp
									<span class="count"><?=$z?></span>
								</a>
							</div>
							<!--=======  End of single-icon  =======-->
						</div>
						<!--=======  End of header right icons  =======-->

					</div>

					<!--=======  End of headeer right container  =======-->


				</div>

				<!--=======  End of header bottom container  =======-->

				<!-- Mobile Navigation Start Here -->

				<div class="site-mobile-navigation d-block d-lg-none">
					<div id="dl-menu" class="dl-menuwrapper site-mobile-nav">
						<!--Site Mobile Menu Toggle Start-->
						<button class="dl-trigger hamburger hamburger--spin">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
						<!--Site Mobile Menu Toggle End-->
						<ul class="dl-menu dl-menu-toggle">
							<li class="menu-item-has-children"><a href="{{URL::to('/home')}}">Trang chủ</a>	</li>
							<li class="menu-item-has-children"><a href="{{URL::to('/shop')}}">Shop</a></li>
							<li class="menu-item-has-children"><a href="{{URL::to('/compare')}}">So sánh</a></li>
							<li class="menu-item-has-children"><a href="{{URL::to('/about')}}">Giới thiệu</a></li>
							<li class="menu-item-has-children"><a href="{{URL::to('/contact')}}">Liên hệ</a></li>
							<li class="menu-item-has-children "><a href="{{URL::to('/track-ID')}}">Kiểm đơn</a></li>
						</ul>
					</div>
				</div>

				<!-- Mobile Navigation End Here -->


			</div>
		</div>

		<!--=======  End of header bottom  =======-->
	</header>

	<!--===== End of Header without topbar ======-->
<!--Hrew-->
@yield('content')
	<!--=====  End of cabinet rev slider area  ======-->

	<!--=============================================
	=            footer area         =
	=============================================-->

	<div class="footer-container footer-one pt-100 pb-50">
		<div class="container wide">
			<div class="row">
				<div class="col footer-single-widget">
					<!--=======  copyright text  =======-->
					<!--=======  logo  =======-->

					<div class="logo">
						<img src="{{asset('frontend/images/logo_furni.png')}}" class="img-fluid" alt="">
					</div>

					<!--=======  End of logo  =======-->

					<!--=======  copyright text  =======-->



					<!--=======  End of copyright text  =======-->

					<!--=======  End of copyright text  =======-->
				</div>
				<div class="col footer-single-widget">
					<!--=======  single widget  =======-->
					<h5 class="widget-title">Liên kết</h5>

					<!--=======  footer navigation container  =======-->

					<div class="footer-nav-container">
						<nav>
							<ul>
								<li><a href="#">Giới thiệu</a></li>
								<li><a href="#">Shop</a></li>
								<li><a href="#">Liên hệ</a></li>
								<li><a href="#">Kiểm tra đơn</a></li>
							</ul>
						</nav>
					</div>

					<!--=======  End of footer navigation container  =======-->

					<!--=======  single widget  =======-->
				</div>
				<div class="col footer-single-widget">
					<!--=======  single widget  =======-->
					<h5 class="widget-title">Liên kết hỗ trợ</h5>

					<!--=======  footer navigation container  =======-->

					<div class="footer-nav-container">
						<nav>
							<ul>
								<li><a href="#">trả hàng</a></li>
								<li><a href="#">Hỗ trợ khách hàng</a></li>
								<li><a href="#">FAQs</a></li>
							</ul>
						</nav>
					</div>

					<!--=======  End of footer navigation container  =======-->

					<!--=======  single widget  =======-->
				</div>

				<div class="col footer-single-widget">
					<!--=======  single widget  =======-->
					<h5 class="widget-title">Theo dõi tại</h5>

					<!--=======  footer navigation container  =======-->

					<div class="footer-nav-container footer-social-links">
						<nav>
							<ul>
								<li><a href="http://twitter.com/"><i class="fa fa-twitter"></i> Twitter</a></li>
								<li><a href="http://facebook.com/"> <i class="fa fa-facebook"></i> Facebook</a></li>
								<li><a href="http://instagram.com/"><i class="fa fa-instagram"></i> Instagram</a></li>
								<li><a href="http://youtube.com/"> <i class="fa fa-youtube"></i> Youtube</a></li>
							</ul>
						</nav>
					</div>

					<!--=======  End of footer navigation container  =======-->


					<!--=======  single widget  =======-->
				</div>
				<div class="col footer-single-widget">
					<!--=======  single widget  =======-->

					<div class="footer-subscription-widget">
						<h2 class="footer-subscription-title">Đăng kí.</h2>
						<?php
						$mail_note = Session::get('email_note');
						if (isset($mail_note)) {
							echo '<p class="text-muted mb-4 mt-3 style="color:green""> <strong>Thông báo : </strong>'.$mail_note.'</p>';
							Session::put('email_note',null);
						}else {
							echo '<p class="subscription-subtitle">Đăng kí để nhận các ưu đãi mới nhất.</p>';
					} ?>

						<!--=======  subscription form  =======-->

						<div class="subscription-form">
							<form id="mc-form" class="mc-form" action="{{URL::to('/subcribe')}}" method="post">
								@csrf
								<input type="email" name="mail_sub" placeholder="Nhập địa chỉ email" required>
								<button type="submit"><i class="ion-ios-arrow-thin-right"></i></button>
							</form>
						</div>

						<!--=======  End of subscription form  =======-->

						<!-- mailchimp-alerts Start -->

						<div class="mailchimp-alerts">
							<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
							<div class="mailchimp-success"></div><!-- mailchimp-success end -->
							<div class="mailchimp-error"></div><!-- mailchimp-error end -->
						</div><!-- mailchimp-alerts end -->

					</div>

					<!--=======  End of single widget  =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of footer area  ======-->


	<!--=============================================
	=            overlay items         =
	=============================================-->

	<!--=======  about overlay  =======-->

	<div class="header-offcanvas about-overlay" id="about-overlay">
		<div class="overlay-close inactive"></div>
		<div class="overlay-content">

			<!--=======  close icon  =======-->

			<span class="close-icon" id="about-close-icon">
				<a href="javascript:void(0)">
					<i class="ti-close"></i>
				</a>
			</span>

			<!--=======  End of close icon  =======-->

			<!--=======  overlay content container  =======-->

			<div class="overlay-content-container d-flex flex-column justify-content-between h-100">
				<!--=======  widget wrapper  =======-->

				<div class="widget-wrapper">
					<!--=======  single widget  =======-->

					<div class="single-widget">
						<h2 class="widget-title">About Us</h2>
						<p>At Lezada, we put a strong emphasis on simplicity, quality and usefulness of fashion products over other
							factors. Our fashion items never get outdated. They are not short-lived as normal fashion clothes.</p>
					</div>

					<!--=======  End of single widget  =======-->
				</div>

				<!--=======  End of widget wrapper  =======-->

				<!--=======  contact widget  =======-->

				<div class="contact-widget">
					<p class="email"><a href="">contact@lezada.com</a></p>
					<p class="phone">(+00) 123 567990</p>

					<div class="social-icons">
						<ul>
							<li><a href="http://www.twitter.com/" data-tippy="Twitter" data-tippy-inertia="true"
									data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i
										class="fa fa-twitter"></i></a></li>
							<li><a href="http://www.facebook.com/" data-tippy="Facebook" data-tippy-inertia="true"
									data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i
										class="fa fa-facebook"></i></a></li>
							<li><a href="http://www.instagram.com/" data-tippy="Instagram" data-tippy-inertia="true"
									data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i
										class="fa fa-instagram"></i></a></li>
							<li><a href="http://www.youtube.com/" data-tippy="Youtube" data-tippy-inertia="true"
									data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" target="_blank"><i
										class="fa fa-youtube-play"></i></a></li>
						</ul>
					</div>
				</div>

				<!--=======  End of contact widget  =======-->
			</div>

			<!--=======  End of overlay content container  =======-->
		</div>
	</div>

	<!--=======  End of about overlay  =======-->

	<!--=======  wishlist overlay  =======-->

	<div class="wishlist-overlay" id="wishlist-overlay">
		<div class="wishlist-overlay-close inactive"></div>
		<div class="wishlist-overlay-content">
			<!--=======  close icon  =======-->

			<span class="close-icon" id="wishlist-close-icon">
				<a href="javascript:void(0)">
					<i class="ion-android-close"></i>
				</a>
			</span>

			<!--=======  End of close icon  =======-->

			<!--=======  offcanvas wishlist content container  =======-->

			<div class="offcanvas-cart-content-container">
				<h3 class="cart-title">Yêu thích</h3>

				<div class="cart-product-wrapper">
					<div class="cart-product-container  ps-scroll">
						<!--=======  single cart product  =======-->
						@if (Session::get('Wishlist'))
							@foreach (Session::get('Wishlist') as $key => $value)
						<div class="single-cart-product">
							<span class="cart-close-icon">
								<a href="#"><i class="ti-close"></i></a>
							</span>
							<div class="image">
								<a href="shop-product-basic.html">
									<img src="{{ asset('Upload/Product/'.($value->ProductImage && file_exists(public_path('Upload/Product/'.$value->ProductImage)) ? $value->ProductImage : 'no-image.svg')) }}" class="img-fluid" alt="">
								</a>
							</div>
							<div class="content">
								<h5><a href="shop-product-basic.html">{{$value->ProductName}}</a></h5>
								<p> <span class="discounted-price">{{$value->ProductPrice}} VNĐ</span></p>

							</div>
						</div>
						@endforeach
						@endif
						<!--=======  End of single cart product  =======-->
					</div>

					<!--=======  cart buttons  =======-->
					<?php
					$name = Session::get('CustomerName');
					$cusID = Session::get('CustomerID');
					?>
					<div class="cart-buttons">
						<?php if(isset($name)==false){ ?>
						<a href="{{URL::to('/check-login')}}">Yêu thích</a>
						<?php } ?>
						<?php if(isset($name)!=false){ ?>
						<a href="{{URL::to('/wish-list_'.$cusID.'')}}">Yêu thích</a>
						<?php } ?>
					</div>

					<!--=======  End of cart buttons  =======-->
				</div>
			</div>

			<!--=======  End of offcanvas wishlist content container   =======-->
		</div>
	</div>

	<!--=======  End of wishlist overlay  =======-->

	<!--=======  cart overlay  =======-->

	<div class="cart-overlay" id="cart-overlay">
		<div class="cart-overlay-close inactive"></div>
		<div class="cart-overlay-content">
			<!--=======  close icon  =======-->

			<span class="close-icon" id="cart-close-icon">
				<a href="javascript:void(0)">
					<i class="ion-android-close"></i>
				</a>
			</span>

			<!--=======  End of close icon  =======-->

			<!--=======  offcanvas cart content container  =======-->

			<div class="offcanvas-cart-content-container">
				<h3 class="cart-title">Giỏ hàng</h3>

				<div class="cart-product-wrapper">
					<div class="cart-product-container  ps-scroll">
						<!--=======  single cart product  =======-->
						<?php
			$data_cart = Cart::getContent();
             ?>
						 @foreach ($data_cart as $key => $value)
						<div class="single-cart-product">
							<span class="cart-close-icon">
								<a href="#"><i class="ti-close"></i></a>
							</span>
							<div class="image">
								<a href="shop-product-basic.html">
									<img src="{{ asset('Upload/Product/'.($value->attributes->image && file_exists(public_path('Upload/Product/'.$value->attributes->image)) ? $value->attributes->image : 'no-image.svg')) }}" class="img-fluid" alt="">
								</a>
							</div>
							<div class="content">
								<h5><a href="shop-product-basic.html">{{$value->name}}</a></h5>
								<p><span class="cart-count">{{$value->quantity}} x </span> <span class="discounted-price">{{number_format($value->price)}} VNĐ</span></p>
							</div>
						</div>
					 @endforeach


						<!--=======  End of single cart product  =======-->
					</div>

					<!--=======  subtotal calculation  =======-->

					<p class="cart-subtotal">
						<span class="subtotal-title">Tổng tiền:</span>
						<span class="subtotal-amount">{{Cart::getSubTotal()}}</span>
					</p>

					<!--=======  End of subtotal calculation  =======-->

					<!--=======  cart buttons  =======-->
					<div class="cart-buttons">
						<a href="{{URL::to('/show_cart')}}">Xem giỏ hàng</a>
						<?php if(isset($name)==false){ ?>
						<a href="{{URL::to('/check-login')}}">Thanh toán</a>
						<?php } ?>
						<?php if(isset($name)!=false){ ?>
						<a href="{{URL::to('/check-out/'.$cusID.'')}}">Thanh toán</a>
						<?php } ?>
					</div>

					<!--=======  End of cart buttons  =======-->

					<!--=======  free shipping text  =======-->

					<p class="free-shipping-text">
						Miễn phí ship trong vòng 5km !
					</p>

					<!--=======  End of free shipping text  =======-->
				</div>
			</div>

			<!--=======  End of offcanvas cart content container   =======-->
		</div>
	</div>

	<!--=======  End of cart overlay  =======-->


	<!--=======  search overlay  =======-->

	<div class="search-overlay" id="search-overlay">

		<!--=======  close icon  =======-->

		<span class="close-icon search-close-icon">
			<a href="javascript:void(0)" id="search-close-icon">
				<i class="ti-close"></i>
			</a>
		</span>

		<!--=======  End of close icon  =======-->

		<!--=======  search overlay content  =======-->

		<div class="search-overlay-content">
			<div class="input-box">
				<form action="{{URL::to('/search')}}" method="get">
					{{csrf_field()}}
					<input type="search" name="Search" placeholder="Tìm kiếm sản phẩm...">
				</form>
			</div>
			<div class="search-hint">
				<span>Click vào phím đóng hoặc ESC để thoát !</span>
			</div>
		</div>

		<!--=======  End of search overlay content  =======-->
	</div>

	<!--=======  End of search overlay  =======-->

	<!--=====  End of overlay items  ======-->

	<!--=============================================
	=            quick view         =
	=============================================-->
	@if (isset($Product_all))
	@foreach ($Product_all as $key => $value)
	<div id="qv-{{$value->ProductID}}" class="cd-quick-view">
		<div class="cd-slider-wrapper">
			<ul class="cd-slider">
				<li class="selected"><img src="{{ asset('Upload/Product/'.($value->ProductImage1 && file_exists(public_path('Upload/Product/'.$value->ProductImage1)) ? $value->ProductImage1 : 'no-image.svg')) }}" alt="Product 2"></li>
				<li><img src="{{ asset('Upload/Product/'.($value->ProductImage2 && file_exists(public_path('Upload/Product/'.$value->ProductImage2)) ? $value->ProductImage2 : 'no-image.svg')) }}" alt="Product 1"></li>
			</ul> <!-- cd-slider -->

			<ul class="cd-slider-pagination">
				<li class="active"><a href="#0">1</a></li>
				<li><a href="#1">2</a></li>
			</ul> <!-- cd-slider-pagination -->

			<ul class="cd-slider-navigation">
				<li><a class="cd-prev" href="#0">Prev</a></li>
				<li><a class="cd-next" href="#0">Next</a></li>
			</ul> <!-- cd-slider-navigation -->
		</div> <!-- cd-slider-wrapper -->

		<div class="lezada-item-info cd-item-info ps-scroll">

			<h2 class="item-title">{{$value->ProductName}}</h2>
			<p class="price">
				<span class="discounted-price">{{number_format($value->ProductPrice)}} VNĐ</span>
			</p>

			<p class="description">{!!$value->ProductDescrip!!} .</p>

			<span class="quickview-title">Quantity:</span>
			<div class="pro-qty d-inline-block mb-40">
				<input type="text" value="1">
			</div>

			<div class="add-to-cart-btn mb-25">

				<button class="lezada-button lezada-button--medium">Thêm vào giỏ hàng</button>
			</div>

			<div class="quick-view-other-info">
				<table>
					<tr class="single-info">
						<td class="quickview-title">Mã: </td>
						<td class="quickview-value">PD-{{$value->ProductID}}</td>
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


		</div> <!-- cd-item-info -->
		<a href="#0" class="cd-close">Close</a>
	</div>
	@endforeach

@endif

	<!--=====  End of quick view  ======-->

	<!-- scroll to top  -->
	<a href="#" class="scroll-top"></a>
	<!-- end of scroll to top -->

	<!-- JS
	============================================ -->
	<!-- jQuery JS -->
	<script src="{{asset('frontend/js/vendor/jquery.min.js')}}"></script>

	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>

	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>

	<!-- Plugins JS -->
	<script src="{{asset('frontend/js/plugins.js')}}"></script>

	<!-- Main JS -->
	<script src="{{asset('frontend/js/main.js')}}"></script>

	<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

	<!-- Revolution Slider JS -->
	<script src="{{asset('frontend/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
	<script src="{{asset('frontend/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
	<script src="{{asset('frontend/revolution/revolution-active.js')}}"></script>

	<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
	<script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('frontend/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('frontend/js/ajax-mail.js') }}"></script>
	<script type="text/javascript">
			$('.add-to-cart').on('click',function(e){
						var id = $(this).data('id-product');
						var link = $(this).data('link');
						var cart_product_Name = $('.cart_product_Name_' + id).val();
						e.preventDefault();
						const Toast = Swal.mixin({
						toast: true,
						position: 'bottom-end',
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					})

					Toast.fire({
						icon: 'warning',
						title: 'Đã thêm '+ cart_product_Name +' vào giỏ hàng'
					}).then(function(){
            window.location.href = link;
            });
				});
	</script>
	<!-- Google Map -->
	<!-- Leaflet Map (OpenStreetMap) - No API key required -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

	<script>
		// When the window has finished loading create our map
		window.addEventListener('load', init);

		function init() {
			// Get the HTML element that will contain our map
			var mapElement = document.getElementById('google-map-one');

			if (!mapElement) return;

			// Create the map centered on Lạc Long Quân, Cầu Giấy, Hà Nội
			var map = L.map(mapElement).setView([21.0336, 105.7875], 16);

			// Add OpenStreetMap tiles
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '© OpenStreetMap contributors',
				maxZoom: 19
			}).addTo(map);

			// Add a marker at correct location
			var marker = L.marker([21.0336, 105.7875]).addTo(map);
			marker.bindPopup('<strong>225 Lạc Long Quân<br>Nghĩa Đô, Cầu Giấy, Hà Nội</strong>');
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.choose').on('change',function(){
				var action = $(this).attr('id');
				var matp = $(this).val();
				var _token = $('meta[name="csrf-token"]').attr('content') || $('input[name="_token"]').val();
				var result = '';
				if (action == 'city') {
					result = 'district';
				}else {
					result = 'Commune';
				}
				$.ajax({
					url: '/select-delivery-home',
					type: 'POST',
					data: { action: action, matp: matp, _token: _token },
					success: function(data){
						var $target = $('#'+result);
						$target.html(data);
						if ($.fn.niceSelect) {
							$target.niceSelect('update');
						}
					},
					error: function(xhr){
						console.warn('select-delivery-home failed', xhr.status, xhr.responseText);
					}
				});
			});
			// $('.add_delivery').click(function(){
			//   var city = $('.city').val();
			// });
		})
 </script>
</body>
</html>
