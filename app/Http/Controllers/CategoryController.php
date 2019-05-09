<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategorySlug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function show(CategorySlug $slug)
    {
        $category = $slug->category;
        $actualSlug = $category->slug->value;

        // redirect if there is a fresh slug
        if ($slug->value !== $actualSlug) {
            return redirect(route('category.show', $actualSlug), 301);
        }

        return view('category/show', ['category' => $category]);
    }
}
