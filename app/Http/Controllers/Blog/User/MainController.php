<?php

namespace App\Http\Controllers\Blog\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MetaTag;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        MetaTag::setTags(['title' => 'Пользователь']);
        return view('blog.user.index');
    }
}
