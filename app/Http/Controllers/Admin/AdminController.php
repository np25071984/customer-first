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
        // TODO: add with Slug
        $categories = Category::where('parent_id', null)->with('children', 'slug')->get();
        dd($categories);
        $categories = Category::where('parent_id', null)->orderBy('order')->with('children', 'slug')->get();
        return view('admin/categories_list', ['categories' => $categories]);
    }
}
