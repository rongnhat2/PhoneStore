@extends('admin.layout')
@section('body')

<div class="I-layout">
	<div class="layout_wrapper_01">
		<div class="I-table">
			<div class="table_wrapper">
				<div class="title_table">
					<div class="title_name">
						Danh Sách Đơn Hàng Chi Tiết
					</div>
				</div>
				<table class="table table-bordered" id="myTable">
			    	<thead>
			      		<tr>
					        <th onclick="sortListDir(0, 1)">ID</th>
					        <th onclick="sortListDir(1, 1)">Tên Hàng</th>
					        <th onclick="sortListDir(2, 1)">Số Lượng</th>
					        <th onclick="sortListDir(3, 1)">Đơn Giá</th>
					        <th onclick="sortListDir(4, 1)">Thành Tiền</th>
					        <th onclick="sortListDir(5, 1)">Ngày Đặt</th>
				      	</tr>
			    	</thead>
			    	<tbody class="list_output">
               			@foreach($items as $item)
				      	<tr class="item_output">
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $item->item_name }}</td>
					        <td>{{ $item->amounts }}</td>
					        <td>{{ number_format($item->unit_price) }}</td>
					        <td>{{ number_format($item->total_price) }}</td>
					        <td>{{ $item->created_at }}</td>
				      	</tr>
                		@endforeach
			    	</tbody>
			  	</table>
				<div class="input_wrapper">
					<div class="input_button">
						<div>Tổng = <?php echo number_format($total) ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="{{ asset('js/sort_table.js') }}"></script>
				
@endsection()