@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Đơn Hàng
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead class="search_table">
			      		<tr>
					        <th></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="" name=""></th>
					        <th class="input"><input type="date" name=""></th>
					        <th ><button class="search_button ship">Tìm Kiếm</button></th>
				      	</tr>
			    	</thead>
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 2)">ID</th>
					        <th onclick="sortListDir(1, 2)">Tên</th>
					        <th onclick="sortListDir(2, 2)">Số Điện Thoại</th>
					        <th onclick="sortListDir(3, 2)">Địa Chỉ</th>
					        <th onclick="sortListDir(4, 2)">Thời Gian</th>
					        <th>Chi Tiết</th>
				      	</tr>
			    	</thead>
			    	<tbody class="list_output">
               			@foreach($order as $item)
				      	<tr class="item_output">
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $item->name }}</td>
					        <td>{{ $item->phone }}</td>
					        <td>{{ $item->address }}</td>
					        <td>{{ $item->created_at }}</td>
					        <td>
					        	<a href="{{ route('ship.edit', ['id' => $item->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
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