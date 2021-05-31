<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BMedia;
use \App\Models\BMediaCategory;
use \App\Models\BSetting;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function index()
    {
        $count = BMedia::count();
        $bData = $this->page_start_end($count);
        
    	$media = BMedia::orderBy('created_at', 'desc')->paginate(10);
        $mediaCategories = BMediaCategory::orderBy('sort', 'asc')->get();

        $allSize = BMedia::sum('size_count');
        $allSize = $allSize/(1024*1024*1024);
        $allSize =  round($allSize, 4).'G';

        $setting_media_upload = BSetting::where('title', 'media_upload_box')->first();

        // return $setting_media_upload->status;

    	return view('admin.media.media', compact('media', 'mediaCategories', 'bData', 'allSize', 'setting_media_upload'));
    }

    public function category(BMediaCategory $bMediaCategory)
    {
        $count = BMedia::where( 'b_media_category_id', $bMediaCategory->id )->count();
        $bData = $this->page_start_end($count);

        $media = BMedia::where( 'b_media_category_id', $bMediaCategory->id )->orderBy('created_at', 'desc')->paginate(10);
        $mediaCategories = BMediaCategory::orderBy('sort', 'asc')->get();

        $allSize = BMedia::sum('size_count');
        $allSize = $allSize/(1024*1024*1024);
        $allSize =  round($allSize, 4).'G';

        $setting_media_upload = BSetting::where('title', 'media_upload_box')->first();

        return view('admin.media.media', compact('media', 'mediaCategories', 'bData', 'allSize', 'setting_media_upload'));
    }

    public function mediaUploadApi(Request $request, $fileName = 'select_file')
    {
        // check key
        // $this->validate($request, [
        //     'select_file'  => 'required|mimes:jpg,jpeg,png,gif,mp3,mp4,mkv,wmv,xlsx,xls,doc,docx,txt,sql,zip,rar,7z,tar,gz,iso'
        //     // 'select_file'  => 'required|max:102400'
        // ]);

        $month = date('Y-m');
        // return $request->file('select_file')->store("public/media/".date('Y-m'));

        $size_count = $request->file($fileName)->getSize();
        
        if($size_count < 1024)
        {
            $size = round($size_count, 2).' B';
        } elseif($size_count < (1024*1024))
        {
            $size = $size_count/1024;
            $size = round($size, 2).' KB';
        } elseif($size_count < (1024*1024*1024))
        {
            $size = $size_count/(1024*1024);
            $size = round($size, 2).' MB';
        } else
        {
            $size = $size_count/(1024*1024*1024);
            $size = round($size, 2).' G';
        }

        if(request('media_category') == '')
        {
            $media_category = 1;
        } else
        {
            $media_category = request('media_category');
        }

        $extension = $request->file($fileName)->getClientOriginalExtension();
        $filename = $request->file($fileName)->getClientOriginalName();
        
        // $filenametostore = 'bMedia_'.date('Ymd_His').'_'.$filename;
        $filenametostore = 'bMedia_'.date('Ymd_His').'.'.$extension;
        $file_link = '/public/media/'.$month.'/'.$filenametostore;
        Storage::put($file_link, fopen($request->file($fileName), 'r+'), 'public');

        $name = substr($filename,0,strrpos($filename,"."));

        $save = BMedia::create([
            'title' => $name,
            'fix_link' => $filenametostore,
            'month' => $month,
            'size' => $size,
            'size_count' => $size_count,
            'b_media_category_id' => $media_category,
            'b_user_id' => request('b_user_id'),
        ]);

        $data['name'] = $name;
        $data['fix_link'] = $filenametostore;
        $data['month'] = $month;
        $data['size'] = $size;
        $data['size_count'] = $size_count;
        $data['category_id'] = $media_category;
        $data['b_user_id'] = request('b_user_id');

        if($save)
        {
            $data['status'] = 'OK';
        } else
        {
            $data['status'] = 'No';
        }

        return $data;
    }
    
    public function mediaUpload(Request $request)
    {
        $this->validate($request, [
            'select_file'  => 'required|mimes:jpg,jpeg,png,gif,mp3,mp4,mkv,wmv,xlsx,xls,doc,docx,txt,sql,zip,rar,7z,tar,gz,iso'
            // 'select_file'  => 'required|max:102400'
        ]);

        $month = date('Y-m');
        // return $request->file('select_file')->store("public/media/".date('Y-m'));

        $size_count = $request->file('select_file')->getSize();
        
        if($size_count < 1024)
        {
            $size = round($size_count, 2).' B';
        } elseif($size_count < (1024*1024))
        {
            $size = $size_count/1024;
            $size = round($size, 2).' KB';
        } elseif($size_count < (1024*1024*1024))
        {
            $size = $size_count/(1024*1024);
            $size = round($size, 2).' MB';
        } else
        {
            $size = $size_count/(1024*1024*1024);
            $size = round($size, 2).' G';
        }   

        $extension = $request->file('select_file')->getClientOriginalExtension();
        $filename = $request->file('select_file')->getClientOriginalName();
        
        // $filenametostore = 'bMedia_'.date('Ymd_His').'_'.$filename;
        $filenametostore = 'bMedia_'.date('Ymd_His').'.'.$extension;
        $file_link = '/public/media/'.$month.'/'.$filenametostore;
        Storage::put($file_link, fopen($request->file('select_file'), 'r+'), 'public');

        $name = substr($filename,0,strrpos($filename,"."));

        BMedia::create([
            'title' => $name,
            'fix_link' => $filenametostore,
            'month' => $month,
            'size' => $size,
            'size_count' => $size_count,
            'b_media_category_id' => request('media_category'),
            'b_user_id' => Auth::guard("admin")->id(),
        ]);

        return redirect("/admin/media/category/".request('media_category'))->with('success', '成功上传文件');
    }

    public function imageUpload(Request $request)
    {
        $data = $this->mediaUploadApi($request, 'wangEditorH5File');

        return asset('storage/media/'.$data['month'].'/'.$data['fix_link']);
    }

    public function update()
    {
        $this->validate(request(), [
            'title' => 'required',
        ]);

        $updateKey = 'updatebAEzBQM111dfmaYg11rsaAAAjaajHI0qc333UpdateMedia';
        $updateKey1 = 'upda112teAEzBQdssAssaMmasasdasYcgr111jdd0gq333UpdateMedia';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
            BMedia::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
                'b_media_category_id' => request('b_media_category_id'),
                'b_user_id' => request('b_user_id'),
            ]);
        }

        $BMediaCategory = BMediaCategory::findOrFail(request('b_media_category_id'));

        $data = array();
        $data['id']    = request('id');
        $data['title'] = request('title');
        $data['b_media_category_id'] = request('b_media_category_id');
        $data['bMediaCategory'] = $BMediaCategory->title;
        $data['b_user_id'] = request('b_user_id');

        return $data;
    }

    public function delete()
    {
        $media = BMedia::findOrFail(request('id'));

        $deleteKey = 'deleteVkVm1aPU2111d!fdssADFGD111IbsInZhb2HVlcI0003deleteMedia';
        $deleteKey1 = 'deletDSFGDSegvf111fdg!gd3612AAaW3dx1ZSI6000bdedeleteMedia';

        $dir = $_SERVER['DOCUMENT_ROOT'].'/storage/media/'.$media->month;
        $file = scandir($dir);

        foreach (array_reverse($file) as $file) 
        {
            if($file == $media->fix_link)
            {
                $data = $dir.'/'.$media->fix_link;
                unlink($data);
            }
        }

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            if($media->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }

    public function getQuerystr($url,$key)
    {
        $res = '';
        $a = strpos($url,'?');
        if($a!==false){
            $str = substr($url,$a+1);
            $arr = explode('&',$str);
            foreach($arr as $k=>$v){
            $tmp = explode('=',$v);
                if(!empty($tmp[0]) && !empty($tmp[1])){
                    $barr[$tmp[0]] = $tmp[1];
                }
            }
        }
        if(!empty($barr[$key])){
            $res = $barr[$key];
        }
        return $res;
    }

    public function page_start_end($count)
    {
        $data = array();

        $data['allCount'] = BMedia::count();

        $url = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        $key = 'page';

        if(empty($this->getQuerystr($url,$key)) || $this->getQuerystr($url,$key) == 1)
        {
            $data['page'] = 1;
        } elseif($this->getQuerystr($url,$key) > 1 && $this->getQuerystr($url,$key) <= ceil($count/10))
        {
            $data['page'] = $this->getQuerystr($url,$key);
        } else {
            $data['page'] = ceil($count/10);
        }

        $data['start_media'] = ($data['page']-1) * 10 + 1;
        if($count == 0)
        {
            $data['start_media'] = 0;
        }

        if(($data['page'] * 10) < $count)
        {
            $data['end_media'] = $data['page'] * 10;
        } else
        {
            $data['end_media'] = $count;
        }

        return $data;
    }

    public function mediaData()
    {
        $data = array();
        $data['media'] = BMedia::orderBy('created_at', 'desc')->get();

        return $data;
    }

    public function mediaCategory()
    {
        $data = array();
        $data['media'] = BMedia::where( 'b_media_category_id', request('category') )->orderBy('created_at', 'desc')->get();

        return $data;
    }

    public function mediaUpdloadStatus()
    {

        $updateKey = 'updateAEzBQMmYg1asfsd@#$%%%dsfdsASDFDSFS1888111Media';
        $updateKey1 = 'update111eAEzBdf#@$#vddds!@$#$#@$aaaASDFDSF111111333gq111Media';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
            if(request('status') == 0)
            {
                BSetting::where( 'title', 'media_upload_box' )->first()->update([
                    'status' => 0,
                ]);

                return 0;
            }

            if(request('status') == 1)
            {
                BSetting::where( 'title', 'media_upload_box' )->first()->update([
                    'status' => 1,
                ]);

                return 1;
            }
        }
    }
}
