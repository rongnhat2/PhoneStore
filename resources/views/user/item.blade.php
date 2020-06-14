@extends('user.layout')
@section('body')
	<div class="main_content">
		<div class="wrapper">
			<div class="row">
				@include('user.collection')
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
					<div class="I-detail_item">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
								<div class="image">
									<img src="{{ asset($item->image_url) }}">
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
								<div class="detail">
									<div class="item_name">
										<?php echo $item->item_name ?>
									</div>
									<div class="item_price" value="{{ ($item->item_discount != 0) ? ($item->item_price - ($item->item_price  * $item->item_discount / 100)) : ($item->item_price) }}">
										@if ( $item->item_discount != 0 )
											<?php echo number_format($item->item_price - ($item->item_price  * $item->item_discount / 100)). " đ" ?> 
											<span class="discount"><?php echo number_format($item->item_price). " đ" ?> </span>
										@else
											<?php echo number_format($item->item_price). " đ" ?> 
										@endif
									</div>
									<div class="item_detail">
										<?php echo $item->item_description ?>
									</div>
									<div class="item_detail">
										<div class="row_wrapper">
											<span>Hệ Điều Hành</span> <?php echo $item->system_name ?>
										</div>
										<div class="row_wrapper">
											<span>Nhà Cung Cấp</span> <?php echo $item->supplier_name ?>
										</div>
										<div class="row_wrapper">
											<span>Màn Hình</span> <?php echo $item->item_screen ?>
										</div>
										<div class="row_wrapper">
											<span>Camera Sau</span> <?php echo $item->item_bcamera ?> ( MP )
										</div>
										<div class="row_wrapper">
											<span>Camera Trước</span> <?php echo $item->item_fcamera ?> ( MP )
										</div>
										<div class="row_wrapper">
											<span>CPU</span> <?php echo $item->item_cpu ?>
										</div>
										<div class="row_wrapper">
											<span>Ram</span> <?php echo $item->item_ram ?> ( GB )
										</div>
										<div class="row_wrapper">
											<span>bộ nhớ máy</span> <?php echo $item->item_memory ?> ( GB )
										</div>
										<div class="row_wrapper">
											<span>bộ nhớ ngoài</span> <?php echo $item->item_memorystick ?> ( GB )
										</div>
										<div class="row_wrapper">
											<span>dung lượng pin</span> <?php echo $item->item_battery ?> ( mAh )
										</div>
									</div>
									<div class="item_cart">
										<input type="number" name="" min="1" class="value_input" value="<?php echo $value_item ?>" {{ $has_item ? 'readonly' : ''}}>
										<a class="{{ $has_item ? '' : 'add_more_to_cart'}}" id_cart="<?php echo $item->id ?>">
											<?php if ($has_item): ?>
												<i class="fas fa-check"></i>
											<?php else: ?>
												<i class="fas fa-shopping-cart"></i>
											<?php endif ?>
										</a>
									</div>
									<div class="item_detail">
										<?php echo $item->item_detail ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="I-products">
						<div class="products_header">
							Sản Phẩm Liên Quan
						</div>
						<div class="product_list">
							<div class="row">
								<?php foreach ($item_same as $key => $value): ?>
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
	<script src="{{ asset('user/js/add_to_cart.js') }}"></script>
@endsection()


