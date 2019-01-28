<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mediaController extends Controller
{
    public function index()
    {
    	return view("admin/media/index");
    }

    public function deleteMedia(Request $request)
    {
        $data = $request->input('data');

        $data = $_SERVER['DOCUMENT_ROOT'].'/storage/images/'.$data;
        unlink($data);

        return back();
    }

    public function uploadPage()
    {
        return view("admin/media/upload");
    }
    
    public function mediaUpload(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ]);

        $extension = $request->file('select_file')->getClientOriginalExtension();
        $filenametostore = 'image_'.date('Y-m-d_H-i-s').'_'.time().'.'.$extension;
        $file_link = 'images/'.date('Y-m').'/'.$filenametostore;
        $file_path = '/storage/'.$file_link;
        Storage::put($file_link, fopen($request->file('select_file'), 'r+'), 'public');

        return back()->with('success', '成功上传图片')->with('path', $file_path);
    }

    //详情页面
    public function show(media $media)
    {  
        return view("admin/media/show", compact('media'));
    }

    public function trashs()
    {
        $medias = media::where('recycle', '2')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.media.trash', compact('medias'));
    }

    public function trash(media $media)
    {
        if($media->recycle == 1) {
            Media::where('id', $media->id)->update(['recycle' => 2]);
        }
        
        return redirect("/admin/medias/list");
    }

    public function restore(media $media)
    {
        if($media->recycle == 2) {
            media::where('id', $media->id)->update(['recycle' => 1]);
        }
        
        return redirect("/admin/medias/trashs/list");
    }


    //删除逻辑
    public function delete()
    {
        $media->delete();

        return redirect("/admin/medias/trashs/list");
    }

}
