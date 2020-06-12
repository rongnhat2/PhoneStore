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
	                        	@guest
									<a href="{{ route('customer.login') }}">Đăng Nhập</a>
									<a href="{{ route('customer.register') }}">Đăng Kí</a>
	                        	@else
									<a href="">Trang Cá Nhân</a>
									<a data-toggle="modal" data-target="#logout" style="cursor: pointer;">
		                                Đăng Xuất
		                            </a>
	                        	@endguest
								<a href="">Thanh Toán</a>
							</div>
						</div>
						<a href="{{ route('customer.checkout') }}" class="cart_wrapper">
							<div class="cart">
								<div class="icon">
									<i class="fas fa-shopping-cart"></i>
								</div>
								<div class="value cart_value_wrapper">
									@if ( Session::has('cart') )
										<?php echo $amount_item; ?>
									@else
										0
									@endif
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
                	@guest
						<a href="{{ route('customer.login') }}">Đăng Nhập</a>
						<a href="{{ route('customer.register') }}">Đăng Kí</a>
                	@else
						<a href="">Trang Cá Nhân</a>
						<a data-toggle="modal" data-target="#logout" style="cursor: pointer;">
                            Đăng Xuất
                        </a>
                	@endguest
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
	<div id="logout" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	   		<div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        	<h4 class="modal-title">Bạn muốn đăng xuất ?</h4>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
		      	</div>
		      	<div class="modal-footer">
		        	<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" type="button" class="btn btn-success" data-dismiss="modal">Đăng Xuất</a>
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		      	</div>
	    	</div>
	  	</div>
	</div>
	<script src="{{ asset('user/js/bootstrap3.js') }}"></script>
	<script src="{{ asset('user/js/effect_custom.js') }}"></script>
</html>


