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
								Mã Sản Phẩm
							</div>
							<div class="input_form">
								<input type="text" name="item_code" required="" value="<?php echo $item->item_code ?>" readonly>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Tên Sản Phẩm
							</div>
							<div class="input_form">
								<input type="text" name="item_name" required="" value="<?php echo $item->item_name ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Hệ Điều Hành - Thương Hiệu
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<select class="" name="system_id">
									    <option value=""></option>
									    <?php foreach ($listSystem as $key => $value): ?>
									    	<option value="<?php echo $value->id; ?>" {{ ($value->id == $item->system_id) ? 'selected' : '' }}><?php echo $value->system_name; ?></option>
									    <?php endforeach ?>
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<select class="" name="supplier_id">
									    <option value=""></option>
									    <?php foreach ($listSupplier as $key => $value): ?>
									    	<option value="<?php echo $value->id; ?>" {{ ($value->id == $item->supplier_id) ? 'selected' : '' }}><?php echo $value->supplier_name; ?></option>
									    <?php endforeach ?>
									</select>
								</div>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Kích Thước Màn Hình
							</div>
							<div class="input_form">
								<input type="text" name="item_screen" required="" value="<?php echo $item->item_screen ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Camera Trước
							</div>
							<div class="input_form">
								<input type="text" name="item_fcamera" required="" pattern="[0-9]*" value="<?php echo $item->item_fcamera ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Camera Sau
							</div>
							<div class="input_form">
								<input type="text" name="item_bcamera" required="" pattern="[0-9]*" value="<?php echo $item->item_bcamera ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								CPU
							</div>
							<div class="input_form">
								<input type="text" name="item_cpu" required="" value="<?php echo $item->item_cpu ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Ram
							</div>
							<div class="input_form">
								<input type="text" name="item_ram" required="" pattern="[0-9]*" value="<?php echo $item->item_ram ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Bộ Nhớ Trong
							</div>
							<div class="input_form">
								<input type="text" name="item_memory" required="" pattern="[0-9]*" value="<?php echo $item->item_memory ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Bộ Nhớ Ngoài
							</div>
							<div class="input_form">
								<input type="text" name="item_memorystick" required="" pattern="[0-9]*" value="<?php echo $item->item_memorystick ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Dung Lượng Pin
							</div>
							<div class="input_form">
								<input type="text" name="item_battery" required="" pattern="[0-9]*" value="<?php echo $item->item_battery ?>">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Đơn Giá
							</div>
							<div class="input_form">
								<input type="text" name="item_price" required="" pattern="[0-9]*" value="<?php echo $item->item_price ?>">
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
									<img src="{{ asset($item->image_url) }}" >
								</div>
								<input type="text" name="image_id" value="<?php echo $item->image_id ?>" style="display: none;" required="">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Thời Gian Bảo Hàng ( Tháng )
							</div>
							<div class="input_form">
								<input type="text" name="item_guarantee" required="" value="<?php echo $item->item_guarantee ?>" pattern="[0-9]*">
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mô Tả Ngắn
							</div>
							<div class="input_form">
								<textarea name="item_description" style="min-height: 200px;" required=""><?php echo $item->item_description ?></textarea>
							</div>
						</div>
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mô Tả Đầy Đủ
							</div>
							<div class="input_form">

								<textarea class="summernote" name="item_detail" style="min-height: 200px;" required=""><?php echo $item->item_detail ?></textarea>
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
			      	<div class="modal-body list_image_library" style="overflow: hidden;">

			      	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/library.js') }}"></script>
				
@endsection()