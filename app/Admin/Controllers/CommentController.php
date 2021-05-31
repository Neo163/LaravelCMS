<?php

namespace App\Admin\Controllers;

use Illuminate\Support\Facades\DB;
use \App\Models\BUser;
use \App\Models\BComment;
use \App\Models\BPostCategory;

class CommentController extends Controller
{
    // 设计目标：实现以首发评论数为依据的分页功能。避免需要获取评论整张表的数据后才组合成目标数组。
    // 无限分级评论采用【单表+双parent】设计。parent=0为首发评论，parent>0,parent_reply=0为首发评论第一条回复，parent>0,parent_reply>0为首发评论第二条及之后的评论。
    public function comments($status)
    {
        $bdata = array();
        $bdata['status'] = $status;

        // 以首发评论为依据实现分页功能
        // status，0未审核，1已审核，2被举报
        if($status == 'all')
        {
            $items = BComment::where('parent', 0)->orderBy('created_at', 'desc')->paginate(5);
        } elseif ($status == 'uncheck')
        {
            $items = BComment::where('parent', 0)->where('status', 0)->orderBy('created_at', 'desc')->paginate(5);
        } elseif ($status == 'approve')
        {
            $items = BComment::where('parent', 0)->where('status', 1)->orderBy('created_at', 'desc')->paginate(5);
        } elseif ($status == 'report')
        {
            $items = BComment::where('parent', 0)->where('report', 1)->orderBy('created_at', 'desc')->paginate(5);
        } else
        {
            return redirect('/admin/comments/all');
        }

        $bdata['items'] = $items;

        $bdata['content'] = 'yes';
        if(empty($items[0]))
        {
            $bdata['content'] = 'no';
        }

        $bdata['comments'] = $this->commentArray($items);

        return view("admin.comment.index", compact('bdata'));
    }

    public function commentArray($items)
    {
        $comments = array();
        $i = 0;
        foreach ($items as $comment)
        {
            $comments[$i] = $comment;
            $i++;

            // 首发评论第一条回复
            $countCom = BComment::where('parent', $comment->id)->orderBy('created_at', 'desc');
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

        return $comments;
    }

    public function add()
    {
        return view("admin.comment.add");
    }

    public function check()
    {
        $data = array();
        $data['status'] = 'Fail';

        $checkKey = 'checkVkVm1sdss%……&（……&**（lcI0003Comment';
        if ( request('checkKey') == $checkKey )
        {
            BComment::where( 'id', request('id') )->update([
                'status' => request('status'),
            ]);

            $data['status'] = request('status');
        }

        return $data;
    }

    public function delete()
    {
        $deleteKey = 'del1eteVkVm1$#&(&(&(**)_)()(5678bsInZhb2HVlcI0003deleteComment';

        if ( request('deleteKey') == $deleteKey )
        {
            $children = BComment::where('parent', request('id'));

            if($children->count() > 0 )
            {
                $children->delete();
            }

            // 事务处理
            $BComment = BComment::findOrFail(request('id'));

            if($BComment->delete())
            {
                return 'delete';
            }
        }

        return 'delete fail';
    }
}