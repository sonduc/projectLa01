<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
/*        $this->validate($request,
            [
                'title' => '
                required|unique:Category,title|min:3|max:100'
            ],

            [
                'title.required' => 'Bạn chưa nhập tên thể loại',
                'title.unique' => 'Tên danh mục đã tồn tại',
                'title.min' => 'Tên danh mục phải có độ dài từ 3 cho đến 100 kí tự!',
                'title.max' => 'Tên danh mục phải có độ dài từ 3 cho đến 100 kí tự!',
            ]);
        $category = new Category;
        $category->title = $request->title;
        $category->thumbnail = changeTitle($request->title);
        $category->save();
        return redirect('admin/category/index')->with('thongbao','Add thanh cong');*/
        $category = Category::storeData($request->all());
        return response()->json([
            'data' => $category
        ],200);
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
        /*$category = Category::find($id);
        return view('admin/category/edit',['category'=>$category]);*/
        return Category::find($id);
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

        // $category = new Category;
        // $category->title = $request->title;
        // $category->thumbnail = changeTitle($request->title);
        // $category->save();
        // return redirect('admin/category/edit/'. $id)->with('thongbao','Edit thanh cong');
        $data = $request->all();
        Category::updateData($id, $request->all());

        return response()->json([
            'title' => $data['title'],
            'thumbnail' => $data['thumbnail'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $category = new Category();
        return response()->json($category->del($id));
    }
}
