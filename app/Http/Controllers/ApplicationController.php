<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppRequest;
use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function createApp(){
        $categories = Category::all();

        return view('application.create', ['categories' => $categories]);
    }

    public function createAppPost(CreateAppRequest $request){

        $file = $request->file('photo');
        $fileInfo = $file->getClientOriginalName();
        $filename = pathinfo($fileInfo, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $store = $filename . '_' . time() . '.' . $extension;
        $file->storeAs('public/', $store);

        Application::create([
            'nickname' => $request->input('nickname'),
            'description' => $request->input('description'),
            'category_id' => $request->input('category_id'),
            'user_id' => Auth::user()->id,
            'status' => $request->input('status'),
            'photo' => $store,
        ]);
        return back()->with('success', true);
    }
    public function delete($id)
    {
        Application::where('id', $id)->delete();

        return back()->with('delete', true);
    }
}
