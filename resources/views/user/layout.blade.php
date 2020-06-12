<!DOCTYPE html>
<html>
	<head>
		<title>Image X Image</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	    <link rel="stylesheet" href="{{ asset('user/css/bootstrap3.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style-overview.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/style.css') }}" />
		<link rel="stylesheet" href="{{ asset('user/css/responsive.css') }}" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
		<script src="{{ asset('user/js/jquery-3.4.1.min.js') }}"></script>
	</head>
	<body> 
		<header>
			<div class="I-navigation">
				<div class="navigation_wrapper">
					<div class="wrapper">
						<ul>
							<li><a href="{{ route('customer.index') }}">Trang Chủ</a></li>
							<li class="sub_navigation">
								<a href="{{ route('customer.all_category') }}">Danh Mục Sản Phẩm<i class="fas fa-caret-down"></i></a>
								<div class="list_navigation">
									<?php foreach ($listSupplier as $key => $value): ?>
										<a href="{{ route('customer.category', ['id' => $value->id]) }}" class="item_navigation"><?php echo $value->supplier_name ?></a>
									<?php endforeach ?>
								</div>
							</li>
							<li><a href="">Về Chúng Tôi</a></li>
							<li><a href="">Liên Hệ</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<main>
			<div class="I-header">
				<div class="wrapper">
					<div class="header_wrapper">
						<div class="open_nav_respon">
							<i class="fas fa-bars"></i>
						</div>
						<div class="logo_wrapper">
							<div class="icon">
								<i class="fas fa-mobile-alt"></i>
							</div>
							<div class="logo_title">
								<div class="header_title">
									Mobile
								</div>
								<div class="detail_title">
									Electronics Online Store
								</div>
							</div>
						</div>
						<div class="search_wrapper">
							<div class="search">
								<input type="" name="">
								<a href="#"><i class="fas fa-search"></i></a>
							</div>
						</div>
						<div class="action_wrapper">
							<div class="action">
								<a href="">Đăng Nhập</a>
								<a href="">Đăng Kí</a>
								<a href="">Thanh Toán</a>
							</div>
						</div>
						<a href="#" class="cart_wrapper">
							<div class="cart">
								<div class="icon">
									<i class="fas fa-shopping-cart"></i>
								</div>
								<div class="value">
									12
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="I-respon_nav">
				<div class="sub_nav">
					<div class="nav_wrapper">
						<ul>
							<li><a href="#">Trang Chủ</a></li>
							<li class="sub_menu_wrapper">
								<a href="#">Danh Mục Sản Phẩm</a>
								<div class="sub_menu">
									<?php foreach ($listSupplier as $key => $value): ?>
										<a href="{{ route('customer.category', ['id' => $value->id]) }}"><?php echo $value->supplier_name ?></a>
									<?php endforeach ?>
								</div>
								<div class="open_subnav">
									<i class="fas fa-caret-down"></i>
								</div>
							</li>
							<li><a href="">Về Chúng Tôi</a></li>
							<li><a href="">Liên Hệ</a></li>
						</ul>
					</div>
				</div>
				<div class="action_wrapper">
					<a href="">Đăng Nhập</a>
					<a href="">Đăng Kí</a>
					<a href="">Thanh Toán</a>
				</div>
			</div>
			@yield('body')
		</main>
		<footer>
			<div class="I-footer">
				
			</div>
		</footer>
	</body>
	<script src="{{ asset('user/js/bootstrap3.js') }}"></script>
	<script src="{{ asset('user/js/effect_custom.js') }}"></script>
</html>


