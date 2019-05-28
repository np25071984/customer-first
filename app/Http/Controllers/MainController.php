<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function show()
    {
        $items = Item::all()->take(10);

        return view('main', ['items' => $items]);
    }

}
