<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Page;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::where('recycle', '1')->orderBy('created_at', 'desc')->paginate(20);
    	return view("admin/page/index", compact('pages'));
    }
    
    //详情页面
    public function show(Page $page)
    {  
        return view("admin/page/show", compact('page'));
    }

    //创建页面
    public function create()
    {
        return view("admin/page/create");
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

        //逻辑：提交数据到page表中
        $page = Page::create(request(['title', 'content']));

        //渲染：显示或者跳转
        return redirect("admin/pages/list");
    }

    //编辑逻辑
    public function edit(Page $page)
    {
        return view("admin/page/edit", compact('page'));
    }

    //更新逻辑
    public function update(Page $page, Request $request)
    {
        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:2',
            // 'content' => 'required|string|min:5',
        ]);

        //逻辑
        $page->title = request('title');
        $page->content = request('content');
        $page->save();

        //渲染
        return redirect("admin/page/{$page->id}");
    }
  
    public function imageUpload(Request $request)
    {
        $extension = $request->file('wangEditorH5File')->getClientOriginalExtension();
        $filenametostore = 'image_'.date('Y-m-d_H-i-s').'_'.time().'.'.$extension;
        $file_link = 'images/'.date('Y-m').'/'.$filenametostore;
        Storage::put($file_link, fopen($request->file('wangEditorH5File'), 'r+'), 'public');
        return asset('storage/'.$file_link);
    }

    function coverImage(Request $request, Page $page)
    {
        page::where('id', $page->id)->update(['image' => 2]);
        
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $image = $request->file('select_file');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        page::where('id', $page->id)->update(['image' => 2]);

        return back()->with('success', 'Image Uploaded Successfully')->with('path', $new_name);
    }

    public function trashs()
    {
        $pages = Page::where('recycle', '2')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.page.trash', compact('pages'));
    }

    public function trash(Page $page)
    {
        if($page->recycle == 1) {
            page::where('id', $page->id)->update(['recycle' => 2]);
        }
        
        return redirect("/admin/pages/list");
    }

    public function restore(Page $page)
    {
        if($page->recycle == 2) {
            page::where('id', $page->id)->update(['recycle' => 1]);
        }
        
        return redirect("/admin/pages/trashs/list");
    }


    //删除逻辑
    public function delete(Page $page)
    {
        // $this->authorize('delete', $page); //TODO: 用户的权限验证

        $page->delete();

        return redirect("/admin/pages/trashs/list");
    }

    public function search_display_page_id(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '1'], ['id', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.index', compact('pages'));
    }

    public function search_display_page_title(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '1'], ['title', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.index', compact('pages'));
    }
    
    public function search_display_page_category(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '1'], ['category', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.index', compact('pages'));
    }
    
    public function search_display_page_created_at(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '1'], ['created_at', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.index', compact('pages'));
    }

    public function search_hide_page_id(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '2'], ['id', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.trash', compact('pages'));
    }

    public function search_hide_page_title(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '2'], ['title', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.trash', compact('pages'));
    }
    
    public function search_hide_page_category(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '2'], ['category', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.trash', compact('pages'));
    }
    
    public function search_hide_page_created_at(Request $request)
    {
        $search = $request->input('s');

        if (empty($search)) {
            $pages = Page::orderBy('created_at', 'desc')->paginate(10);
        } else { 
            $pages = Page::where([ ['recycle', '2'], ['created_at', 'like', "%$search%"], ])->orderBy('created_at', 'desc')->paginate(10);
        }
        
        return view('admin.page.trash', compact('pages'));
    }
    
}
