<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\BackendController;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{
    public function index(){

        return view('components.backend.category.index');
    }
    public function showform(){

//        $query = $request->query();
//        dd('$query');
        return view('components.backend.category.add');
    }
    public function handleCategory(){
//
    }
}
