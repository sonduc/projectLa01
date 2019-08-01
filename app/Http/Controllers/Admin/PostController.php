<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use App\Kind;
use App\Post;
use App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $kind = Kind::all();
        $post = Post::orderBy('id','DESC')->get();
        return view('admin.post.index',[
            'post' => $post,
            'kind'=>$kind,
            'category' =>$category
        ]);
    }
    public function getKind($id){
        $kind = Kind::where('category_id',$id)->get();
        $str = "";
        foreach ($kind as $value) {
            $str .= "<option value='".$value->id."'>".$value->title."</option>";
        }
        return $str;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {

            $request->validate([
                'title'       => 'required',
                'thumbnail'   => 'required',
                'summary'     => 'required',
                'content'     => 'required',
                'important'   => 'required',
                'kind_id'     => 'required',
                'amount'      => 'required',
                'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/post'), $imageName);
        }else{
            $request->validate([
                'title'       => 'required',
                'thumbnail'   => 'required',
                'summary'     => 'required',
                'content'     => 'required',
                'important'   => 'required',
                'kind_id'     => 'required',
                'amount'      => 'required',

            ]);
            //$path='http://localhost:8800/images/posts/userDefault.png';
            $imageName='imageDefault.jpg';
        }       
        $data=$request->all();
        unset($data['image']);
        $data['image'] = $imageName;
        $post= Post::create($data);
        $kind = Kind::find($post->kind_id);
        $category = Category::find($kind->category_id);
        return response()->json([
            'post' => $post,
            'kind' => $kind,
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $kind = Kind::find($post->kind_id);
        $category = Category::find($kind->category_id);
        return response()->json([
            'post' => $post,
            'category' => $category,
        ]);
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
        
        if ($request->hasFile('image')) {

            $request->validate([
                'title'       => 'required',
                'thumbnail'   => 'required',
                'summary'     => 'required',
                'content'     => 'required',
                'important'   => 'required',
                'kind_id'     => 'required',
                'amount'      => 'required',
                'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/post'), $imageName);
        }else{
            $request->validate([
                'title'       => 'required',
                'thumbnail'   => 'required',
                'summary'     => 'required',
                'content'     => 'required',
                'important'   => 'required',
                'kind_id'     => 'required',
                'amount'      => 'required',
            ]);
            $old_image = Post::find($id);
            $imageName= $old_image->image;
        }       
        $data=$request->all();
        unset($data['image']);
        $data['image'] = $imageName;
        $edit_post= Post::updateData($id,$data);
        $post= Post::find($id);
        $kind = Kind::find($post->kind_id);
        $category = Category::find($kind->category_id);
        return response()->json([
            'post' => $post,
            'kind' => $kind,
            'category' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = new Post();
        return response()->json($post->del($id));
    }
}
