<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use \App\Models\BUser;
use Mail;

class TestController extends Controller
{
    public function test($test)
    {
    	return view('admin.test.'.$test);
    }

    public function mailSend()
    {
		$email_page = 'admin.test.test1';
		$data = array('name'=>"Email", "body" => "Mail"); // email標記
		$subject = "testing";
		$from_email_address = 'email@qq.com'; // 寄件者
		$from_email_name = 'test';


		$id = 1 ;
		$user = BUser::findOrFail($id);

		Mail::send($email_page, $user, function($message) use($user, $subject, $from_email_name, $from_email_address) {
			$message->from($from_email_address, $from_email_name);
			$message->to('email@qq.com')->subject($subject);
		});
    }
}
