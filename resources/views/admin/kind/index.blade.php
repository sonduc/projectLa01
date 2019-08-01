@extends('admin.layouts.master')
@section('content_index')
<h1 style="color: gray;margin-left: 15px;margin-top: 15px;">Thể Loại</h1>
<button style="margin-bottom: 15px; margin-left: 15px" class="btn btn-primary" id="them" data-toggle="modal" href="#add">Thêm mới</button>
<table id="myTable" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Tên danh mục</th>
			<th>Tiêu đề</th>
			<th>Thumbnail</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody id="kind">
		@foreach ($kind as $value)
		<tr id="tr-{{ $value->id }}">
			<th>{{ $value->id }}</th>
			<td>{{ $value->Category->title }}</td>
			<td>{{ $value->title }}</td>
			<td>{{ $value->thumbnail }}</td>
			<td>
				<button class="btn btn-warning" edit="{{ $value->id }}">Sửa</button>
				<button class="btn btn-danger" delete="{{ $value->id }}">Xóa</button>
			</td>
		</tr>
		@endforeach
	</tbody>		
</table>

<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Danh mục</h4>
			</div>
			<div class="modal-body">
				<form id="add_new" method="POST" role="form">
					{{csrf_field()}}
					<div class="form-group">
						<label >Danh mục</label>
						<select name="Category" class="form-control Sel">
							@foreach ($category as $value)
							<option value="{{$value->id}}" >{{ $value->title }}</option>
							@endforeach						
						</select>
					</div>			
					<div class="form-group">
						<label for="">Tên thể loại</label>
						<input type="text" class="form-control" name="title" id="title" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Thumbnail</label>
						<input type="text" class="form-control" name="thumbnail" id="thumbnail" placeholder="Nhập">
					</div>
					<button type="submit" class="btn btn-primary">Thêm</button>
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editP">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Danh mục</h4>
			</div>
			<div class="modal-body">
				<form id="edit_new" method="POST" role="form">
					{{csrf_field()}}
					<input type="hidden" name="" id="edit_id">
					<div class="form-group">
						<label >Danh mục</label>
						<select name="Category" class="form-control" id="edit_cateId">
							@foreach ($category as $value)
							<option value="{{$value->id}}" >{{ $value->title }}</option>
							@endforeach						
						</select>
					</div>	
					<div class="form-group">
						<label for="">Tên danh mục</label>
						<input type="text" class="form-control" name="title" id="edit_title">
					</div>
					<div class="form-group">
						<label for="">Thumbnail</label>
						<input type="text" class="form-control" name="thumbnail" id="edit_thumbnail">
					</div>
					<button type="submit" class="btn btn-primary">Sửa</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('#add_new').on('submit',function(e) {
			e.preventDefault();		
			$.ajax({				
				type: 'post',
				url: '{{asset('admin/kind/store')}}',
				data: {
					category_id: $('.Sel').val(),
					title: $('#title').val(),
					thumbnail: $('#thumbnail').val(),
				},
				success: function (response){
					console.log(response);
					$('#add').modal('hide');
					$('#title').text("");

					toastr.success('Thành công!');

					$('#kind').prepend('<tr><th>'+ response.data.id +'</th><td>'+ response.data.category_id +'</td><td>'+ response.data.title +'</td><td>'+ response.data.thumbnail +'</td><td><a class="btn btn-warning" >Sửa</a><a class="btn btn-danger" >Xóa</a></td></tr>');
				},
				error: function (error) {
					//500
				}
			})
		});
		$(document).on('click', '.btn-danger', function(e) {
			var id = $(this).attr('delete');
			e.preventDefault();
			swal({
				dangerMode: true,
				title: "Bạn có muốn xóa viết này không?",
				icon: "warning",
				buttons: {
					cancel: 'Hủy',
					confirm: 'Xóa'
				}
			})
			.then((willDelete) => {
				if (willDelete) {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					$.ajax({
						type: "delete",
						url: '{{asset("")}}admin/kind/delete/' + id,
						success: function(res)
						{
							toastr.success('Bài viết đã được xóa!');
							$('#tr-' + id).remove();
						},
						error: function () {

						}
					});
				}
			});
		});
		$(document).on('click', '.btn-warning', function() {
			$('#editP').modal('show');

			var id = $(this).attr('edit');

			$.ajax({
				type: 'get',
				url: '{{asset("")}}admin/kind/edit/' + id,
				success: function(response){
					$('#edit_id').val(response.id);
					$('#edit_cateId').val(response.category_id);
					$('#edit_title').val(response.title);
					$('#edit_thumbnail').val(response.thumbnail);	
				}
			})
		});
		$('#edit_new').on('submit',function(e) {
			e.preventDefault();
			

			var id = $('#edit_id').val();
			$.ajax({
				type: 'post',
				url: '{{asset("")}}admin/kind/update/' + id,
				data: {
					category_id: $('#edit_cateId').val(),
					title: $('#edit_title').val(),
					thumbnail: $('#edit_thumbnail').val()
				},
				success: function (response){
					$('#editP').modal('hide');

					toastr.success('Sửa thành công!');
					
					$('#tr-' + id).remove();
					$("#kind").html("");
					$('#kind').prepend('<tr><th>'+ id +'</th><td>'+ response.Category.title +'</td><td>'+ response.title +'</td><td>'+ response.thumbnail +'</td><td><a class="btn btn-warning" >Sửa</a><a class="btn btn-danger" >Xóa</a></td></tr>');

					$('#edit_title').text(response.title);
					$('#edit_thumbnail').text(response.thumbnail);
				},
				error: function (error) {
					//500
				}
			})
		});
	})
</script>
@endsection