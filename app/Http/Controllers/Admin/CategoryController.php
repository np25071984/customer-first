<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::Roots()->oldest('order')->with('children')->get();
        return view('admin/category/list', compact('categories'));
    }
}
