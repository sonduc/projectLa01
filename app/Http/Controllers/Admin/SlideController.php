<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Kind;
use App\Post;
use App\Comment;
use App\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        return view('admin.slide.index',[
            'slide'=>$slide,
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
        //return $request;
        if ($request->hasFile('avatar')) {
            $request->validate([
                'name'       => 'required',
                'content'     => 'required',
                'link'      => 'required',
                'avatar'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('upload/slide'), $imageName);
        }else{
            $request->validate([
                'name'       => 'required',
                'content'     => 'required',
                'link'      => 'required',
            ]);
            //$imageName='http://localhost:8800/images/posts/userDefault.png';
        }       
        $data=$request->all();
        unset($data['avatar']);
        $data['avatar'] = $imageName;
        $slide= Slide::create($data);
        return $slide;
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
        return Slide::find($id);
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
        if ($request->hasFile('avatar')) {
            $request->validate([
                'name'       => 'required',
                'content'     => 'required',
                'link'      => 'required',
                'avatar'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time().'.'.$request->avatar->getClientOriginalExtension();
            $request->avatar->move(public_path('upload/slide'), $imageName);
        }else{
            $request->validate([
                'name'       => 'required',
                'content'     => 'required',
                'link'      => 'required',
            ]);
            $old_image = Slide::find($id);
            $imageName= $old_image->avatar;
        }       
        $data=$request->all();
        unset($data['avatar']);
        $data['avatar'] = $imageName;
        $edit_slide= Slide::updateData($id,$data);
        $slide= Slide::find($id);
        return $slide;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = new Slide();
        return response()->json($slide->del($id));
    }
}
