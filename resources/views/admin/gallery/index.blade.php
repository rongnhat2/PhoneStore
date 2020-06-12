@extends('admin.layout')
@section('body')

<div class="I-layout">
	@if ( Session::has('error') )
		<div class="alert alert-danger alert-dismissible" role="alert">
			<strong>{{ Session::get('error') }}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
		</div>
	@endif
	@if ( Session::has('success') )
		<div class="alert alert-success alert-dismissible" role="alert">
			<strong>{{ Session::get('success') }}</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>
		</div>
	@endif
	<div class="I-table">
		<div class="table_wrapper">
			<div class="title_table">
				<div class="title_name">
					Thư Viện Hình Ảnh
				</div>
				<div class="title_side">
					<a href="{{ route('gallery.add') }}" class="I-button bg_primary text_light">Thêm Ảnh Mới</a>
				</div>
			</div>
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
				
@endsection()