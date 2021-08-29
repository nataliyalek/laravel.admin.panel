<?php

namespace App\Http\Controllers\Blog\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function index(){
        return view('blog.user.index');
    }
}
