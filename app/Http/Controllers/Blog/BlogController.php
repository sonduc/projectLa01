<?php

namespace App\Http\Controllers\Blog;
use Illuminate\Http\Request;

use Auth;
use Validator;

use App\Http\Controllers\Controller;
use App\Category;
use App\Slide;
use App\Kind;
use App\Post;

class BlogController extends Controller
{
    public function __construct()
    {
        $category = Category::all();
        $slide = Slide::all();
        view()->share('category',$category);
        view()->share('slide',$slide);

        if(Auth::check()){
            view()->share('user',Auth::user());
        }
    }

    public function index()
    {
        return view('blog.pages.home');
    }

    public function kind($id)
    {   
        $kind = Kind::find($id);
        $post = Post::where('kind_id',$id)->paginate(5);
        return view('blog.pages.kind',[
            'kind' => $kind,
            'post' => $post,
        ]);
    }

    public function post($id)
    {
        $post = Post::find($id);
        $postImport = Post::where('important',1)->take(4)->get();
        $post_type = Post::where('kind_id',$post->kind_id)->take(5)->get();
        return view('blog.pages.post',[
            'post'=>$post,
            'postImport'=>$postImport,
            'post_type'=> $post_type
        ]);
    }

    public function getLoginBlog(){
        return view('blog.pages.login');
    }

    public function postLoginBlog(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
             'email' => 'required',
             'password' => 'required|mid:3|max:32'
         ],
         [
             'email.required' => 'Bạn chưa nhập Email',
             'password.required' => 'Bạn chưa nhập Password',
             'password.min' =>'Password không được nhỏ hơn 3 ký tự',
             'password.max' =>'Password không được lớn hơn 32 ký tự',
         ]);
        $remenber = $request->has('remenber') ? true : false;

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password], $remenber)){
            return redirect()->route('blog.index');

        }else{
            return redirect('blog/login')->with('thongbao','Sai email hoặc mật khẩu!');
        }
    }

    public function getLogoutBlog(){
        Auth::logout();
        return redirect('blog/index');
    }

    public function GetUser(){

    }
}
