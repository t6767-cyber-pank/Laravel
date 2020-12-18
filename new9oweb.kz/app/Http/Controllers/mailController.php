<?php

namespace App\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use app\mail\newMail;

class mailController extends Controller
{
    public function send2()
    {
        Mail::send(['text' => 'mail'], ['name', 'web dew'], function ($message){
            $message->to('t6767@mail.ru', 'to me')->subject('test email');
            $message->from('tmuralev777999@yandex.kz', "wdb");
        });
    }

    public function send()
    {
        Mail::send(new newMail());
    }
    public function email()
    {
        return view('email');
    }

}
