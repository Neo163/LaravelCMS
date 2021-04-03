<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BMenu;
use \App\Models\BMenuCategory;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(BMenuCategory $bmenu)
    {
    	return view('admin.menu.index', compact('bmenu'));
    }

    public function test()
    {
    	$tab = 0;

    	if(request('tab') == 1)
    	{
    		$tab = 1;
    	}
		 
    	return view('admin.menu.index1', compact('tab'));
    }

    public function data()
    {
    	$menu = BMenu::where('b_menus_category_id', request('id'))->orderBy('sort', 'asc')->get();

	    $result = [];
	    $ref   = [];
	    $items = [];
	    
	    foreach ($menu as $data)
	    {
	      $result = &$ref[$data['id']];
	      $result['parent'] = $data['parent'];
	      $result['id'] = $data['id'];
	      $result['icon'] = $data['icon'];

	      $result['title'] = $data['title'];
	      $result['link'] = $data['link'];
	      $result['sort'] = $data['sort'];
	      // $result['menu_category_id'] = $data['menu_category_id'];

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
			BMenu::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
                'link' => request('link'),
            ]);

			$data['type']  = 'edit';
			$data['id']    = request('id');

		} else 
		{
			$sortMax = BMenu::max('sort');
			BMenu::create([
	            'title' => request('title'),
	            'link' => request('link'),
	            'sort' => $sortMax+1,
	            'b_menus_category_id' => request('b_menus_category_id'),
	        ]);

			// 用事务处理
			$data['id'] = BMenu::max('id');

			$data['type'] = 'add';
		}

		$data['title'] = request('title');
		$data['link']  = request('link');

		// 选中当前分类和所有子分类
		// $json = json_decode(request('json'));
		// $data['json'] = $this->selectCategory($json, $data['id']);

		return $data;
	}

	public function selectCategory($jsonArray, $id, $parentID = 0, $status = 0)
	{
		$return = array();

		foreach ($jsonArray as $subArray)
		{
			$returnSubSubArray = array();

			$bmenu = BMenu::findOrFail($id);

	    	$bmenus = BMenu::where('parent', $bmenu->parent)->get();
	    	foreach ($bmenus as $bmenu1)
	    	{
	    		if($subArray->id == $bmenu1->id)
	    		{
	    			$status = 0;
	    		}
	    	}

			if($subArray->id == $id)
			{
				$status = 1;
			}

			if (isset($subArray->children))
			{
				$returnSubSubArray = $this->selectCategory($subArray->children, $id, $subArray->id, $status);
			}

			if($status == 1)
			{
				$return[] = array('id' => $subArray->id, 'parentID' => $parentID);
			}

			$return = array_merge($return, $returnSubSubArray);
		}

		return $return;
	}

    public function change()
	{
		$data = json_decode(request('data'));
		$readbleArray = $this->parseJsonArray($data);

		$i=0;
		foreach($readbleArray as $row)
		{
			$i++;

			BMenu::where( 'id', $row['id'] )->first()->update([
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
    	$countChild = BMenu::where( 'parent', request('id') )->count();
    	if($countChild > 0)
    	{
    		return 'child';
    	}
    	
        $menu = BMenu::findOrFail(request('id'));

        $deleteKey = 'deleteAEzBQMmYgrjjHI0q111Menu';
        $deleteKey1 = 'deleteAEzBQMmaYgrjdjHSI0gq111Menu';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            if($menu->delete()) 
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}
