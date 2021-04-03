<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BMenuCategory;
use \App\Models\BMenuLocation;
use \App\Models\BMenu;

class MenuCategoryController extends Controller
{
    public function index()
    {
    	$menuCategory = BMenuCategory::where('id', '>', 1)->orderBy('sort', 'asc')->get();
        $menuCategoryAll = BMenuCategory::orderBy('sort', 'asc')->get();
    	$menuLocation = BMenuLocation::orderBy('sort', 'asc')->get();
		 
    	return view('admin.menuCategory.index', compact('menuCategory', 'menuCategoryAll', 'menuLocation'));
    }
    
    public function menuCategorySorting()
    {
        $sort = request('page_id_array');
        
        for($i=0; $i<count($sort); $i++)
        {
            BMenuCategory::where('id', $sort[$i])->update(['sort' => $i]);
        }
        echo 'sort OK';
    }

    public function menuLocationSorting()
    {
        $sort = request('page_id_array');
        
        for($i=0; $i<count($sort); $i++)
        {
            BMenuLocation::where('id', $sort[$i])->update(['sort' => $i]);
        }
        echo 'sort OK';
    }

    public function create()
	{
		$this->validate(request(), [
            'title' => 'required',
        ]);

        BMenuCategory::create([
            'title' => request('title'),
            'b_user_id' => Auth::guard("admin")->id(),
        ]);

        return back();
	}

    public function update()
	{
		$this->validate(request(), [
            'title' => 'required',
        ]);

		// $this->authorize('update_note', $note);

        $updateKey = 'updatebAEzBQMmaYg11rjaajHI0qc333UpdateMenu';
        $updateKey1 = 'updateAEzBQaMmaYcgrjbdjHSI0gq333UpdateMenu';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
            BMenuCategory::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
            ]);
        }

		$data = array();
		$data['id']    = request('id');
		$data['title'] = request('title');

		return $data;
	}

    public function delete()
    {
        $menuCategory = BMenuCategory::findOrFail(request('id'));

        $deleteKey = 'deleteTRBaFE5ZE1naUE9PSIsInZhbHVlIjo111deleteMenu';
        $deleteKey1 = 'deleteFJXRERyTFwvUzR6XC8wQT09Iiwidm111deleteMenu';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            $menus = BMenu::where('b_menus_category_id', request('id'));

            $dataId = BMenuCategory::where( 'id', request('id') )->first();
            $count = BMenuLocation::where( 'b_menu_category_id', $dataId->id )->count();
            if($count > 0)
            {
                $updateLocation = BMenuLocation::where( 'b_menu_category_id', $dataId->id )->update([
                    'b_menu_category_id' => 1,
                ]);
            }

            // 事务处理
            if($menuCategory->delete() && $menus->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}
