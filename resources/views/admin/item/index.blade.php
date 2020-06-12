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
						Danh Sách Sản Phẩm
					</div>
					<div class="title_side">
						<a href="{{ route('item.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead class="search_table">
			      		<tr>
					        <th></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="" name=""></th>
					        <th></th>
					        <th></th>
					        <th></th>
					        <th></th>
					        <th colspan="3"><button class="search_button item">Tìm Kiếm</button></th>
				      	</tr>
			    	</thead>
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 2)">ID</th>
					        <th onclick="sortListDir(1, 2)">Mã</th>
					        <th onclick="sortListDir(2, 2)">Tên</th>
					        <th onclick="sortListDir(3, 2)">Đơn Giá</th>
					        <th onclick="sortListDir(4, 2)">Giảm Giá</th>
					        <th onclick="sortListDir(5, 2)">Số Lượng</th>
					        <th onclick="sortListDir(6, 2)">Lượt Xem</th>
					        <th>Chi Tiết</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody class="list_output">
               			@foreach($listItem as $item)
				      	<tr class="item_output">
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $item->item_code }}</td>
					        <td>{{ $item->item_name }}</td>
					        <td>{{ number_format($item->item_price) }}</td>
					        <td>{{ number_format($item->item_discount) }}</td>
					        <td>{{ number_format($item->item_amount)  }}</td>
					        <td>{{ number_format($item->item_view) }}</td>
					        <td>
					        	<a href="{{ route('item.edit', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('item.edit', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('item.delete', ['id' => $item->id]) }}" class="action_table">
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
<script src="{{ asset('js/table.js') }}"></script>		
<script src="{{ asset('js/sort_table.js') }}"></script>
				
@endsection()