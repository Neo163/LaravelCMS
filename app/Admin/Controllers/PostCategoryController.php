<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BUser;
use \App\Models\BPostCategory;
use \App\Models\BPostType;
use Illuminate\Support\Facades\Auth;

class PostCategoryController extends Controller
{
    // public function index()
    // {
    //     $bPostTypes = BPostType::orderBy('sort', 'asc')->get();

    //     return view("admin.post_category.index", compact('bPostTypes'));
    // }

    public function posts_categories(BPostType $bPostType)
    {
        $bPostTypes = BPostType::orderBy('sort', 'asc')->get();

        return view("admin.posts_category.posts_category", compact('bPostType', 'bPostTypes'));
    }

    public function data()
    {
        $types = BPostCategory::where('b_posts_type_id', request('id'))->orderBy('sort', 'asc')->get();
        
        $result = [];
        $ref   = [];
        $items = [];
        
        foreach ($types as $data)
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
        $childType = BPostCategory::where( 'parent', request('id') )->count();
        $bPostCategoryCount = BPostCategory::where( 'id', request('id') )->count();

        $bPostCategory = BPostCategory::where( 'id', request('id') )->first();
        
        if($bPostCategoryCount > 0)
        {
            if(($bPostCategory->parent != 0) && ($bPostCategory->b_posts_type_id != request('b_posts_type_id')) )
            {
                $data['result'] = 'parentNotChange';
                return $data;
            }
        }


        if(($childType > 0) && ($bPostCategory->b_posts_type_id != request('b_posts_type_id')) )
        {
            $data['result'] = 'childNotChange';
            return $data;
        }
        
        $data = array();

        $data['result'] = 'OK';

        if(request('id') != '')
        {
            BPostCategory::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
                'b_posts_type_id' => request('b_posts_type_id'),
            ]);

            $data['type']  = 'edit';
            $data['id']    = request('id');

        } else 
        {
            $sortMax = BPostCategory::max('sort');

            BPostCategory::create([
                'title' => request('title'),
                'sort' => $sortMax+1,
                'b_posts_type_id' => request('b_posts_type_id'),
            ]);

            // 用事务处理
            $data['id'] = BPostCategory::max('id');

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

            $BPostCategory = BPostCategory::findOrFail($id);

            $BPostCategorys = BPostCategory::where('parent', $BPostCategory->parent)->get();
            foreach ($BPostCategorys as $BPostCategory1)
            {
                if($subArray->id == $BPostCategory1->id)
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

            BPostCategory::where( 'id', $row['id'] )->first()->update([
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
        $countChild = BPostCategory::where( 'parent', request('id') )->count();
        if($countChild > 0)
        {
            return 'child';
        }
        
        $menu = BPostCategory::findOrFail(request('id'));

        $deleteKey = 'deleteAEzBQMmYg1adsfdsASDFDSFS1888111postType';
        $deleteKey1 = 'delet111eAEzBdfaaaASDFDSF111111333gq111postType';

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