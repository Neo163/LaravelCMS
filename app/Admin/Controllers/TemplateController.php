<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BUser;
use \App\Models\BTemplate;

class TemplateController extends Controller
{
    public function template()
    {
    	$templates = BTemplate::paginate(20);
    	return view('admin.template.template', compact('templates'));
    }

    public function add()
    {
    	return view('admin.template.add');
    }

    public function data()
    {
    	$data = array();

        // post
    	if(request('id') == 1)
    	{
    		$data = $this->frontEndTemplates('page');
            $data['backEnd'] = BTemplate::where('b_templates_category', 2)->orderBy('created_at', 'asc')->get();
    	}

        // page
    	if(request('id') == 2)
    	{
            $data = $this->frontEndTemplates('post');
            $data['backEnd'] = BTemplate::where('b_templates_category', 1)->orderBy('created_at', 'asc')->get();
    	}

        return $data;
    }

    public function frontEndTemplates($category)
    {
        $dir = '../resources/views/web/'.$category.'/templates/';
        $file = scandir($dir);

        $i = 0;
        foreach (array_reverse($file) as $file) 
        {
            if(strlen($file) > 2)
            {
                $data['frontEnd'][$i] = substr($file,0,strlen($file)-10);
                $i = $i + 1;
                // $data['frontEnd_number'] = $i;
            }
        }

        return $data;
    }

    public function create()
    {
    	$this->validate(request(), [
			'title' => 'required',
		]);

    	$structure = array();
    	$structure['text'] = request('text');
    	$structure['image'] = request('image');
    	$structure['video'] = request('video');
    	$structure['slider'] = request('slider');

    	if(empty(request('text')))
    	{
    		$structure['text'] = '';
    	}

    	if(empty(request('image')))
    	{
    		$structure['image'] = '';
    	}

    	if(empty(request('video')))
    	{
    		$structure['video'] = '';
    	}

    	if(empty(request('slider')))
    	{
    		$structure['slider'] = '';
    	}

    	$structure = json_encode($structure);

		BTemplate::create([
            'title' => request('title'),
            'template' => request('slectTemplate'),
            'structure' => $structure,
            'b_templates_category' => request('slectTemplateCategory'), // 1: post, 2: page
        ]);

		return redirect("/admin/templates");
    }

    public function edit(BTemplate $template)
    {
    	return view('admin.template.edit', compact('template'));
    }

    public function update(BTemplate $template)
    {
    	$this->validate(request(), [
            'title' => 'required',
        ]);

        $structure = array();
    	$structure['text'] = request('text');
    	$structure['image'] = request('image');
    	$structure['video'] = request('video');
    	$structure['slider'] = request('slider');

    	$structure = json_encode($structure);

        BTemplate::where( 'id', $template->id )->update([
            'title' => request('title'),
            'template' => request('slectTemplate'),
            'structure' => $structure,
            'b_templates_category' => request('slectTemplateCategory'), // 1: post, 2: page
        ]);

        return back();
    }

    public function delete()
    {
        // $this->authorize('delete', $user);

        if (  request('deleteKey') == 'deleteVkVm1aPU2xAAvdsdfd13888lcI0003deleteTemplate' 
        	&& request('deleteKey1') == 'deleteNJcV1888ASDFSAAA13888I6000bdeleteTemplate' )
        {
        	$template = BTemplate::findOrFail(request('id'));

            if($template->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}
