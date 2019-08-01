<!-- SEARCH --> 
{{-- @php
echo "<pre>";
print_r(Auth::user());
@endphp --}}
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" style="margin-top: 0px;margin-bottom: 0px;border-radius: 0;padding-bottom: 0;padding-top: 0;background:#222">
	<div class="navbar-header">
		<a style="color: gray" class="navbar-brand" href="{{ route('blog.index') }}">LARAVEL-09</a>
	</div>

	<form class="form-inline" action="#" style="line-height: 3;float: left;">
		<input class="form-control" type="text" placeholder="Search">
		<button class="btn btn-success" type="submit">Search</button>  
	</form>
	
	<ul class="nav navbar-nav navbar-right" style="padding-top: 0;padding-bottom: 0">
		
		@if (!Auth::check())
			<li>
				<a style="color: gray" href="#"><span class="glyphicon glyphicon-pencil"></span>
					Đăng ký
				</a>
			</li>
			<li>
				<a style="color: gray" href="{{ route('loginBlog.get') }}"><span class="glyphicon glyphicon-log-in"></span>
					Đăng nhập
				</a>
			</li>
		@else
			<li>
				<a style="color: gray"><span class="glyphicon glyphicon-user"></span>
					{!! Auth::user()->name !!}
				</a>
			</li>
			<li>
				<a style="color: gray" href="{{ route('logoutBlog.get') }}"><span class="glyphicon glyphicon-log-out"></span>
					Đăng xuất
				</a>
			</li>
		@endif
	</ul>
</nav>