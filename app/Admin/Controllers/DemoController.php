<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use \App\Models\BMenu;
use \App\Models\BPost;
use \App\Models\BPostParagraph;
use \App\Models\BSetting;

class DemoController extends Controller
{   
    public function demo($demo)
    {
        return view('admin.demo.'.$demo);
    }

    public function test()
    {
        return 1;
        return view('admin.demo.test');
    }

    public function redis_test_demo($demo)
    {
        //set存数据 创建一个 key 并设置value 
        Redis::set('key','value'); 
         
        //get命令用于获取指定 key 的值,key不存在,返回null,如果key储存的值不是字符串类型，返回一个错误。
        var_dump(Redis::get('key'));
         
        //del 删除 成功删除返回 true, 失败则返回 false
        Redis::del('key');
         
        //mset存储多个 key 对应的 value
        $array= array(
                'user1'=>'张三',
                'user2'=>'李四',
                'user3'=>'王五'
        );
        redis::mset($array); // 存储多个 key 对应的 value
         
        // Mget返回所有(一个或多个)给定 key 的值,给定的 key 里面,key 不存在,这个 key 返回特殊值 nil
         
        var_dump(redis::mget (array_keys( $array))); //获取多个key对应的value
         
        //Strlen 命令用于获取指定 key 所储存的字符串值的长度。当 key存储不是字符串，返回错误。
        var_dump(redis::strlen('key'));
         
        // //根据键名模糊搜索
        var_dump(Redis::keys('use*'));//模糊搜索
         
        // //获取缓存时间
        var_dump(Redis::ttl('str2'));//获取缓存时间
         
        // //exists检测是否存在某值
        var_dump(Redis::exists ( 'foo' )); //true
    }

    public function custom_transaction()
    {
        DB::beginTransaction();
        try {
            // code...

            DB::commit();
        }
        catch(QueryException $ex) {
            DB::rollback();
        }
    }

    public function custom_transaction_demo()
    {
        DB::beginTransaction();
        try {
            // code...
            BSetting::where( 'title', 'media_upload_box' )->first()->update([
                    'status' => 1110,
                ]);

            BSetting::where( 'title', 'media_upload_box1' )->first()->update([
                    'status' => 110,
                ]);

            DB::commit();
        }
        catch(QueryException $ex) {
            DB::rollback();
        }
    }

    public function sorting_page()
    {
        $id = 3;
        $paras = BPageParagraph::where('b_page_id', $id)
                            ->orderBy('sort', 'asc')
                            ->orderBy('created_at', 'asc')
                            ->get();

        return view('admin.demo.sorting', compact('paras'));
    }
    
	public function sorting()
    {
        $sort = request('page_id_array');
        
        for($i=0; $i<count($sort); $i++)
        {
            BPageParagraph::where('id', $sort[$i])->update(['sort' => $i]);
        }
        echo 'sort OK';
    }

	public function post()
	{
        $posts = BPost::paginate(20);

        return view("admin.demo.post", compact('posts'));
	}

    public function selectCategory()
    {
    	$bmenu = BMenu::findOrFail(9);

    	$bmenus = BMenu::where('parent', $bmenu->parent)->get();
    	foreach ($bmenus as $bmenu1)
    	{
    		echo $bmenu1->id;
    		echo '<br/>';
    	}
    	
    }

    public function parseJsonArray($jsonArray, $parentID = 0)
	{
		$return = array();
		foreach ($jsonArray as $subArray)
		{
			$returnSubSubArray = array();

			if (isset($subArray->children))
			{
				$returnSubSubArray = $this->parseJsonArray($subArray->children, $subArray->id);
			}

			$return[] = array('id' => $subArray->id, 'parentID' => $parentID);
			$return = array_merge($return, $returnSubSubArray);
		}

		return $return;
	}
}
