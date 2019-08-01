@extends('admin.layouts.master')
@section('content_index')
	
	@if (count($errors) >0)
		<div class="alert alert-danger" style="width: 350px">
			@foreach ($errors->all() as $err)
				{{$err}}<br>
			@endforeach
		</div>
	@endif
	
	@if (session('thongbao'))
		<div class="alert alert-success" style="width: 150px">
			{{session('thongbao')}}
		</div>
	@endif

	<form action="{{ route('category.store') }}" method="POST" role="form" style="width: 500px">
		@csrf
		<legend>Danh mục</legend>
	
		<div class="form-group">
			<label for="">Tên danh mục</label>
			<input type="text" class="form-control" name="title" placeholder="Nhập">
		</div>
	
	
		<button type="submit" class="btn btn-primary">Thêm</button>
		<button type="reset" class="btn btn-primary">Làm mới</button>
	</form>
@endsection