<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
	public function qqEmail()
	{
        \Mail::send('web.demo.email',['name'=>'Neo'],function($message){
            $to = '1619319967@qq.com';
            $message ->to($to)->subject('测试邮件');
        });

        echo 'OK !';
    }

    public function gmail(Request $request)
    {
        $data = array('name'=>"Email 1", "body" => "Test mail"); // email標記
    
		Mail::send('web.demo.email', $data, function($message) {
		    $message->to('1619319967@qq.com', 'Neo get email')->subject('Email title'); // 收件者
		    $message->from('1619319967@qq.com','Neo sent email'); // 寄件者
		});

		echo 'Send email OK !';
    }
}
