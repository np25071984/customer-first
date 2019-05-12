<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Requests\Admin\BrandStoreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(15);
        return view('admin/brand/index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        $brand = Brand::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect(route('brand.show' , $brand->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin/brand/show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin/brand/edit', ['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  BrandStoreRequest $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreRequest $request, Brand $brand)
    {
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();
        $request->session()->flash('message', 'Изменения успешно сохранены!');
        return redirect(route('brand.index'));
    }

    /**
     * @param Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Request $request, Brand $brand)
    {
        $brand->delete();
        $request->session()->flash('message', 'Бренд успешно удален!');
        return redirect(route('brand.index'));
    }
}
