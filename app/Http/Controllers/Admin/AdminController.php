<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function dashboard()
    {
        return view('admin/dashboard');
    }

    public function categoriesList()
    {
        $categories = Category::Root()->oldest('order')->with('children')->get();
        return view('admin/categories_list', ['categories' => $categories]);
    }
}
