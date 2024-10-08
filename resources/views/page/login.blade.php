<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>Kantin | De Pipe</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Web font -->

		<!--begin::Base Styles -->
		<link href="../../../assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
		<link href="../../../assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

		<!--RTL version:<link href="../../../assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

		<!--end::Base Styles -->
		<link rel="shortcut icon" href="../../../assets/demo/default/media/img/logo/logo-5.png" />
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--desktop m-grid--ver-desktop m-grid--hor-tablet-and-mobile m-login m-login--6" id="m_login">
				<div class="m-grid__item   m-grid__item--order-tablet-and-mobile-2  m-grid m-grid--hor m-login__aside " style="background-image: url(../../../assets/app/media/img//bg/bg-4.jpg);">
					<div class="m-grid__item">
						<div class="m-login__logo">
							<a href="#">
								<img src="../../../assets/app/media/img/logos/logo-7.png" width="50%">
							</a>
						</div>
					</div>
					<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver">
						<div class="m-grid__item m-grid__item--middle">
							<span class="m-login__title">Dinas Komunikasi dan Informatika</span>
							<span class="m-login__subtitle">Diskominfo</span>
						</div>
					</div>
					<div class="m-grid__item">
						<div class="m-login__info">
							<div class="m-login__section">
								<a href="#" class="m-link">&copy 2024 Tim IT</a>
							</div>
                            <div class="m-login__section">
								<a href="#" class="m-link">Official Website</a>
							</div>
						</div>
					</div>
				</div>
				<div class="m-grid__item m-grid__item--fluid  m-grid__item--order-tablet-and-mobile-1  m-login__wrapper">

					<!--begin::Body-->
					<div class="m-login__body">

						<!--begin::Signin-->
						<div class="m-login__signin">
							<div class="m-login__title">
								<h3>STFMS Diskominfo</h3>
							</div>
                            @if(session('error'))
                                <div class="alert alert-danger mt-3 alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <span class="mr-2"></span>
                                    {{ session('error') }}
                                </div>
                            @endif

							<!--begin::Form-->
							<form class="m-login__form m-form" action="/postlogin" method="POST">
                                @csrf
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="email" placeholder="Email" name="email" autocomplete="off">
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
								</div>
                                <div class="m-login__action">
									<button type="submit" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Masuk</button>
							    </div>
							</form>

							<!--end::Form-->

						</div>

						<!--end::Signin-->
					</div>

					<!--end::Body-->
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!--begin::Base Scripts -->
		<script src="../../../assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="../../../assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

		<!--end::Base Scripts -->

		<!--begin::Page Snippets -->
		<script src="../../../assets/snippets/custom/pages/user/login6.js" type="text/javascript"></script>

		<!--end::Page Snippets -->
	</body>

	<!-- end::Body -->
</html>