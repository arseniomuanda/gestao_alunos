<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        return view('login/login');
    }

    public function resgatarpass()
    {
        return view('login/resgatar');
    }
}
