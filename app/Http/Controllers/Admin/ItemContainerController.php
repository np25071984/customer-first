<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\ItemContainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $containers = ItemContainer::paginate(15);
        return view('admin/item_container/index', compact('containers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::Roots()->get();
        return view('admin/item_container/create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $containter = ItemContainer::create([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $request->session()->flash('message', 'Новый контейнер успешно добавлен!');

        return redirect(route('admin.container.show' , $containter->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ItemContainer $container)
    {
        return view('admin/item_container/show', compact('container'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemContainer $container)
    {
        $brands = Brand::all();
        $categories = Category::Roots()->get();
        return view('admin/item_container/edit', compact('container', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemContainer $container)
    {
        $container->brand_id = $request->brand_id;
        $container->category_id = $request->category_id;
        $container->name = $request->name;
        $container->description = $request->description;
        $container->save();

        $request->session()->flash('message', 'Изменения успешно сохранены!');

        return redirect(route('admin.container.show' , $container->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemContainer $container)
    {
        $container->delete();

        return redirect(route('admin.container.index'));
    }
}
