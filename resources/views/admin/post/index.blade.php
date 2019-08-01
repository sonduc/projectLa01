@extends('admin.layouts.master')
@section('content_index')
<h1 style="color: gray;margin-left: 15px;margin-top: 15px;">Bài Đăng</h1>
<button style="margin-bottom: 15px; margin-left: 15px" class="btn btn-primary" id="them" data-toggle="modal" href="#add">Thêm mới</button>
<table id="myTable" class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Tiêu đề</th>
			<th>Ảnh</th>
			<th>Tóm tắt</th>
			<th>Danh mục</th>
			<th>Thể loại</th>
			<th>Nổi bật</th>
			<th>Hành động</th>
		</tr>
	</thead>
	<tbody id="post">
		@foreach ($post as $value)

		<tr id="tr-{{ $value->id }}">
			<td><b>{{ $value->id }}</b></td>
			<td><p>{{ $value->title }}</p></td>
			<td>
				<img width="100px" src="{{asset('')}}upload/post/{{ $value->image }}">
			</td>
			<td>{!! $value->summary !!}</td>
			<td>{{ $value->Kind->Category->title }}</td>
			<td>{{ $value->Kind->title }}</td>
			<td>{{ $value->important }}</td>
			<td>
				<button class="btn btn-sm btn-warning" edit="{{ $value->id }}">Sửa</button>
				<button style="margin-top: 2px" class="btn btn-sm btn-danger" delete="{{ $value->id }}">Xóa</button>
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
				<h4 class="modal-title">Bài Đăng</h4>
			</div>
			<div class="modal-body" >
				<form id="add_new" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label >Danh mục</label>
						<select name="Category" class="form-control" id="danhMuc">
							@foreach ($category as $value)
							<option value="{{$value->id}}">{{ $value->title }}</option>
							@endforeach						
						</select>
					</div>
					<div class="form-group">
						<label >Thể loại</label>
						<select name="Category" class="form-control" id="theLoai">
							@foreach ($kind as $value)
							<option value="{{$value->id}}">{{ $value->title }}</option>
							@endforeach	
						</select>
					</div>			
					<div class="form-group">
						<label for="">Tiêu đề</label>
						<input type="text" class="form-control" name="title" id="title" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Thumbnail</label>
						<input type="text" class="form-control" name="thumbnail" id="thumbnail" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Ảnh</label>
						<input type="file" class="form-control" name="image" id="image" placeholder="Nhập">
					</div>
					<div class="form-group">
						<label for="">Tóm tắt</label>
						<textarea class="form-control ckeditor" name="summary" id="summary"></textarea>
					</div>
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control ckeditor" name="content" id="content"></textarea>
					</div>
					<div class="form-group">
						<label for="">Nổi bật</label>	
						<label class="radio-inline">
							<input type="radio" name="important" value="1" class="important" checked="">Có
						</label>
						<label class="radio-inline">
							<input type="radio" name="important" value="0" class="important">Không
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
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Bài Đăng</h4>
			</div>
			<div class="modal-body">
				<form id="edit_new" method="POST" role="form" enctype="multipart/form-data">
					{{csrf_field()}}
					<input type="hidden" name="" id="edit_id">
					<div class="form-group">
						<label >Danh mục</label>
						<select name="Category" class="form-control" id="edit_category">
							@foreach ($category as $value)
							<option value="{{$value->id}}">{{ $value->title }}</option>
							@endforeach						
						</select>
					</div>
					<div class="form-group">
						<label >Thể loại</label>
						<select name="Category" class="form-control" id="edit_kind">
							@foreach ($kind as $value)
							<option value="{{$value->id}}">{{ $value->title }}</option>
							@endforeach	
						</select>
					</div>			
					<div class="form-group">
						<label for="">Tiêu đề</label>
						<input type="text" class="form-control" name="title" id="edit_title">
					</div>
					<div class="form-group">
						<label for="">Thumbnail</label>
						<input type="text" class="form-control" name="thumbnail" id="edit_thumbnail">
					</div>
					<div class="form-group">
						<label for="">Ảnh:</label>
						<br>
						<img style="margin-bottom: 3px" width="100px" id="old_image" src="">
						<input type="file" class="form-control" name="edit_image" id="edit_image">
					</div>
					<div class="form-group">
						<label for="">Tóm tắt</label>
						<textarea class="form-control ckeditor" name="editSummary" id="editSummary"></textarea>
					</div>
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control ckeditor" name="editContent" id="editContent"></textarea>
					</div>
					<div class="form-group">
						<label for="">Nổi bật</label>	
						<label class="radio-inline">
							<input type="radio" name="edit_important" value="1" class="edit_important" checked="">Có
						</label>
						<label class="radio-inline">
							<input type="radio" name="edit_important" value="0" class="edit_important">Không
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
		$('#danhMuc').on('change',function(e){
			var id =$(this).val();
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '{{asset('')}}admin/post/getKind/'+id,
				data: {
				},
				success: function(res){
					$('#theLoai').html(res);
				},
			})
		});
		$('#edit_category').on('change',function(e){
			var id =$(this).val();
			e.preventDefault();
			$.ajax({
				type: 'get',
				url: '{{asset('')}}admin/post/getKind/'+id,
				data: {
				},
				success: function(res){
					$('#edit_kind').html(res);
				},
			})
		});
		$('#add_new').on('submit',function(e) {
			e.preventDefault();
			var file = $('#image').get(0).files[0];
			var summary = CKEDITOR.instances.summary.getData();
			var content = CKEDITOR.instances.content.getData();
			var newPost = new FormData();
			newPost.append('kind_id',$('#theLoai').val());
			newPost.append('title',$('#title').val());
			newPost.append('thumbnail',$('#thumbnail').val());
			newPost.append('amount',0);
			newPost.append('summary',summary);
			newPost.append('content',content);			
			newPost.append('important',$('.important:checked').val());
			newPost.append('image',file);
			$.ajax({				
				type: 'post',
				url: '{{asset('admin/post/store')}}',
				data: newPost,
				dataType:'json',
				async:false,
				processData: false,
				contentType: false,
				success: function (response){
					$('#add').modal('hide');
					console.log(response);
					toastr.success('Thành công!');

					var html=
					'<tr id="tr-'+response.post.id+'>"'+
					'<td><b>'+response.post.id+'</b></td>'+
					'<td><b>'+response.post.id+'</b></td>'+
					'<td>'+response.post.title+'</td>'+
					'<td><img width="100px" src="{{asset('')}}upload/post/'+response.post.image+'"></td>'+					
					'<td>'+response.post.summary+'</td>'+
					'<td>'+response.category.title+'</td>'+
					'<td>'+response.kind.title+'</td>'+
					'<td>'+response.post.important+'</td>'+
					'<td>'+
					'<button class="btn btn-sm btn-warning" edit="'+ response.post.id +'">Sửa</button>'+
					'<button style="margin-top: 2px" class="btn btn-sm btn-danger" delete="'+ response.post.id +'">Xóa</button>'+
					'</td>'+
					'</tr>';

						// consosole.log(html);
						$('#post').prepend(html);
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
						url: '{{asset("")}}admin/post/delete/' + id,
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
				url: '{{asset("")}}admin/post/edit/' + id,
				success: function(response){
					$('#edit_id').val(response.post.id);
					$('#edit_category').val(response.category.id);
					$('#edit_kind').val(response.post.kind_id);
					$('#edit_title').val(response.post.title);	
					$('#edit_thumbnail').val(response.post.thumbnail);	
					CKEDITOR.instances.editSummary.setData(response.post.summary);
					CKEDITOR.instances.editContent.setData(response.post.content);	
					$('input:radio[name="edit_important"][value="'+response.post.important+'"]').attr('checked',true);
					$('#old_image').attr('src','{{asset('')}}upload/post/'+response.post.image+'');
				}
			})
			
		});
		$('#edit_new').on('submit',function(e) {
			e.preventDefault();
			var id = $('#edit_id').val();
			var file = $('#edit_image').get(0).files[0];
			var summary = CKEDITOR.instances.editSummary.getData();
			var content = CKEDITOR.instances.editContent.getData();
			var newPost = new FormData();
			newPost.append('kind_id',$('#edit_kind').val());
			newPost.append('title',$('#edit_title').val());
			newPost.append('thumbnail',$('#edit_thumbnail').val());
			newPost.append('amount',0);
			newPost.append('summary',summary);
			newPost.append('content',content);			
			newPost.append('important',$('.edit_important:checked').val());
			newPost.append('image',file);
			$.ajax({
				type: 'post',
				url: '{{asset("")}}admin/post/update/' + id,
				data: newPost,
				dataType:'json',
				async:false,
				processData: false,
				contentType: false,
				success: function (response){
					$('#editP').modal('hide');
					//console.log(response);
					toastr.success('Sửa thành công!');
					$('#tr-' + id).replaceWith(
						'<td><b>'+id+'</b></td>'+
						'<td>'+response.post.title+'</td>'+
						'<td><img width="100px" src="{{asset('')}}upload/post/'+response.post.image+'"></td>'+					
						'<td>'+response.post.summary+'</td>'+
						'<td>'+response.category.title+'</td>'+
						'<td>'+response.kind.title+'</td>'+
						'<td>'+response.post.important+'</td>'+
						'<td>'+
						'<button class="btn btn-sm btn-warning" edit="'+id+'">Sửa</button>'+
						'<button style="margin-top: 2px" class="btn btn-sm btn-danger" delete="'+id+'">Xóa</button>'+
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