<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BUser;
use \App\Models\BPostType;
use \App\Models\BPostCategory;
use \App\Models\BPostTag;
use Illuminate\Support\Facades\Auth;

class PostTypeController extends Controller
{
	public function index()
	{
        return view("admin.post_type.post_type");
	}

    public function data()
    {
        $types = BPostType::orderBy('sort', 'asc')->get();

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
          // $result['postsType_category_id'] = $data['postsType_category_id'];

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
            BPostType::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
            ]);

            $data['type']  = 'edit';
            $data['id']    = request('id');

        } else 
        {
            $sortMax = BPostType::max('sort');

            BPostType::create([
                'title' => request('title'),
                'sort' => $sortMax+1,
            ]);

            // 用事务处理
            $data['id'] = BPostType::max('id');

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

            $BPostType = BPostType::findOrFail($id);

            $BPostTypes = BPostType::where('parent', $BPostType->parent)->get();
            foreach ($BPostTypes as $BPostType1)
            {
                if($subArray->id == $BPostType1->id)
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

            BPostType::where( 'id', $row['id'] )->first()->update([
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
        $childType = BPostType::where( 'parent', request('id') )->count();
        if($childType > 0)
        {
            return 'childType';
        }

        $childCategory = BPostCategory::where( 'b_posts_type_id', request('id') )->count();
        if($childCategory > 0)
        {
            return 'childCategory';
        }

        $childTag = BPostTag::where( 'b_posts_type_id', request('id') )->count();
        if($childTag > 0)
        {
            return 'childTag';
        }
        
        $postsType = BPostType::findOrFail(request('id'));

        $deleteKey = 'deleteAEzBQMmYg1adsfdsASDFDSFS1888111postType';
        $deleteKey1 = 'delet111eAEzBdfaaaASDFDSF111111333gq111postType';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            if($postsType->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}