<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class BackendController extends BaseController
{
    public function __construct(){
    }

    public function index(){
        return view('components.layouts.backend');
    }
}
