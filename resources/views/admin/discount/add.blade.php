@extends('admin.layout')
@section('body')

<div class="I-layout flexX">
	<div class="layout_wrapper_02">
		<form class="I-form_input" method="post" action="{{ route('discount.store') }}" enctype="multipart/form-data">
			@csrf
			<div class="form_input_wrapper">
				<div class="form_input">
					<div class="title_form bg_primary text_light flexY">
						Thêm Giảm Giá 
					</div>
					<div class="body_form">
						<div class="input_wrapper">
							<div class="input_title flexY">
								Mã Phẩm - Giảm Giá
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<select class="chosen-select search_select" name="item_id">
									    <?php foreach ($listItem as $key => $value): ?>
									    	<option value="<?php echo $value->id; ?>"><?php echo $value->item_code; ?></option>
									    <?php endforeach ?>
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
									<div class="input_form">
										<input type="text" name="item_discount" pattern="[0-9]*" required="">
									</div>
								</div>
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
	</div>
</div>
				
@endsection()