<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Illuminate\Support\Facades\Storage;

class categoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(20);
        return view("admin/category/index", compact('categories'));
    }
    
    //详情页面
    public function show(category $category)
    {  
        return view("admin/category/show", compact('category'));
    }

    //创建页面
    public function create()
    {
        return view("admin/category/create");
    }

    //创建逻辑
    public function store() 
    {
        //验证：检查输入的资料
        $this->validate(request(),[
            'title' => 'required|string|max:200|min:1',
            // 'content' => 'required|string|min:5',
        ],[
            'title.min' => '文章标题过短',
        ]);

        //逻辑：提交数据到category表中
        $category = Category::create(request(['title', 'content']));

        //渲染：显示或者跳转
        return redirect("admin/categories/list");
    }

    //编辑逻辑
    public function edit(Category $category)
    {
        return view("admin/category/edit", compact('category'));
    }

    //更新逻辑
    public function update(Category $category, Request $request)
    {
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:2',
            // 'content' => 'required|string|min:5',
        ]);

        //逻辑
        $category->title = request('title');
        $category->content = request('content');
        $category->save();

        //渲染
        return redirect("admin/categories/list");
    }
  
    public function imageUpload(Request $request)
    {
        $extension = $request->file('wangEditorH5File')->getClientOriginalExtension();
        $filenametostore = 'image_'.date('Y-m-d_H-i-s').'_'.time().'.'.$extension;
        $file_link = 'images/'.date('Y-m').'/'.$filenametostore;
        Storage::put($file_link, fopen($request->file('wangEditorH5File'), 'r+'), 'public');
        return asset('storage/'.$file_link);
    }

    function coverImage(Request $request, category $category)
    {
        Category::where('id', $category->id)->update(['image' => 2]);
        
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        category::where('id', $category->id)->update(['image' => 2]);

        return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }

    public function trashs()
    {
        $categories = Category::where('recycle', '2')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.category.trash', compact('categories'));
    }

    public function trash(category $category)
    {
        if($category->recycle == 1) {
            category::where('id', $category->id)->update(['recycle' => 2]);
        }
        
        return redirect("/admin/categories/list");
    }

    public function restore(Category $category)
    {
        if($category->recycle == 2) {
            Category::where('id', $category->id)->update(['recycle' => 1]);
        }
        
        return redirect("/admin/categories/trashs/list");
    }


    //删除逻辑
    public function delete(category $category)
    {
        // $this->authorize('delete', $category); //TODO: 用户的权限验证

        $category->delete();

        return redirect("/admin/categories/list");
    }

    
}
