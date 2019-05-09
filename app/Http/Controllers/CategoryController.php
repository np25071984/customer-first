<?php

namespace App\Http\Controllers;

use App\Category;
use App\CategorySlug;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function show($slug)
    {
        // find actual slug by given one (check if it obsolete)
        $categorySlug = CategorySlug::where('slug', $slug)->with('category')->firstOrFail();
        $category = $categorySlug->category;
        $actualSlug = $category->slug->value;

        /*
        $actualSlug = \DB::select('
            SELECT slug
            FROM categories_slug
            WHERE category_id = (
                SELECT category_id
                FROM categories_slug
                WHERE slug = ?)
            ORDER BY created_at
            DESC LIMIT 1',
            [$slug]
        );
        if (!$actualSlug || !isset($actualSlug[0])) {
            throw new ModelNotFoundException;
        }
        $actualSlug = $actualSlug[0]->slug;
        */

        // redirect if there is a fresh slug
        if ($slug !== $actualSlug) {
            return redirect(route('category.show', $actualSlug), 301);
        }

        return view('category/show', ['category' => $category]);
    }
}
