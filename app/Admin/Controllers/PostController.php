<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        // $post = post::first();
        // echo $post->id;
        // echo '<hr/>';
        // echo $post->category->id;

        $posts = Post::where('recycle', '1')->orderBy('created_at', 'desc')->paginate(20);
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
            'title' => 'required|string|max:200|min:1',
            // 'content' => 'required|string|min:5',
        ],[
            'title.min' => '文章标题过短',
        ]);

        //逻辑：提交数据到post表中
        $post = Post::create(request(['title', 'content', 'image']));

        //渲染：显示或者跳转
        return redirect("admin/posts/list");
    }

    //编辑逻辑
    public function edit(Post $post)
    {
        return view("admin/post/edit", compact('post'));
    }

    //更新逻辑
    public function update(Post $post, Request $request)
    {
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:2',
            // 'content' => 'required|string|min:5',
        ]);

        //逻辑
        $post->title = request('title');
        $post->content = request('content');
        $post->image = request('image');
        $post->save();

        //渲染
        return redirect("admin/post/{$post->id}");
    }
  
    public function imageUpload(Request $request)
    {
        $extension = $request->file('wangEditorH5File')->getClientOriginalExtension();
        $filenametostore = 'image_'.date('Y-m-d_H-i-s').'_'.time().'.'.$extension;
        $file_link = 'images/'.date('Y-m').'/'.$filenametostore;
        Storage::put($file_link, fopen($request->file('wangEditorH5File'), 'r+'), 'public');
        return asset('storage/'.$file_link);
    }

    function coverImage(Request $request, Post $post)
    {
        Post::where('id', $post->id)->update(['image' => 2]);
        
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);



        // $change = Post::where('name', \Auth::guard("admin")->user()->name)->update([ 'password' => bcrypt(request('password')) ]);
        Post::where('id', $post->id)->update(['image' => 2]);

        // if ( $change )
        // {
        //     return redirect("admin/setting")->withErrors("修改密码成功");
        // } else 
        // {
        //     return redirect("admin/setting")->withErrors("修改密码失败");
        // }

        return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }

    public function trashs()
    {
        $posts = Post::where('recycle', '2')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.post.trash', compact('posts'));
    }

    public function trash(Post $post)
    {
        if($post->recycle == 1) {
            Post::where('id', $post->id)->update(['recycle' => 2]);
        }
        
        return redirect("/admin/posts/list");
    }

    public function restore(Post $post)
    {
        if($post->recycle == 2) {
            post::where('id', $post->id)->update(['recycle' => 1]);
        }
        
        return redirect("/admin/posts/trashs/list");
    }


    //删除逻辑
    public function delete(Post $post)
    {
        // $this->authorize('delete', $post); //TODO: 用户的权限验证

        $post->delete();

        return redirect("/admin/posts/trashs/list");
    }

    public function search_display_post_id(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '1'], ['id', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.index', compact('posts'));
    }

    public function search_display_post_title(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '1'], ['title', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.index', compact('posts'));
    }
    
    public function search_display_post_category(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '1'], ['category', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.index', compact('posts'));
    }
    
    public function search_display_post_created_at(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '1'], ['created_at', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.index', compact('posts'));
    }

    public function search_hide_post_id(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '2'], ['id', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.trash', compact('posts'));
    }

    public function search_hide_post_title(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '2'], ['title', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.trash', compact('posts'));
    }
    
    public function search_hide_post_category(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '2'], ['category', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.trash', compact('posts'));
    }
    
    public function search_hide_post_created_at(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $posts = Post::where([ ['recycle', '2'], ['created_at', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.post.trash', compact('posts'));
    }
    
}
