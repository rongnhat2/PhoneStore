
<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
	<div class="I-collections">
		<div class="collect_header">
			Danh Mục
		</div>
		<div class="collect_list">
			<ul>
				<?php foreach ($listSupplier as $key => $value): ?>
					<li><a href="{{ route('customer.category', ['id' => $value->id]) }}"><?php echo $value->supplier_name ?></a></li>
				<?php endforeach ?>
			</ul>
		</div>
	</div>
	<div class="I-collections">
		<div class="collect_header">
			Giảm Giá Shock
		</div>
		<div class="collect_list">
			<div class="I-item">
				@if ( $most_sell_Item->item_discount != 0 )
					<div class="sale">
						Sale
					</div>
				@endif
				<div class="image">
					<img src="{{ asset($most_sell_Item->image_url) }}">
				</div>
				<div class="action">
					<div class="prices_wrapper">
						<div class="name">
							<?php echo $most_sell_Item->item_name ?>
						</div>
						@if ( $most_sell_Item->item_discount != 0 )
							<div class="prices">
								<?php echo number_format($most_sell_Item->item_price - ($most_sell_Item->item_price  * $most_sell_Item->item_discount / 100)). " đ" ?> 
							</div>
							<div class="discount">
								<?php echo number_format($most_sell_Item->item_price). " đ" ?>
							</div>
						<span class="discount"> </span>
						@else
							<div class="prices">
								<?php echo number_format($most_sell_Item->item_price). " đ" ?> 
							</div>
						@endif
					</div>
					<a href="{{ route('customer.item', ['id' => $most_sell_Item->id]) }}" class="detail">
						<i class="fas fa-info-circle"></i>
					</a>
					<a href="" class="add_to_cart">
						<i class="fas fa-shopping-cart"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>