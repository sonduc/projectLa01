<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;

use App\Http\Controllers\Controller;
use App\Comment;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin.user.index',[
            'user'=>$user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $password = Hash::make($request['password']);
        $data['password'] = $password;
        $user= User::create($data);
        return response()->json([
            'user' => $user,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return User::find($id)->except('password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new User();
        return response()->json($user->del($id));
    }
    public function getLoginAdmin(){
        return view('admin.login');
    }
    public function postLoginAdmin(Request $request){
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
        
        Auth::attempt(['email' => $request->email,'password' =>$request->password]);
        if(Auth::check()){
            return redirect()->route('category.index');

        }else{
            return redirect('admin/login')->with('thongbao','Đăng nhập Không thành công');
        }
    }

    public function getLogoutAdmin(){
        Auth::logout();
        return redirect('admin/login');
    }
}
