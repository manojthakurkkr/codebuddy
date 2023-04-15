<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::where('parent_id', '=', config('constant.parent_category'))->get();
        $allCategories = Category::pluck('name','id')->all();
        return view('admin.categories.index',compact('categories','allCategories'));
    }
    public function add(Request $request)
    {
        $allCategories = Category::select('name','id')->get();
        return view('admin.categories.add',compact('allCategories'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
        		'name' => 'required',
        	]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? config('constant.parent_category') : $input['parent_id'];
        Category::create($input);
        return redirect(route('admin.categories.index'))->with('success', 'New Category added successfully.');
    }
    public function manageCategory()
    {
        $categories = Category::where('parent_id', '=', config('constant.parent_category'))->get();
        $allCategories = Category::pluck('name','id')->all();
        return view('admin.categories.index',compact('categories','allCategories'));
    }


}
