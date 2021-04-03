<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \App\Models\BMenu;
use \App\Models\BPost;
use \App\Models\BPageParagraph;
use \App\Models\BPostParagraph;

class DemoController extends Controller
{   
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
    
	public function test()
    {
        // for($i=1; $i<12; $i++)
        // {
        //     for($j=1; $j<12; $j++)
        //     {
        //         BPageParagraph::where( 'title', 'slider'.$i.'_'.$j.'_text' )->update([
        //             'title' => 'slider'.$i.'_'.$j.'_text1',
        //         ]);

        //         BPostParagraph::where( 'title', 'slider'.$i.'_'.$j.'_text' )->update([
        //             'title' => 'slider'.$i.'_'.$j.'_text1',
        //         ]);
        //     }
        // }
        
        return 1;
        return view('admin.demo.test');
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
