<?php
Route::get('/', function () {
	return view('welcome');
});
Route::get('test', function () {
	return view('blog.pages.home');
});
/*Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
*/
Route::get('admin/login','Admin\UserController@getLoginAdmin')->name('login.get');
Route::post('admin/login','Admin\UserController@postLoginAdmin')->name('login.post');
Route::get('admin/logout','Admin\UserController@getLogoutAdmin')->name('logout.get');

//Route::middleware('MyMiddleware')->group(function() {
	
	Route::prefix('admin')->group(function(){

		Route::prefix('category')->group(function(){		
			Route::get('index','Admin\CategoryController@index')->name('category.index');

			Route::get('create','Admin\CategoryController@create')->name('category.create');

			Route::post('store','Admin\CategoryController@store')->name('category.store');

			Route::get('edit/{id}','Admin\CategoryController@edit')->name('category.edit');

			Route::post('update/{id}','Admin\CategoryController@update')->name('category.update');

			Route::delete('delete/{id}','Admin\CategoryController@destroy')->name('category.delete');
		});
		Route::prefix('kind')->group(function(){		
			Route::get('index','Admin\KindController@index')->name('kind.index');

			Route::get('create','Admin\KindController@create')->name('kind.create');

			Route::post('store','Admin\KindController@store')->name('kind.store');

			Route::get('edit/{id}','Admin\KindController@edit')->name('kind.edit');

			Route::post('update/{id}','Admin\KindController@update')->name('kind.update');

			Route::delete('delete/{id}','Admin\KindController@destroy')->name('kind.delete');
		});
		Route::prefix('post')->group(function(){		
			Route::get('index','Admin\PostController@index')->name('post.index');

			Route::get('getKind/{id}','Admin\PostController@getKind')->name('post.getKind');

			Route::get('create','Admin\PostController@create')->name('post.create');

			Route::post('store','Admin\PostController@store')->name('post.store');

			Route::get('edit/{id}','Admin\PostController@edit')->name('post.edit');

			Route::post('update/{id}','Admin\PostController@update')->name('post.update');

			Route::delete('delete/{id}','Admin\PostController@destroy')->name('post.delete');
		});
		Route::prefix('slide')->group(function(){		
			Route::get('index','Admin\SlideController@index')->name('slide.index');

			Route::get('create','Admin\SlideController@create')->name('slide.create');

			Route::post('store','Admin\SlideController@store')->name('slide.store');

			Route::get('edit/{id}','Admin\SlideController@edit')->name('slide.edit');

			Route::post('update/{id}','Admin\SlideController@update')->name('slide.update');

			Route::delete('delete/{id}','Admin\SlideController@destroy')->name('slide.delete');
		});
		Route::prefix('user')->group(function(){		
			Route::get('index','Admin\UserController@index')->name('user.index');

			Route::get('create','Admin\UserController@create')->name('user.create');

			Route::post('store','Admin\UserController@store')->name('user.store');

			Route::get('edit/{id}','Admin\UserController@edit')->name('user.edit');

			Route::post('update/{id}','Admin\UserController@update')->name('user.update');

			Route::delete('delete/{id}','Admin\UserController@destroy')->name('user.delete');
		});
	});
// });

Route::get('blog/login','Blog\BlogController@getLoginBlog')->name('loginBlog.get');
Route::post('blog/login','Blog\BlogController@postLoginBlog')->name('loginBlog.post');
Route::get('blog/logout','Blog\BlogController@getLogoutBlog')->name('logoutBlog.get');

Route::prefix('blog')->group(function(){
	Route::get('index','Blog\BlogController@index')->name('blog.index');
	Route::get('kind/{id}/{thumbnail}.html','Blog\BlogController@kind')->name('blog.kind');
	Route::get('post/{id}/{thumbnail}.html','Blog\BlogController@post')->name('blog.post');
	Route::get('user','Blog\BlogController@GetUser');
});
Route::post('comment/{id}','Admin\CommentController@postComment')->name('blog.comment');

Route::get('auth/google', 'Auth\GoogleController@redirectToProvider');
Route::get('auth/google/callback', 'Auth\GoogleController@handleProviderCallback');