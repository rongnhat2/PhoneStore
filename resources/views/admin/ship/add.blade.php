@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('item.store') }}">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Sản Phẩm
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Sản Phẩm
							</div>
							<div class="input_form">
								<input type="text" name="item_name" required="">
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
											<input type="hidden" name="category_index" class="select_index">
											<input type="hidden" name="category_value" class="select_value">
											<div class="select_item"> </div>
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
								<input type="text" name="item_size" required="" pattern="[0-9]*">
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
											<input type="hidden" name="resource_index" class="select_index">
											<input type="hidden" name="resource_value" class="select_value">
											<div class="select_item"> </div>
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
											<input type="hidden" name="trademark_index" class="select_index">
											<input type="hidden" name="trademark_value" class="select_value">
											<div class="select_item"> </div>
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
								<input type="text" name="item_prices" required="" pattern="[0-9]*">
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
									<img src="" >
								</div>
								<input type="text" name="item_image" value="" style="display: none;">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mô Tả
							</div>
							<div class="input_form">

								<textarea class="summernote" name="item_detail" style="min-height: 200px;" required=""></textarea>
								<script>
								    $(document).ready(function() {
								        $('.summernote').summernote();
								    });
								</script>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_button">
								<button class="bg_success text_light">Thêm</button>
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
			      	<div class="modal-body list_image_library" style="overflow: hidden;">

			      	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/library.js') }}"></script>
				
@endsection()