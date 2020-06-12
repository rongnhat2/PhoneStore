@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
		@if ( Session::has('success') )
			<div class="alert alert-success alert-dismissible" role="alert">
				<strong>{{ Session::get('success') }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
		@endif
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Lịch Sử Nhập Kho
					</div>
					<div class="title_side">
						<a href="{{ route('warehouse.add') }}" class="I-button bg_primary text_light">Nhập Kho</a>
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0)">ID</th>
					        <th onclick="sortListDir(1)">Tên Người Nhập Kho</th>
					        <th onclick="sortListDir(2)">Tên Sản Phẩm </th>
					        <th onclick="sortListDir(3)">Số Lượng Sản Phẩm</th>
					        <th onclick="sortListDir(4)">Thời Gian</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($warehouse as $value)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $value->username }}</td>
					        <td>{{ $value->item_name }}</td>
					        <td>{{ $value->qty_item }}</td>
					        <td>{{ $value->updated_at  }}</td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/warehouse.js') }}"></script>
				
@endsection()