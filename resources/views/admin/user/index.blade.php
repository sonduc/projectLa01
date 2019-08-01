@extends('admin.layouts.master')
@section('content_index')
<h1 style="color: gray;margin-left: 15px;margin-top: 15px;">Người dùng</h1>
<button class="btn btn-primary" id="them" data-toggle="modal" href="#add">Thêm mới</button>
<table id="myTable" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Tên</th>
			<th>Email</th>
			<th>Level</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody id="user">
		@foreach ($user as $value)
		<tr id="tr-{{ $value->id }}">
			<th>{{ $value->id }}</th>
			<td>{{ $value->name }}</td>
			<td>{{ $value->email }}</td>
			<td>{{ $value->level }}</td>
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
						<label for="">Tên</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="email" id="email" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Quyền</label>	
						<br>
						<label class="radio-inline">
							<input type="radio" name="level" value="1" class="level">Admin
						</label>
						<label class="radio-inline">
							<input type="radio" name="level" value="0" class="level" checked>Thường
						</label>
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
						<label for="">Tên</label>
						<input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="edit_email" id="edit_email" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="edit_password" id="edit_password" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Quyền</label>	
						<br>
						<label class="radio-inline">
							<input type="radio" name="edit_level" value="1" class="edit_level">
							Admin
						</label>
						<label class="radio-inline">
							<input type="radio" name="edit_level" value="0" class="edit_level" checked>Thường
						</label>
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
				url: '{{asset('admin/user/store')}}',
				data: {
					name: $('#name').val(),
					email: $('#email').val(),
					level: $('.level:checked').val(),
					password: $('#password').val(),
				},
				success: function (response){
					console.log(response);
					$('#add').modal('hide');
					toastr.success('Thành công!');

					$('#user').prepend('<tr><th>'+ response.user.id +'</th><td>'+ response.user.name +'</td><td>'+ response.user.email +'</td><td>'+ response.user.level +'</td><td><a class="btn btn-warning" edit="'+ response.user.id +'">Sửa</a><a style="margin-left: 3px" class="btn btn-danger" delete="'+ response.user.id +'">Xóa</a></td></tr>');
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
						url: '{{asset("")}}admin/user/delete/' + id,
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
				url: '{{asset("")}}admin/post/edit/' + id,
				success: function(response){
					console.log(response);
					$('#edit_id').val(response.id);
					$('#edit_name').val(response.name);
					$('#edit_email').val(response.email);
					$('input:radio[name="edit_level"][value="'+response.level+'"]').attr('checked',true);	
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

					$('#edit_title').text(title);
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