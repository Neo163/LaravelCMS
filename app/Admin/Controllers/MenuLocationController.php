<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BMenuCategory;
use \App\Models\BMenuLocation;
use \App\Models\BMenu;

class MenuLocationController extends Controller
{
    public function create()
    {
    	$this->validate(request(), [
            'title' => 'required',
        ]);

        BMenuCategory::where( 'id', request('bMenuCategory') )->first()->update([
            'location_status' => 1,
        ]);

        BMenuLocation::create([
            'title' => request('title'),
            'b_menu_category_id' => request('bMenuCategory'),
            'b_user_id' => Auth::guard("admin")->id(),
        ]);

        return back();
    }

    public function update()
	{
		$this->validate(request(), [
            'title' => 'required',
            'b_menu_category_id' => 'required|integer',
        ]);

		// $this->authorize('update_note', $note);

		// $location = BMenuCategory::where('id', 1)->get();
		$location = request('location');

        $updateKey = 'updatebzdwNExaVFhRVTRBaFE1115ZE1naUE9PSIsInZhbHVlIjoiaU888UpdateMenu';
        $updateKey1 = 'updatepUFJXRERyTFwvUzR6XC8w111QT09IiwidmFsdWUiOiJmdEhqSG1SUXBYdTQzdUFZWEV5NlZWTzNBNlZzQ1wvUDZwNkxQblRtczB0VT0iLCJtYWjZWQyMWQyMjlh888UpdateMenu';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
        	$idCatogory = BMenuLocation::where( 'id', request('id') )->first();

        	if($idCatogory->b_menu_category_id != request('b_menu_category_id'))
        	{
        		$countCategory = BMenuLocation::where( 'b_menu_category_id', $idCatogory->b_menu_category_id )->count();

        		if($countCategory < 2)
        		{
        			BMenuCategory::where( 'id', $idCatogory->b_menu_category_id )->first()->update([
			            'location_status' => 0,
			        ]);
        		}

        		BMenuCategory::where( 'id', request('b_menu_category_id') )->first()->update([
		            'location_status' => 1,
		        ]);
        	}

            BMenuLocation::where( 'id', request('id') )->first()->update([
                'title' => request('title'),
                'b_menu_category_id' => request('b_menu_category_id'),
            ]);

            $location = BMenuCategory::where('id', request('b_menu_category_id'))->get();
			$location = $location[0]['title'];
        }

		$data = array();
		$data['id']    = request('id');
		$data['title'] = request('title');
		$data['location'] = $location;
		$data['b_menu_category_id'] = request('b_menu_category_id');

		return $data;
	}

    public function delete()
    {
        $BMenuLocation = BMenuLocation::findOrFail(request('id'));

        $deleteKey = 'deleteVkVm1PU2xXNXdyYTQzNkp1Rn111VYTFE9PSIsInZhbHVlI000deleteMenu';
        $deleteKey1 = 'deleteNJcVRKTFFvcFhrR1k4XC888ARHp1NkxnPT0iLCJ2YWx1ZSI6000deleteMenu';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            if($BMenuLocation->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}
