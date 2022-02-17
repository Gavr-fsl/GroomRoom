<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){
        $count = Application::where(['status' => 'Решена'])->count();

        return view('index',  compact('count'));
    }
}
