<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin(){
        $applications = Application::select('applications.*', 'categories.name')
            ->leftJoin('categories', 'categories.id', '=', 'applications.category_id')
            ->orderbyDesc('status')
            ->get();

        return view('admin.account', compact('applications'));
    }

    public function editCategory(){
        $categories = Category::all();

        return view('admin.categories', compact('categories'));
    }
    public function editCategoryPost(CategoryRequest $request){
        Category::create($request->all());
        return back()->with('success', true);
    }
    public function destroyCategory(){

    }
}
