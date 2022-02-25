<?php

namespace App\Http\Controllers\Backend\Posts;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class PostController extends BackendController
{
    public function index(){
        return view('components.backend.posts.index');
    }
}
