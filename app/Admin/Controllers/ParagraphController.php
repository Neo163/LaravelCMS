<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BParagraph;

class ParagraphController extends Controller
{
    public function getData()
    {
        $ParagraphKey = 'create897FSJs$#&*^*0KEJOEPs/dRMUrrfASD!#$F0784fd0adad1%^&^ewhfghdde6SDFSb9d9125c07493b8eId9EA'.request('id');
        if(request('paragraphKey') == $ParagraphKey)
        {
            $data = array();
            $data['paragraph'] = BParagraph::where('id', request('id'))->get();

            return $data;
        }
    }

    public function updateData()
    {
        $this->validate(request(), [
            'id' => 'required',
            'json' => 'required',
        ]);

        // $this->authorize('update_note', $note);

        $updateKey = 'updaAdsafasdfdsdfgddfAERYQ,FDDFBFGWV122314!@^)^$1123AS!@df33S3UpdasteParagraph';
        $updateKey1 = 'upAdateAE!ADSFGDSSDFDSsafwejykc!&*(*&*%$$12124333atefMenuParagraph';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
            BParagraph::where( 'id', request('id') )->first()->update([
                'content' => request('json'),
            ]);
        }

        return 'OK';
    }

    public function index()
	{
		$paragraphs = BParagraph::paginate(20);
		return view("admin.paragraph.index", compact('paragraphs'));
	}

	public function create()
	{
		if(request('category') == 'json')
		{
			$this->validate(request(), [
				'content' => 'required|json',
			]);
		}

		if(request('category') == 'text')
		{
			$this->validate(request(), [
				'content' => 'required',
			]);
		}

		BParagraph::create([
            'content' => request('content'),
            'category' => request('category'),
        ]);

		return back();
	}

	public function update()
	{
		if(request('category') == 'json')
		{
			$this->validate(request(), [
				'content' => 'required|json',
			]);
		}

		if(request('category') == 'text')
		{
			$this->validate(request(), [
				'content' => 'required',
			]);
		}

		// $this->authorize('update_note', $note);

        $updateKey = 'updatebAEzBQMAa4a2d3bssAFDG67432jsaasjHI0SFFAqGcddf3a3S3Updaste';
        $updateKey1 = 'upAdateAEzdBSQaFsssAAAG11111DF1234243ZVGSssdfge0gaaq33F3UpdSaatef';

        if ( request('updateKey') == $updateKey && request('updateKey1') == $updateKey1 )
        {
            BParagraph::where( 'id', request('id') )->first()->update([
                'content' => request('content'),
                'category' => request('category'),
            ]);
        }

		$data = array();
		$data['id']    = request('id');
		$data['content'] = request('content');
		$data['category'] = request('category');

		return $data;
	}

    public function delete()
    {
        $BParagraph = BParagraph::findOrFail(request('id'));

        $deleteKey = 'deleteVkVm1aPU2xXNXdyYTQ112DSFGDsdfdsfPSIbsInZhb2HVlcI0003deleteA1';
        $deleteKey1 = 'deleteNJcV1888AaRHp1NkxnPT0iLC11DSGASAjyteraasJ12YW3dx1ZSI6000bdeleteA1';

        if ( request('deleteKey') == $deleteKey && request('deleteKey1') == $deleteKey1 )
        {
            if($BParagraph->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}
