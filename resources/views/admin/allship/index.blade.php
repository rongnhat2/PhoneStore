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
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 1)">ID</th>
					        <th onclick="sortListDir(1, 1)">Tên</th>
					        <th onclick="sortListDir(2, 1)">Số Điện Thoại</th>
					        <th onclick="sortListDir(3, 1)">Địa Chỉ</th>
					        <th onclick="sortListDir(4, 1)">Thời Gian</th>
					        <th onclick="sortListDir(5, 1)">Trạng Thái</th>
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
								<?php if ($item->status == -1): ?>
						        	<div class="status_table bg_danger text_light">
						        		Đã Hủy
						        	</div>
								<?php elseif ($item->status == 1):?>
						        	<div class="status_table bg_success text_light">
						        		Thành Công
						        	</div>
								<?php elseif ($item->status == 0):?>
						        	<div class="status_table bg_warning text_light">
						        		Đang Chờ
						        	</div>
								<?php endif ?>
					        </td>
					        <td>
					        	<a href="{{ route('shipall.edit', ['id' => $item->id]) }}" class="action_table">
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