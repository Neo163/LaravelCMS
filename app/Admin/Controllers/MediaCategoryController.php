<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BMedia;
use \App\Models\BMediaCategory;

class MediaCategoryController extends Controller
{
    public function data()
    {
    	$bmedia = BMediaCategory::orderBy('sort', 'asc')->get();

	    $result = [];
	    $ref   = [];
	    $items = [];
	    
	    foreach ($bmedia as $data)
	    {
	      $result = &$ref[$data['id']];
	      $result['parent'] = $data['parent'];
	      $result['id'] = $data['id'];
	      $result['icon'] = $data['icon'];

	      $result['title'] = $data['title'];
	      $result['link'] = $data['link'];
	      $result['sort'] = $data['sort'];

	      if($data['parent'] == 0) 
	      {
	          $items[$data['sort']] = &$result;
	      } else {
	          $ref[$data['parent']]['child'][$data['sort']] = &$result;
	      }
	    }

	    return $items;
    }

    public function createEdit()
	{
		$data = array();

		if(request('id') != '')
		{
			BMediaCategory::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
                'link' => request('link'),
            ]);

			$data['type']  = 'edit';
			$data['id']    = request('id');

		} else 
		{
			$sortMax = BMediaCategory::max('sort');
			BMediaCategory::create([
	            'title' => request('title'),
	            'link' => request('link'),
	            'sort' => $sortMax+1,
	            'b_menus_category_id' => request('b_menus_category_id'),
	        ]);

			// 用事务处理
			$data['id'] = BMediaCategory::max('id');

			$data['type'] = 'add';
		}

		$data['title'] = request('title');
		$data['link']  = request('link');

		return $data;
	}

    public function change()
	{
		$data = json_decode(request('data'));
		$readbleArray = $this->parseJsonArray($data);

		$i=0;
		foreach($readbleArray as $row)
		{
			$i++;

			BMediaCategory::where( 'id', $row['id'] )->first()->update([
                'parent' => $row['parentID'],
                'sort' => $i,
            ]);
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

    public function delete()
    {
    	$countChild = BMediaCategory::where( 'parent', request('id') )->count();
    	if($countChild > 0)
    	{
    		return 'child';
    	}

        $menu = BMediaCategory::findOrFail(request('id'));

        $deleteKey = 'deleteAEzBQMmYg111rjjHI330q111media';
        $deleteKey1 = 'delet111eAEzBQMmaYgrjdjHSI0333gq111media';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
        	// 删除指定分类，所属媒体全部设置为“未分类”
        	$count = BMedia::where( 'b_media_category_id', request('id') )->count();
        	if($count > 0)
        	{
        		BMedia::where( 'b_media_category_id', request('id') )->update([
		            'b_media_category_id' => 1,
		        ]);
        	}

            if($menu->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}
