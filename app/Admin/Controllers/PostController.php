<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use \App\Models\BUser;
use \App\Models\BSetting;
use \App\Models\BPost;
use \App\Models\BPostType;
use \App\Models\BPostParagraph;
use \App\Models\BMedia;
use \App\Models\BMediaCategory;
use \App\Models\BPostCategoryRelationship;
use \App\Models\BPostTagRelationship;
use \App\Models\BComment;

class PostController extends Controller
{
	public function index(BPostType $bPostType)
	{
		$posts = BPost::where('b_posts_type_id', $bPostType->id)->orderBy('ranking', 'desc')->orderBy('created_at', 'desc')->paginate(10);

        // $bPostTypes = BPostType::where('id', '!=', 1)->orderBy('sort', 'asc')->get();
        $bPostTypes = BPostType::orderBy('sort', 'asc')->get();

        $bSetting = BSetting::where('id', 3)->first();

		return view("admin.post.posts", compact('bPostType', 'posts', 'bPostTypes', 'bSetting'));
	}

    public function add(BPostType $bPostType)
    {
        $bPostTypes = BPostType::where('id', '!=', 1)->orderBy('sort', 'asc')->get();

        // media start
        $count = BMedia::count();
        $bData = $this->post_start_end($count);

        $editor = $this->is_set_param('editor');
        
        if($editor == 2)
        {
            $bData['editor'] = 2;
        } else 
        {
            $bData['editor'] = 1;
        }
        
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

    public function displayContentType()
    {
        $displayKey = 'displayAEzAaSASAS&^(*&^&*(*&DS!E0@L;L;#aAF;12345678SDFSASAjHI330q111post';

        if ( request('displayKey') == $displayKey )
        {
            BSetting::where( 'id', 3 )->update([
                'status' => request('status'),
            ]);

            return 'OK';
        }

        return 'No';
    }

    public function contentStatus(BPost $bpost)
    {
        if($bpost->content_show == 0)
        {
            BPost::where( 'id', $bpost->id )->update([
                'content_show' => 1,
            ]);

            return 'OK';
        } else
        {
            BPost::where( 'id', $bpost->id )->update([
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

            $setNum = 200;
            $abstract = $this->contentFormat(request('content'));
            if(mb_strlen($abstract, 'UTF8') > $setNum)
            {
                $abstract = mb_substr($abstract, 0 , $setNum).'...';
            }

            if(empty(request('b_posts_type')))
            {
                $type = 1;
            } else
            {
                $type = request('b_posts_type');
            }

            // 事务
            BPost::create([
                'id' => $id,
                'title' => request('title'),
                'abstract' => $abstract,
                'content' => request('content'),
                'banner' => request('banner'),
                'image' => request('image'),
                'structure' => $structure,
                'template' => request('front_end_template'),
                'b_posts_type_id' => $type,
                'b_user_id' => Auth::guard("admin")->id(),
                'public' => request('public'),
                'ranking' => request('ranking'),
                'remark' => request('remark'),
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
            $setNum = 200;
            $abstract = $this->contentFormat(request('content'));
            if(mb_strlen($abstract, 'UTF8') > $setNum)
            {
                $abstract = mb_substr($abstract, 0 , $setNum).'...';
            }

            if(empty(request('b_posts_type')))
            {
                $type = 1;
            } else
            {
                $type = request('b_posts_type');
            }

            // 事务
            BPost::create([
                'title' => request('title'),
                'abstract' => $abstract,
                'content' => request('content'),
                'banner' => request('banner'),
                'image' => request('image'),
                'structure' => $structure,
                'template' => request('front_end_template'),
                'b_posts_type_id' => $type,
                'b_user_id' => Auth::guard("admin")->id(),
                'public' => request('public'),
                'ranking' => request('ranking'),
                'remark' => request('remark'),
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
        
        if(request('b_posts_type_id') != 1)
        {
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
        }

        if(request('editorType') == 2)
        {
            return redirect("/admin/post/type/edit/".$type."/".$id.'?editor=2');
        } else
        {
            return redirect("/admin/post/type/edit/".$type."/".$id);
        }
        
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
        $bPostTypes = BPostType::where('id', '!=', 1)->orderBy('sort', 'asc')->get();

        // media start
        $count = BMedia::count();
        $bData = $this->post_start_end($count);

        $editor = $this->is_set_param('editor');
        
        if($editor == 2)
        {
            $bData['editor'] = 2;
        } else 
        {
            $bData['editor'] = 1;
        }
        
        $media = BMedia::orderBy('created_at', 'desc')->paginate(10);
        $mediaCategories = BMediaCategory::orderBy('sort', 'asc')->get();
        // media end

        $categories = BPostCategoryRelationship::where('b_post_id', $bpost->id)->get();
        // return $categories;

        $catCount = '';
        foreach($categories as $category)
        {
            $catCount = $catCount.' '.$category->b_category_id;
        }

        $tags = BPostTagRelationship::where('b_post_id', $bpost->id)->get();

        $tagCount = '';
        foreach($tags as $tag)
        {
            $tagCount = $tagCount.' '.$tag->b_tag_id;
        }

        $bPostTypes = BPostType::where('id', '!=', 1)->orderBy('sort', 'asc')->get();

        return view("admin.post.edit", compact('bPostType', 'bPostTypes', 'bpost','media', 'mediaCategories', 'bData', 'catCount', 'tagCount'));
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
        $update_type = 1;

        if($update_type == 1)
        {
            $this->update1($bpost, $request);
        }

        if($update_type == 2)
        {
            $this->update2($bpost, $request);
        }

        return back();
    }

    public function update1(BPost $bpost, Request $request)
    {
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

        $setNum = 200;
        $abstract = $this->contentFormat(request('content'));
        if(mb_strlen($abstract, 'UTF8') > $setNum)
        {
            $abstract = mb_substr($abstract, 0 , $setNum).'...';
        }

        // 更新页面主体
        BPost::where( 'id', $bpost->id )->first()->update([
            'title' => request('title'),
            'abstract' => $abstract,
            'content' => request('content'),
            'banner' => request('banner'),
            'image' => request('image'),
            'structure' => $structure,
            'template' => request('front_end_template'),
            'b_posts_type_id' => request('b_posts_type'),
            'b_user_id' => Auth::guard("admin")->id(),
            'public' => request('public'),
            'ranking' => request('ranking'),
            'remark' => request('remark'),
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

        if(request('b_posts_type_id') != 1)
        {
            // 更新分类和标签，之后优化，参考RoleController.php storePermission
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
        }

        return back();
    }

    public function update2(BPost $bpost, Request $request)
    {
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

        $setNum = 200;
        $abstract = $this->contentFormat(request('content'));
        if(mb_strlen($abstract, 'UTF8') > $setNum)
        {
            $abstract = mb_substr($abstract, 0 , $setNum).'...';
        }

        // 更新页面主体
        BPost::where( 'id', $bpost->id )->first()->update([
            'title' => request('title'),
            'abstract' => $abstract,
            'content' => request('content'),
            'banner' => request('banner'),
            'image' => request('image'),
            'structure' => $structure,
            'template' => request('front_end_template'),
            'b_posts_type_id' => request('b_posts_type'),
            'b_user_id' => Auth::guard("admin")->id(),
            'public' => request('public'),
            'ranking' => request('ranking'),
            'remark' => request('remark'),
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

        if(request('b_posts_type_id') != 1)
        {
            // 更新分类和标签，之后优化，参考RoleController.php storePermission
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
        }

        return back();
    }

    public function copy()
    {
        $copyKey = 'copyAEzAdsdkSDs321&……（……（*&……（*FDS!E0@L;L;#aAF;12345678SDFSASAjHI330q111post';
        $copyKey1 = 'copyAASFSDjsdkfj……&*……&**（￥sdfdASFGFEHGASa!sdjfhdjskld&*(*(dd__dsfdksfdI330q111post';

        if ( request('copyKey') == $copyKey && request('copyKey1') == $copyKey1 )
        {
            $this->validate(request(), [
                'id' => 'required|min:1'
            ]);

            // 复制 b_posts
            $bpost =  BPost::findOrFail(request('id'));

            $idMax = BPost::max('id')+1;

            BPost::create([
                'id' => $idMax,
                'title' => $bpost->title.' copy',
                'content' => $bpost->content,
                'content_show' => $bpost->content_show,
                'banner' => $bpost->banner,
                'image' => $bpost->image,
                'structure' => $bpost->structure,
                'template' => $bpost->template,
                'public' => 'draft',
                'comment' => $bpost->comments,
                'b_posts_type_id' => request('type'),
                'b_user_id' => Auth::guard("admin")->id(),
                'language_id' => $bpost->language_id,
                'ranking' => $bpost->ranking,
                'recycle' => $bpost->recycle,
                'remark' => $bpost->remark,
            ]);

            // 复制 b_posts_paragraphs
            $countPara = BPostParagraph::where('b_post_id', request('id'));
          
            if($countPara->count() > 0 )
            {
                $paras = $countPara->get();
                foreach ($paras as $para)
                {
                    BPostParagraph::create([
                        'title' => $para->title,
                        'content' => $para->content,
                        'category' => $para->category,
                        'sort' => $para->sort,
                        'b_post_id' => $idMax, // 获得指定值
                        'language_id' => $para->language_id,
                    ]);
                }
            }

            // 基于大类关联性问题，暂定取消copy分类、标签
            // if(request('type') != 1)
            // {
            //     // 复制 b_post_category_relationships
            //     $countCat = BPostCategoryRelationship::where('b_post_id', request('id'));
            //     if($countCat->count() > 0 )
            //     {
            //         $cats = $countCat->get();
            //         foreach ($cats as $cat)
            //         {
            //             BPostCategoryRelationship::create([
            //                 'b_post_id' => $idMax,
            //                 'b_category_id' => $cat->b_category_id,
            //             ]);
            //         }
            //     }

            //     // 复制 b_post_tag_relationships
            //     $countTag = BPostTagRelationship::where('b_post_id', request('id'));
            //     if($countTag->count() > 0 )
            //     {
            //         $tags = $countTag->get();
            //         foreach ($tags as $tag)
            //         {
            //             BPostTagRelationship::create([
            //                 'b_post_id' => $idMax,
            //                 'b_tag_id' => $tag->b_tag_id,
            //             ]);
            //         }
            //     }
            // }
        }

        $data = array();
        $data['status'] = 'OK';

        return $data;
    }

    public function delete()
    {
        $deleteKey = 'deleteAEzAdsdkSDFDS!E0@L;L;#aAF;12345678SDFSASAjHI330q111post';
        $deleteKey1 = 'delet!ADFGRDF@GFH#dfga$jghdrer%12121678EzBQMmaYgrjdjHSI0333gq111post';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            // 删除文章内所有内容，避免删除到一半后，系统突然关机，需要使用事务
            DB::beginTransaction();
            try {
                // code...
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

                // 删除评论
                $BComment = BComment::where('b_post_id', request('id'));
                if($BComment->count() > 0)
                {
                    $BComment->delete();
                }

                $BPost = BPost::findOrFail(request('id'));
                $BPost->delete();

                DB::commit();
            }
            catch(QueryException $ex) {
                DB::rollback();
                return 'delete fail';
            }
        }

        return 'delete';
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

    public function contentFormat($content = '')
    {
        $data = $content;
        $formatData = htmlspecialchars_decode($data);//把一些预定义的 HTML 实体转换为字符
        $formatData = strip_tags($formatData);//函数剥去字符串中的 HTML、XML 以及 PHP 的标签,获取纯文本内容
        $formatData = str_replace("&nbsp;", "", $formatData);
        return $formatData;
    }

    // 获取url参数值
    function is_set_param($param)
    {
        if(!empty($_SERVER["QUERY_STRING"]))
        {
            $current_url = $_SERVER["QUERY_STRING"];
            $arr = explode('&',$current_url);
            $value = '';
            foreach ($arr as $k=>$v)
            {
                $left_c = explode('=',$v);
                if ($left_c[0] == $param)
                {
                    $value = $left_c[1];
                    break;
                }
            }
            return $value;
        }
    }
}