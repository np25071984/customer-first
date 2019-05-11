<?php

namespace App\Http\Controllers;

use App\ItemSlug;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function show(ItemSlug $slug)
    {
        $item = $slug->item;
        $actualSlug = $item->slug->value;

        // redirect if there is a fresh slug
        if ($slug->value !== $actualSlug) {
            return redirect(route('item.show', $actualSlug), 301);
        }

        return view('item/show', ['item' => $item]);
    }

}
