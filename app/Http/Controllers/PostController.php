<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(6);
    	return view("admin/post/index", compact('posts'));
    }

    //详情页面
    public function show(Post $post)
    {  
        return view("admin/post/show", compact('post'));
    }

    //创建页面
    public function create()
    {
        return view("admin/post/create");
    }

    //创建逻辑
    public function store()
    {
        //验证：检查输入的资料
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ],[
            'title.min' => '文章标题过短',
        ]);

        //逻辑：提交数据到post表中
        $post = Post::create(request(['title', 'content']));

        //渲染：显示或者跳转
        return redirect("/posts");
    }

    //编辑逻辑
    public function edit(Post $post)
    {
        return view("admin/post/edit", compact('post'));
    }

    //更新逻辑
    public function update(Post $post)
    {
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10',
        ]);

        //逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        //渲染
        return redirect("/posts/{$post->id}");
    }

    //删除逻辑
    public function delete(Post $post)
    {
        //TODO: 用户的权限验证
        $post->delete();

        return redirect("/posts");
    }

    //上传图片
    public function imageUpload2(Request $request)
    {
        $path = $request->file('wangEditorH5File')->storePublicly(md5(time()));
        return asset('storage/'. $path);
    }
}
