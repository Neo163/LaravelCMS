<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\BPost;
use \App\Models\BPostType;
use \App\Models\BPostParagraph;
use \App\Models\BComment;

class PostController extends Controller
{
    public function detail(bPostType $bPostType, BPost $bPost)
    {
        if($bPost->public == 'public' || Auth::guard("admin")->id() != 0)
        {
            $BPostParagraph = BPostParagraph::where('b_post_id', $bPost->id)->get();

            $data = array();
            foreach ($BPostParagraph as $key => $para)
            {
                $data[$para['title']] = $para['content'];
            }

            // comments start
            $items = BComment::where('parent', 0)
                                ->where('b_post_id', $bPost->id)
                                ->where('status', 1)
                                ->orderBy('created_at', 'desc')
                                ->get();

            $comments = array();
            $i = 0;
            foreach ($items as $comment)
            {
                $comments[$i] = $comment;
                $i++;

                $countCom = BComment::where('parent', $comment->id)
                                    ->where('status', 1)
                                    ->orderBy('created_at', 'desc');
                if($countCom->count() > 0)
                {
                    $com = $countCom->get();

                    foreach ($com as $com)
                    {
                        $comments[$i] = $com;
                        $i++;
                    }
                }
            }
            // comments end

            $view = $bPost->view;
            if($bPost->public == 'draft' && Auth::guard("admin")->id() != 0)
            {
                echo '<div style="position: fixed;right: 8%;top: 2%;padding: 8px 20px;background: yellow;border-radius: 5px;z-index: 1;font-size: 18px;">草稿</div>';
            } else
            {
                $view = $bPost->view+1;
                BPost::where('id', $bPost->id)->update([
                    'view' => $view,
                ]);
            }
            
            if($bPostType->id == 1)
            {
                return view('web.page.templates.'.$bPost->template, compact('bPostType', 'bPost', 'data', 'view', 'comments'));
            } else
            {
                return view('web.post.templates.'.$bPost->template, compact('bPostType', 'bPost', 'data', 'view', 'comments'));
            }
        }

        return '<div style="text-align: center;margin: 100px 0;font-size: 25px;">暂无内容</div>';
    }
}
