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
						Danh Sách Hệ Điều Hành
					</div>
					<div class="title_side">
						<a href="{{ route('system.add') }}" class="I-button bg_primary text_light">Thêm</a>
					</div>
				</div>
				<table class="table table-bordered">
			    	<thead>
			      		<tr>
					        <th>ID</th>
					        <th>Tên Danh Mục</th>
					        <th>Số Lượng Sản Phẩm</th>
					        <th>Sửa</th>
					        <th>Xóa</th>
				      	</tr>
			    	</thead>
			    	<tbody>
               			@foreach($listSystem as $system)
				      	<tr>
					        <td>{{ $loop->index + 1 }}</td>
					        <td>{{ $system->system_name }}</td>
					        <td>
					        	<?php if (empty ($count_item[$system->id][0])): ?>
						        	<?php echo 0 ?>
					        	<?php else:  ?>
					        		<?php echo $count_item[$system->id][0]->total ?>
						        <?php endif ?>
						    </td>
					        <td>
					        	<a href="{{ route('system.edit', ['id' => $system->id]) }}" class="action_table">
					        		<i class="far fa-edit"></i>
					        	</a>
					        </td>
					        <td>
					        	<a href="{{ route('system.delete', ['id' => $system->id]) }}" class="action_table">
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
				
@endsection()