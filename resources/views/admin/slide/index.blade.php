@extends('admin.layouts.master')
@section('content_index')
<h1 style="color: gray;margin-left: 15px;margin-top: 15px;">Slide</h1>
<button style="margin-bottom: 15px; margin-left: 15px" class="btn btn-primary" id="them" data-toggle="modal" href="#add">Thêm mới</button>
<table id="myTable" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Tên </th>
			<th>Nội dung</th>
			<th>Hình</th>
			<th>Link</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody id="slide">
		@foreach ($slide as $value)
		<tr id="tr-{{ $value->id }}">

			<th>{{ $value->id }}</th>
			<td>{{ $value->name }}</td>
			<td>{!! $value->content !!}</td>
			<td>
				<img width="200px" src="{{ asset('') }}upload/slide/{{$value->avatar}} ">
			</td>
			<td>{{ $value->link }}</td>
			<td>
				<button class="btn btn-sm btn-warning" edit="{{ $value->id }}">Sửa</button>
				<button class="btn btn-sm btn-danger" delete="{{ $value->id }}">Xóa</button>
			</td>

		</tr>
		@endforeach
	</tbody>		
</table>

<div class="modal fade" id="add">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Slide</h4>
			</div>
			<div class="modal-body">
				<form id="add_new" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}		
					<div class="form-group">
						<label for="">Tên Slide</label>
						<input type="text" class="form-control" name="name" id="name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control ckeditor" name="content" id="content"></textarea>
					</div>
					<div class="form-group">
						<label for="">Hình</label>
						<input type="file" class="form-control" name="avatar" id="avatar">
					</div>
					<div class="form-group">
						<label for="">Link</label>
						<input type="text" class="form-control" name="link" id="link" placeholder="Nhập">
					</div>
					<button type="submit" class="btn btn-primary">Thêm</button>
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="editP">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Slide</h4>
			</div>
			<div class="modal-body">
				<form id="edit_new" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<input type="hidden" name="" id="edit_id">
					<div class="form-group">
						<label for="">Tên Slide</label>
						<input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control ckeditor" name="edit_content" id="edit_content"></textarea>
					</div>
					<div class="form-group">
						<label for="">Hình:</label>
						<br>
						<img style="margin-bottom: 3px" width="100px" id="old_image" src="">
						<input type="file" class="form-control" name="edit_avatar" id="edit_avatar">
					</div>
					<div class="form-group">
						<label for="">Link</label>
						<input type="text" class="form-control" name="edit_link" id="edit_link" placeholder="Nhập">
					</div>
					<button type="submit" class="btn btn-primary">Sửa</button>
					<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
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
			var file = $('#avatar').get(0).files[0];
			var content = CKEDITOR.instances.content.getData();		
			var newPost = new FormData();
			newPost.append('name',$('#name').val());
			newPost.append('content',content);	
			newPost.append('link',$('#link').val());				
			newPost.append('avatar',file);	
			console.log(file);
			$.ajax({				
				type: 'post',
				url: '{{asset('admin/slide/store')}}',
				data: newPost,
				dataType:'json',
				async:false,
				processData: false,
				contentType: false,
				success: function (response){
					console.log(response);
					$('#add').modal('hide');
					$('#name').text("");

					toastr.success('Thành công!');

					var html=
					'<tr id="tr-'+response.id+'>"'+
					'<td><b>'+response.id+'</b></td>'+
					'<td><b>'+response.id+'</b></td>'+
					'<td>'+response.name+'</td>'+
					'<td>'+response.content+'</td>'+
					'<td><img width="200px" src="{{asset('')}}upload/slide/'+response.avatar+'"></td>'+				
					'<td>'+response.link+'</td>'+
					'<td>'+
					'<button class="btn btn-sm btn-warning" edit="'+ response.id +'">Sửa</button>'+
					'<button style="margin-left: 2px" class="btn btn-sm btn-danger" delete="'+ response.id +'">Xóa</button>'+
					'</td>'+
					'</tr>';

						// consosole.log(html);
						$('#slide').prepend(html);
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
					$.ajax({
						type: "delete",
						url: '{{asset("")}}admin/slide/delete/' + id,
						success: function(res)
						{
							toastr.success('Bài viết đã được xóa!', "");
							$('#tr-' + id).remove();
						},
						error: function (){

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
				url: '{{asset("")}}admin/slide/edit/' + id,
				success: function(response){
					//console.log(response);
					$('#edit_id').val(response.id);
					$('#edit_name').val(response.name);
					$('#old_image').attr('src','{{asset('')}}upload/slide/'+response.avatar+'');
					CKEDITOR.instances.edit_content.setData(response.content);	
					$('#edit_link').val(response.link);	
				}
			})
		});
		$('#edit_new').on('submit',function(e) {
			e.preventDefault();
			var id = $('#edit_id').val();

			var file = $('#edit_avatar').get(0).files[0];
			var content = CKEDITOR.instances.edit_content.getData();		
			var newPost = new FormData();
			newPost.append('name',$('#edit_name').val());
			newPost.append('content',content);	
			newPost.append('link',$('#edit_link').val());				
			newPost.append('avatar',file);	

			$.ajax({
				type: 'post',
				url: '{{asset("")}}admin/slide/update/' + id,
				data: newPost,
				dataType:'json',
				async:false,
				processData: false,
				contentType: false,
				success: function (response){
					$('#editP').modal('hide');

					toastr.success('Sửa thành công!');
					
					console.log(response);
					toastr.success('Sửa thành công!');
					$('#tr-' + id).replaceWith(
						'<td><b>'+id+'</b></td>'+
						'<td>'+response.name+'</td>'+							
						'<td>'+response.content+'</td>'+
						'<td><img width="200px" src="{{asset('')}}upload/slide/'+response.avatar+'"></td>'+
						'<td>'+response.link+'</td>'+
						'<td>'+
						'<button class="btn btn-sm btn-warning" edit="'+id+'">Sửa</button>'+
						'<button style="margin-left: 3px" class="btn btn-sm btn-danger" delete="'+id+'">Xóa</button>'+
						'</td>'
						);	
				},
				error: function (error) {
					//500
				}
			})
		});
	})
</script>
@endsection