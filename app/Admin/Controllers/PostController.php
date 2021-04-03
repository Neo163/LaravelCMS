<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BUser;
use \App\Models\BPost;
use \App\Models\BPostType;
use \App\Models\BPostParagraph;
use \App\Models\BMedia;
use \App\Models\BMediaCategory;
use \App\Models\BPostCategoryRelationship;
use \App\Models\BPostTagRelationship;

class PostController extends Controller
{
	// 权限列表页面
	public function index(BPostType $bPostType)
	{
		$posts = BPost::paginate(20);

        $bPostTypes = BPostType::orderBy('sort', 'asc')->get();

		return view("admin.post.posts", compact('bPostType', 'posts', 'bPostTypes'));
	}

    public function add(BPostType $bPostType)
    {
        $bPostTypes = BPostType::orderBy('sort', 'asc')->get();

        // media start
        $count = BMedia::count();
        $bData = $this->post_start_end($count);
        
        $media = BMedia::orderBy('created_at', 'desc')->get();
        $mediaCategories = BMediaCategory::orderBy('sort', 'asc')->get();
        // media end

        return view("admin.post.add", compact('bPostType', 'bPostTypes','media', 'mediaCategories', 'bData'));
    }

    public function templatesData()
    {
        $data = array();
        $data['templates'] = BTemplate::where( 'b_templates_category', 1 )->orderBy('created_at', 'desc')->get();

        return $data;
    }

    public function contentStatus(BPost $bpost)
    {
        if($bpost->content_show == 0)
        {
            BPost::where( 'id', $bpost->id )->first()->update([
                'content_show' => 1,
            ]);

            return 'OK';
        } else
        {
            BPost::where( 'id', $bpost->id )->first()->update([
                'content_show' => 0,
            ]);
            return 'No';
        }

        return 'No';
    }

    public function create(Request $request)
    {
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

        $countMax = BPost::max('id');

        if($countMax > 0)
        {
            $id = $countMax+1;

            // 事务
            BPost::create([
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

                    $category = $this->post_paragraph_category($key);

                    $create = BPostParagraph::create([
                        'title' => $key,
                        'content' => $data,
                        'category' => $category,
                        'b_post_id' => $id
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
            BPost::create([
                'title' => request('title'),
                'content' => request('content'),
                'image' => request('image'),
                'structure' => $structure,
                'template' => request('front_end_template'),
                'b_user_id' => Auth::guard("admin")->id(),
            ]);

            $countMax = BPost::max('id');

            if(!empty($request['data']))
            {
                foreach ($request['data'] as $key => $data)
                {
                    if($data == null)
                    {
                        $data = '';
                    }

                    $category = $this->post_paragraph_category($key);

                    $create = BPostParagraph::create([
                        'title' => $key,
                        'content' => $data,
                        'category' => $category,
                        'b_post_id' => $countMax
                    ]);

                    if(!$create)
                    {
                        return 'create faile';
                    }
                }
            }

            $id = $countMax;
        }

        // 分类
        $categories = request('selectCategoryValue');
        $categories = explode(" ", $categories);
        $arrCat = array();
        foreach ($categories as $key => $category)
        {
            if($category != '')
            {
                if(!in_array($category, $arrCat))
                {
                    BPostCategoryRelationship::create([
                        'b_post_id' => $id,
                        'b_category_id' => $category,
                    ]);
                }
            }
        }

        // 标签
        $tags = request('selectTagValue');
        $tags = explode(" ", $tags);
        $arrTag = array();
        foreach ($tags as $key => $tag)
        {
            if($tag != '')
            {
                if(!in_array($tag, $arrTag))
                {
                    BPostTagRelationship::create([
                        'b_post_id' => $id,
                        'b_tag_id' => $tag,
                    ]);
                }

            }
        }

        return redirect("/admin/posts/type/1");
    }

    public function post_paragraph_category($key)
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

    public function edit(BPostType $bPostType, BPost $bpost)
    {
        // media start
        $count = BMedia::count();
        $bData = $this->post_start_end($count);
        
        $media = BMedia::orderBy('created_at', 'desc')->paginate(10);
        $mediaCategories = BMediaCategory::orderBy('sort', 'asc')->get();
        // media end

        return view("admin.post.edit", compact('bPostType', 'bpost','media', 'mediaCategories', 'bData'));
    }

	public function editData()
    {
        $data = array();
        $json = array();

        $bpost = BPost::findOrFail(request('id'));
        $data['bpost'] = $bpost;

        $countPara = BPostParagraph::where('b_post_id', request('id'))->count();
        
        if($countPara > 0)
        {
            $BPostParagraph = BPostParagraph::where('b_post_id', request('id'))->get();
        
            foreach ($BPostParagraph as $key => $para)
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

        $data['categories'] = BPostCategoryRelationship::where('b_post_id', $bpost->id)->get();

        $data['tags'] = BPostTagRelationship::where('b_post_id', $bpost->id)->get();

        return $data;
    }

    public function update(BPost $bpost, Request $request)
    {
        // $categories = request('selectCategoryValue');
        // $tags = request('selectTagValue');

        // echo $categories;
        // echo '<br/>';
        // echo $tags;
        // return ;

        // return $bpost->id;
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
        BPost::where( 'id', $bpost->id )->first()->update([
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
                $BPostParagraph = BPostParagraph::where([ 
                    ['b_post_id', $bpost->id], 
                    ['title', $key] 
                ]);

                $category = $this->post_paragraph_category($key);

                if($BPostParagraph->count() > 0)
                {
                    $BPostParagraph->first()->update([
                        'content' => $data,
                        'category' => $category,
                    ]);
                }

                if($BPostParagraph->count() == 0)
                {
                    $create = BPostParagraph::create([
                        'title' => $key,
                        'content' => $data,
                        'category' => $category,
                        'b_post_id' => $bpost->id,
                    ]);

                    if(!$create)
                    {
                        return 'create faile';
                    }
                }

            }
        }

        // 更新分类和标签
        $categoriesDel = BPostCategoryRelationship::where('b_post_id', $bpost->id)->delete();

        $categories = request('selectCategoryValue');
        $categories = explode(" ", $categories);
        $arrCat = array();
        foreach ($categories as $key => $category)
        {
            if($category != '')
            {
                if(!in_array($category, $arrCat))
                {
                    array_push($arrCat, $category);
                    BPostCategoryRelationship::create([
                        'b_post_id' => $bpost->id,
                        'b_category_id' => $category,
                    ]);
                }
            }
        }

        $tagsDel = BPostTagRelationship::where('b_post_id', $bpost->id)->delete();

        $tags = request('selectTagValue');
        $tags = explode(" ", $tags);
        $arrTag = array();
        foreach ($tags as $key => $tag)
        {
            if($tag != '')
            {
                if(!in_array($tag, $arrTag))
                {
                    array_push($arrTag, $tag);
                    BPostTagRelationship::create([
                        'b_post_id' => $bpost->id,
                        'b_tag_id' => $tag,
                    ]);
                }
            }
        }

        return back();
    }

    public function delete()
    {
        $deleteKey = 'deleteAEzAdsdkSDFDS!E0@L;L;#aAF;12345678SDFSASAjHI330q111post';
        $deleteKey1 = 'delet!ADFGRDF@GFH#dfga$jghdrer%12121678EzBQMmaYgrjdjHSI0333gq111post';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            // 删除句子，事务处理
            $BPostParagraph = BPostParagraph::where('b_post_id', request('id'));
            if($BPostParagraph->count() > 0 )
            {
                $BPostParagraph->delete();
            }

            // 删除分类关系
            $BPostCategoryRelationship = BPostCategoryRelationship::where('b_post_id', request('id'));
            if($BPostCategoryRelationship->count() > 0)
            {
                $BPostCategoryRelationship->delete();
            }

            // 删除标签关系
            $BPostTagRelationship = BPostTagRelationship::where('b_post_id', request('id'));
            if($BPostTagRelationship->count() > 0)
            {
                $BPostTagRelationship->delete();
            }

            $BPost = BPost::findOrFail(request('id'));
            if($BPost->delete())
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

    public function post_start_end($count)
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