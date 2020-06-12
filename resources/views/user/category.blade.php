@extends('user.layout')
@section('body')

	<div class="main_content">
		<div class="wrapper">
			<div class="row">
				@include('user.collection')
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
					<div class="I-products">
						<div class="products_header">
							<?php echo $title ?>
						</div>
						<div class="product_list">
							<div class="row">
								<?php foreach ($listItem as $key => $value): ?>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
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