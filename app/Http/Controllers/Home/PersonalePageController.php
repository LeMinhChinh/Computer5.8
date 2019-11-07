<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalePageController extends Controller
{
    public function infoUser()
    {
        return view('home.user.info');
    }
}
