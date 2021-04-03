<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BUser;
use \App\Models\BPostTag;
use \App\Models\BPostType;
use Illuminate\Support\Facades\Auth;

class PostTagController extends Controller
{
	public function index()
    {
        return view("admin.posts_tag.posts_tag");
    }

    public function posts_tags(BPostType $bPostType)
    {
        $bPostTypes = BPostType::orderBy('sort', 'asc')->get();

        return view("admin.posts_tag.posts_tag", compact('bPostType', 'bPostTypes'));
    }

    public function data()
    {
        $types = BPostTag::where('b_posts_type_id', request('id'))->orderBy('sort', 'asc')->get();
        
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
        $childType = BPostTag::where( 'parent', request('id') )->count();
        $BPostTagCount = BPostTag::where( 'id', request('id') )->count();

        $BPostTag = BPostTag::where( 'id', request('id') )->first();
        
        if($BPostTagCount > 0)
        {
            if(($BPostTag->parent != 0) && ($BPostTag->b_posts_type_id != request('b_posts_type_id')) )
            {
                $data['result'] = 'parentNotChange';
                return $data;
            }
        }


        if(($childType > 0) && ($BPostTag->b_posts_type_id != request('b_posts_type_id')) )
        {
            $data['result'] = 'childNotChange';
            return $data;
        }
        
        $data = array();

        $data['result'] = 'OK';

        if(request('id') != '')
        {
            BPostTag::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
                'b_posts_type_id' => request('b_posts_type_id'),
            ]);

            $data['type']  = 'edit';
            $data['id']    = request('id');

        } else 
        {
            $sortMax = BPostTag::max('sort');

            BPostTag::create([
                'title' => request('title'),
                'sort' => $sortMax+1,
                'b_posts_type_id' => request('b_posts_type_id'),
            ]);

            // 用事务处理
            $data['id'] = BPostTag::max('id');

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

            BPostTag::where( 'id', $row['id'] )->first()->update([
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
        $countChild = BPostTag::where( 'parent', request('id') )->count();
        if($countChild > 0)
        {
            return 'child';
        }
        
        $menu = BPostTag::findOrFail(request('id'));

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