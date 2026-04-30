@extends('layout')
@section('content')
  <div class="breadcrumb-area breadcrumb-bg-1 pt-50 pb-70 mb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="breadcrumb-title">Đăng nhập</h1>

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="index.html">Trang chủ</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Đăng nhập</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

	<!--=======  End of breadcrumb area =======-->

	<!--=============================================
    =            login page content         =
    =============================================-->

	<div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 mb-md-50 mb-sm-50">
					<div class="lezada-form login-form">
						<form action="{{URL::to('/login-user')}}" method="post">
              {{csrf_field()}}
							<div class="row">
								<div class="col-lg-12">
									<!--=======  login title  =======-->

									<div class="section-title section-title--login text-center mb-50">
										<h2 class="mb-20">Đăng nhập</h2>
										<p>Tuyệt vời bạn đã trở lại !</p>
									</div>

									<!--=======  End of login title  =======-->
								</div>
								<div class="col-lg-12 mb-60">
									<input type="text" name="Username" placeholder="Nhập tài khoản của bạn" required>
								</div>
								<div class="col-lg-12 mb-60">
									<input type="password" name="Password" placeholder="Mật khẩu" required>
								</div>
								<div class="col-lg-12 text-center mb-30">
									<button type="submit" class="lezada-button lezada-button--medium">Đăng nhập</button>
								</div>
                <div class="col-lg-6">
                  <input type="checkbox"> <span class="remember-text">Lưu mật khẩu</span>
                </div>
                <div class="container">
                <div class="row">
								<div class="col-lg-8">
									<a href="#" class="reset-pass-link">Bạn quên mật khẩu ?</a>
								</div>
                <div class="col-lg-4">
                  <a href="{{URL::to('/sign-up')}}" class="reset-pass-link">Tạo tài khoản !</a>
                </div>
                </div>
              </div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-lg-6">
						<img src="{{ asset('frontend/images/login.jpg') }}" height="73%" width="100%" alt="">
				</div>
			</div>
		</div>
	</div>
@endsection
