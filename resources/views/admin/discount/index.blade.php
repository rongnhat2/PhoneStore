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
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Giảm Giá
					</div>
					<div class="title_side">
						<a href="{{ route('discount.add') }}" class="I-button bg_primary text_light">Thêm Giảm Giá</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Mã Sản Phẩm</th>
					        <th>Tên Sản Phẩm</th>
					        <th>Giảm Giá</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($listItem as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>
					        	<?php echo $value->item_code ?>
					        </td>
					        <td>
					        	<?php echo $value->item_name ?>
					        </td>
					        <td>
					        	<?php echo $value->item_discount . ' %' ?>
					        </td>
					        <td>
					        	<a href="{{ route('item.delete', ['id' => $value->id]) }}" class="action_table">
					        		<i class="far fa-trash-alt"></i>
					        	</a>
					        </td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>
			
<script src="{{ asset('js/discount.js') }}"></script>	

@endsection()