@extends('user.layout')
@section('body')
			<div class="I-carousel">
				<div class="wrapper">
					<div class="carouser_wrapper">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">

						  	<ol class="carousel-indicators">
						  		<?php foreach ($carousel_item as $key => $value): ?>
								    <li data-target="#myCarousel" data-slide-to="<?php echo $key ?>" class="{{ $key == 0 ? 'active' : ''}}"></li>
						  		<?php endforeach ?>
						  	</ol>

						  	<div class="carousel-inner">
						  		<?php foreach ($carousel_item as $key => $value): ?>
								    <div class="item {{ $key == 0 ? 'active' : ''}}">
								    	<div class="item_wrapper">
								    		<div class="image_wrapper">
								      			<img src="{{ asset($value->image_url) }}">
								    		</div>
								      		<div class="top">
								      			<a href="#" class="content_wrapper">
													<div class="content_item">
														<div class="title_item">
															<div class="text">
																<?php echo $value->item_name ?>
															</div>
														</div>
														<div class="detail_item">
															<div class="text">
																<?php echo $value->item_description ?>
															</div>
														</div>
														<div class="prices_item">
															<div class="text">
																@if ( $value->item_discount != 0 )
																	<?php echo number_format($value->item_price - ($value->item_price  * $value->item_discount / 100)). " đ" ?> 
																	<span class="discount"><?php echo number_format($value->item_price). " đ" ?> </span>
																@else
																	<?php echo number_format($value->item_price). " đ" ?> 
																@endif
																<!-- Giá : <span><?php echo $value->item_description ?></span> -->
															</div>
														</div>
													</div>
								      			</a>
								      		</div>
								    	</div>
								    </div>
						  		<?php endforeach ?>
						  	</div>

						  	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							    <span class="glyphicon glyphicon-chevron-left"><i class="fas fa-chevron-circle-left"></i></span>
							    <span class="sr-only">Previous</span>
						  	</a>
						  	<a class="right carousel-control" href="#myCarousel" data-slide="next">
							    <span class="glyphicon glyphicon-chevron-right"><i class="fas fa-chevron-circle-right"></i></span>
							    <span class="sr-only">Next</span>
						  	</a>
						</div>
					</div>
				</div>
			</div>
			<div class="I-category">
				<div class="wrapper">
					<div class="category_wrapper">
						<div class="row">
							<?php foreach ($most_Supplier as $key => $value): ?>
								<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
									<a href="{{ route('customer.category', ['id' => $value->id]) }}" class="category_item">
										<div class="image">
											<img src="{{ asset($value->image_url) }}">
										</div>
										<div class="title">
											<?php echo $value->supplier_name ?>
										</div>
									</a>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
			<div class="main_content">
				<div class="wrapper">
					<div class="row">
						<?php if ( count( $discount_Item) > 0): ?>
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="I-products">
									<div class="products_header">
										Sản Phẩm Đang Giảm Giá
										<a href="{{ route('customer.discount') }}"><i class="fas fa-reply-all"></i></a>
									</div>
									<div class="product_list">
										<div class="row">
											<?php foreach ($discount_Item as $key => $value): ?>
												<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
													<div class="I-item">
														@if ( $value->item_discount != 0 )
															<div class="sale">
																Sale
															</div>
														@endif
														<div class="image">
															<img src="{{ asset($value->image_url) }}">
														</div>
														<div class="action">
															<div class="prices_wrapper">
																<div class="name">
																	<?php echo $value->item_name ?>
																</div>
																@if ( $value->item_discount != 0 )
																	<div class="prices">
																		<?php echo number_format($value->item_price - ($value->item_price  * $value->item_discount / 100)). " đ" ?> 
																	</div>
																	<div class="discount">
																		<?php echo number_format($value->item_price). " đ" ?>
																	</div>
																<span class="discount"> </span>
																@else
																	<div class="prices">
																		<?php echo number_format($value->item_price). " đ" ?> 
																	</div>
																@endif
															</div>
															<a href="{{ route('customer.item', ['id' => $value->id]) }}" class="detail">
																<i class="fas fa-info-circle"></i>
															</a>
															<a href="" class="add_to_cart">
																<i class="fas fa-shopping-cart"></i>
															</a>
														</div>
													</div>
												</div>
											<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
						<?php endif ?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="I-products">
								<div class="products_header">
									Sản Phẩm Nổi Bật
								</div>
								<div class="product_list">
									<div class="row">
										<?php foreach ($most_Item as $key => $value): ?>
											<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
												<div class="I-item">
													@if ( $value->item_discount != 0 )
														<div class="sale">
															Sale
														</div>
													@endif
													<div class="image">
														<img src="{{ asset($value->image_url) }}">
													</div>
													<div class="action">
														<div class="prices_wrapper">
															<div class="name">
																<?php echo $value->item_name ?>
															</div>
															@if ( $value->item_discount != 0 )
																<div class="prices">
																	<?php echo number_format($value->item_price - ($value->item_price  * $value->item_discount / 100)). " đ" ?> 
																</div>
																<div class="discount">
																	<?php echo number_format($value->item_price). " đ" ?>
																</div>
															<span class="discount"> </span>
															@else
																<div class="prices">
																	<?php echo number_format($value->item_price). " đ" ?> 
																</div>
															@endif
														</div>
														<a href="{{ route('customer.item', ['id' => $value->id]) }}" class="detail">
															<i class="fas fa-info-circle"></i>
														</a>
														<a href="" class="add_to_cart">
															<i class="fas fa-shopping-cart"></i>
														</a>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="I-products">
								<div class="products_header">
									Được Mua Nhiều Nhất
								</div>
								<div class="product_list">
									<div class="row">
										<?php foreach ($best_sale_Item as $key => $value): ?>
											<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
												<div class="I-item">
													@if ( $value->item_discount != 0 )
														<div class="sale">
															Sale
														</div>
													@endif
													<div class="image">
														<img src="{{ asset($value->image_url) }}">
													</div>
													<div class="action">
														<div class="prices_wrapper">
															<div class="name">
																<?php echo $value->item_name ?>
															</div>
															@if ( $value->item_discount != 0 )
																<div class="prices">
																	<?php echo number_format($value->item_price - ($value->item_price  * $value->item_discount / 100)). " đ" ?> 
																</div>
																<div class="discount">
																	<?php echo number_format($value->item_price). " đ" ?>
																</div>
															<span class="discount"> </span>
															@else
																<div class="prices">
																	<?php echo number_format($value->item_price). " đ" ?> 
																</div>
															@endif
														</div>
														<a href="{{ route('customer.item', ['id' => $value->id]) }}" class="detail">
															<i class="fas fa-info-circle"></i>
														</a>
														<a href="" class="add_to_cart">
															<i class="fas fa-shopping-cart"></i>
														</a>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
							<div class="I-products">
								<div class="products_header">
									Sản Phẩm Đề Cử
								</div>
								<div class="product_list">
									<div class="row">
										<?php foreach ($sugges_Item as $key => $value): ?>
											<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
												<div class="I-item">
													@if ( $value->item_discount != 0 )
														<div class="sale">
															Sale
														</div>
													@endif
													<div class="image">
														<img src="{{ asset($value->image_url) }}">
													</div>
													<div class="action">
														<div class="prices_wrapper">
															<div class="name">
																<?php echo $value->item_name ?>
															</div>
															@if ( $value->item_discount != 0 )
																<div class="prices">
																	<?php echo number_format($value->item_price - ($value->item_price  * $value->item_discount / 100)). " đ" ?> 
																</div>
																<div class="discount">
																	<?php echo number_format($value->item_price). " đ" ?>
																</div>
															<span class="discount"> </span>
															@else
																<div class="prices">
																	<?php echo number_format($value->item_price). " đ" ?> 
																</div>
															@endif
														</div>
														<a href="{{ route('customer.item', ['id' => $value->id]) }}" class="detail">
															<i class="fas fa-info-circle"></i>
														</a>
														<a href="" class="add_to_cart">
															<i class="fas fa-shopping-cart"></i>
														</a>
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

@endsection()


