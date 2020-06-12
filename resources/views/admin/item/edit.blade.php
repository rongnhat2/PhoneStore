@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Sửa Sản Phẩm
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Sản Phẩm
							</div>
							<div class="input_form">
								<input type="text" name="item_name" required="" value="<?php echo $items->item_name ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Danh Mục
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="select_form">
										<div class="select_wrapper">
											<input type="hidden" name="category_index" class="select_index" value="<?php echo $items->category_id ?>">
											<input type="hidden" name="category_value" class="select_value" value="<?php echo $items->category_name ?>">
											<div class="select_item"><?php echo $items->category_name ?></div>
											<div class="select_icon">
												<i class="fas fa-caret-down"></i>
											</div>
											<div class="option_wrapper">

											</div>
										</div>
										<select>
				                			@foreach($categories as $category)
												<option value="<?php echo $category->id ?>">{{ $category->category_name }}</option>
				                			@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Khối Lượng
							</div>
							<div class="input_form">
								<input type="number" name="item_size" required="" value="<?php echo $items->item_size ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Nguồn Gốc - Thương hiệu
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="select_form">
										<div class="select_wrapper">
											<input type="hidden" name="resource_index" class="select_index" value="<?php echo $items->item_resource ?>">
											<input type="hidden" name="resource_value" class="select_value" value="<?php echo $items->resource_name ?>">
											<div class="select_item"><?php echo $items->resource_name ?></div>
											<div class="select_icon">
												<i class="fas fa-caret-down"></i>
											</div>
											<div class="option_wrapper">

											</div>
										</div>
										<select>
				                			@foreach($resources as $resource)
												<option value="<?php echo $resource->id ?>">{{ $resource->resource_name }}</option>
				                			@endforeach
										</select>
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="select_form">
										<div class="select_wrapper">
											<input type="hidden" name="trademark_index" class="select_index" value="<?php echo $items->item_trademark ?>">
											<input type="hidden" name="trademark_value" class="select_value" value="<?php echo $items->trademark_name ?>">
											<div class="select_item"><?php echo $items->trademark_name ?></div>
											<div class="select_icon">
												<i class="fas fa-caret-down"></i>
											</div>
											<div class="option_wrapper">

											</div>
										</div>
										<select>
				                			@foreach($trademarks as $trademark)
												<option value="<?php echo $trademark->id ?>">{{ $trademark->trademark_name }}</option>
				                			@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Đơn Giá
							</div>
							<div class="input_form">
								<input type="number" name="item_prices" required="" value="<?php echo $items->item_prices ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Hình Ảnh
							</div>
							<div class="input_form image_loader">
								<label class="W100" data-toggle="modal" data-target="#myModal">
									<i class="fas fa-upload"></i>
								</label>
								<div class="image_loading">
									<img src="{{ asset($items->item_image) }}" >
								</div>
								<input type="text" name="item_image" value="<?php echo $items->item_image ?>" style="display: none;">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mô Tả
							</div>
							<div class="input_form">

								<textarea class="summernote" name="item_detail" style="min-height: 200px;" required=""><?php echo $items->item_detail ?></textarea>
								<script>
								    $(document).ready(function() {
								        $('.summernote').summernote();
								    });
								</script>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Cập Nhật</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<div id="myModal" class="modal fade" role="dialog">
		  	<div class="modal-dialog">
		    <!-- Modal content-->
			    <div class="modal-content">
			      	<div class="modal-body" style="overflow: hidden;">
						<?php foreach ($gallery as $key => $value): ?>
							<div class="I-image">
								<div class="image_wrapper">
									<img src="{{asset($value->image_url)}}">
								</div>
								<div class="image_url">
									{{asset($value->image_url)}}
								</div>
								<div class="image_title">
									<?php echo $value->image_name ?>
								</div>
							</div>
						<?php endforeach ?>
			      	</div>
			    </div>
			</div>
		</div>
		<script type="text/javascript">
			$('.I-image').on('click', function(e){
				var image = $(this).find('.image_url').text()
		        $('.image_loading').find('img').attr('src', image)
		        $('.image_loader').find('input').attr('value', image)
			})
		</script>
	</div>
</div>
				
@endsection()