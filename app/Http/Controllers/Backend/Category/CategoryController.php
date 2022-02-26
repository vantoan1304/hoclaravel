<?php

namespace App\Http\Controllers\Backend\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Category\StoreCategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category\Category;

class CategoryController extends Controller
{

    private $data = [];
    public function __construct(){

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        return view('components.backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->data['isEdit'] = false;
        $this->data['category'] = [];
        return view('components.backend.category.create', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $dl = $request->all();
        $category = Category::create($dl);
        if(!$category){
            return redirect()->route('backend.category.index')->with('error', 'Fail to store category');
        }
        return redirect()->route('backend.category.index')->with('success', 'Add category success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('backend.category.index')->with('error', 'id '.$id.' not a vail');
        }
        $this->data['isEdit'] = true;
        $this->data['category'] = $category;

        return view('components.backend.category.create', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $dl = $request->all();
        $category = Category::find($id);
        if(!$category){
            return redirect()->route('backend.category.index')->with('error', 'id '.$id.' not a vail');
        }
        $category->update($dl);
        return redirect()->route('backend.category.index')->with('success', 'Update success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
