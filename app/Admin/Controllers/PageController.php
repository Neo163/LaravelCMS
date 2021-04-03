<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BUser;
use \App\Models\BPage;
use \App\Models\BPageParagraph;
use \App\Models\BMedia;
use \App\Models\BMediaCategory;
use \App\Models\BTemplate;

class PageController extends Controller
{
	public function index()
	{
		$pages = BPage::paginate(20);

		return view("admin.page.page", compact('pages'));
	}

    public function add()
    {
        // media start
        $count = BMedia::count();
        $bData = $this->page_start_end($count);
        
        $media = BMedia::orderBy('created_at', 'desc')->get();
        $mediaCategories = BMediaCategory::orderBy('sort', 'asc')->get();
        // media end

        return view("admin.page.add", compact('media', 'mediaCategories', 'bData'));
    }

    public function templatesData()
    {
        $data = array();
        $data['templates'] = BTemplate::where( 'b_templates_category', 2 )->orderBy('created_at', 'desc')->get();

        return $data;
    }

    public function contentStatus(BPage $bpage)
    {
        if($bpage->content_show == 0)
        {
            BPage::where( 'id', $bpage->id )->first()->update([
                'content_show' => 1,
            ]);

            return 'OK';
        } else
        {
            BPage::where( 'id', $bpage->id )->first()->update([
                'content_show' => 0,
            ]);
            return 'No';
        }

        return 'No';
    }

	public function create(Request $request)
    {
        // $str = substr(request('template'), 25);
        // $template = substr($str,0,strlen($str)-7);

        $this->validate(request(), [
            'title' => 'required|min:1'
        ]);

        $structure['text'] = request('content_num_text');
        $structure['image'] = request('content_num_image');
        $structure['video'] = request('content_num_video');
        $slider = request('content_num_slider');

        if($slider > 0)
        {
            $structure['slider']['number'] = $slider;

            for($i=1; $i<=$slider; $i++)
            {
                $structure['slider']['slider'.$i] = request('content_num_slider'.$i);
            }
        }

        if(request('content_num_slider') <= 0)
        {
            $structure['slider']['number'] = 0;
        }

        $structure = json_encode($structure);

        $countMax = BPage::max('id');

        if($countMax > 0)
        {
            $id = $countMax+1;

            // 事务
            BPage::create([
                'id' => $id,
                'title' => request('title'),
                'content' => request('content'),
                'image' => request('image'),
                'structure' => $structure,
                'template' => request('front_end_template'),
                'b_user_id' => Auth::guard("admin")->id(),
            ]);

            if(!empty($request['data']))
            {
                foreach ($request['data'] as $key => $data)
                {
                    if($data == null)
                    {
                        $data = '';
                    }

                    $category = $this->page_paragraph_category($key);

                    $create = BPageParagraph::create([
                        'title' => $key,
                        'content' => $data,
                        'category' => $category,
                        'b_page_id' => $id
                    ]);

                    if(!$create)
                    {
                        return 'create faile';
                    }
                }
            }
        } else
        {
            // 事务
            BPage::create([
                'title' => request('title'),
                'content' => request('content'),
                'image' => request('image'),
                'structure' => $structure,
                'template' => request('front_end_template'),
                'b_user_id' => Auth::guard("admin")->id(),
            ]);

            $countMax = BPage::max('id');

            if(!empty($request['data']))
            {
                foreach ($request['data'] as $key => $data)
                {
                    if($data == null)
                    {
                        $data = '';
                    }

                    $category = $this->page_paragraph_category($key);

                    $create = BPageParagraph::create([
                        'title' => $key,
                        'content' => $data,
                        'category' => $category,
                        'b_page_id' => $countMax
                    ]);

                    if(!$create)
                    {
                        return 'create faile';
                    }
                }
            }
        }

        return redirect("/admin/pages");
    }

    public function page_paragraph_category($key)
    {
        // text, image, slider video
        $category = substr($key, 0 , 4);

        if(substr($key, 0 , 4) == 'text')
        {
            $category = 'text';
        }

        if(substr($key, 0 , 5) == 'image')
        {
            $category = 'image';
        }

        if(substr($key, 0 , 6) == 'slider')
        {
            $category = 'slider';
        }

        if(substr($key, 0 , 5) == 'video')
        {
            $category = 'video';
        }

        return $category;
    }

    public function edit(BPage $bpage)
    {
        // media start
        $count = BMedia::count();
        $bData = $this->page_start_end($count);
        
        $media = BMedia::orderBy('created_at', 'desc')->paginate(10);
        $mediaCategories = BMediaCategory::orderBy('sort', 'asc')->get();
        // media end

        return view("admin.page.edit", compact('bpage','media', 'mediaCategories', 'bData'));
    }

    public function editData()
    {
        $data = array();
        $json = array();

        $bpage = BPage::findOrFail(request('id'));
        $data['bpage'] = $bpage;

        $countPara = BPageParagraph::where('b_page_id', request('id'))->count();
        
        if($countPara > 0)
        {
            $BPageParagraph = BPageParagraph::where('b_page_id', request('id'))->get();
        
            foreach ($BPageParagraph as $key => $para)
            {
                // $json[$para['title']] = $para['content'];

                if(substr($para['title'] , 0 , 4) == 'text')
                {
                    $json['text'][$para['title']] = $para['content'];
                }

                if(substr($para['title'] , 0 , 5) == 'image')
                {
                    $json['image'][$para['title']] = $para['content'];
                }

                if(substr($para['title'] , 0 , 5) == 'video')
                {
                    $json['video'][$para['title']] = $para['content'];
                }

                if(substr($para['title'] , 0 , 6) == 'slider')
                {
                    $json['slider'][$para['title']] = $para['content'];
                }
            }

            $data['paragraph'] = json_encode($json);
        }

        return $data;
    }

    public function update(BPage $bpage, Request $request)
    {
        // return $bpage->id;
        $this->validate(request(), [
            'title' => 'required',
        ]);

        // $this->authorize('update_note', $note);

        $structure['text'] = request('content_num_text');
        $structure['image'] = request('content_num_image');
        $structure['video'] = request('content_num_video');
        $slider = request('content_num_slider');

        if($slider > 0)
        {
            $structure['slider']['number'] = $slider;

            for($i=1; $i<=$slider; $i++)
            {
                $structure['slider']['slider'.$i] = request('content_num_slider'.$i);
            }
        }

        if(request('content_num_slider') <= 0)
        {
            $structure['slider']['number'] = 0;
        }

        $structure = json_encode($structure);

        // 更新页面主体
        BPage::where( 'id', $bpage->id )->first()->update([
            'title' => request('title'),
            'content' => request('content'),
            'image' => request('image'),
            'structure' => $structure,
            'template' => request('front_end_template'),
            'b_user_id' => Auth::guard("admin")->id(),
        ]);

        // 更新当前页面的句子
        if(!empty($request['data']))
        {
            foreach ($request['data'] as $key => $data)
            {
                $BPageParagraph = BPageParagraph::where([ 
                    ['b_page_id', $bpage->id], 
                    ['title', $key] 
                ]);

                $category = $this->page_paragraph_category($key);

                if($BPageParagraph->count() > 0)
                {
                    $BPageParagraph->first()->update([
                        'content' => $data,
                        'category' => $category,
                    ]);
                }

                if($BPageParagraph->count() == 0)
                {
                    $create = BPageParagraph::create([
                        'title' => $key,
                        'content' => $data,
                        'category' => $category,
                        'b_page_id' => $bpage->id,
                    ]);

                    if(!$create)
                    {
                        return 'create faile';
                    }
                }

            }
        }

        return back();
    }

    public function delete()
    {
        $deleteKey = 'deleteAEzBQMmYg111ADFSSDFSASDFWEQWZVFBHssd12345678rjjHI330q111page';
        $deleteKey1 = 'delet111eAAEFGERSFGTJRYIKRDafaergwegrg12345678EzBQMmaYgrjdjHSI0333gq111media';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            $BPage = BPage::findOrFail(request('id'));

            $BPageParagraph = BPageParagraph::where('b_page_id', request('id'));

            if($BPageParagraph->count() > 0 )
            {
                // 事务处理
                $BPageParagraph->delete();
            }

            if($BPage->delete())
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
}