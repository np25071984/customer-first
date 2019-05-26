<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\BrandSlug;
use App\Http\Requests\Admin\BrandStoreRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
        $slug = Str::slug($request->slug, '-');

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = $request->filename;
            $destinationPath = storage_path('/brand_logo_orig/');
            $logo->move($destinationPath, $logoName);
        } else {
            $logoName = null;
        }

        try {
            \DB::beginTransaction();

            $brand = Brand::create([
                'name' => $request->name,
                'description' => $request->description,
                'logo' => $logoName,
            ]);

            BrandSlug::create([
                'brand_id' => $brand->id,
                'value' => $slug,
            ]);

            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            throw $e;
        }

        $request->session()->flash('message', 'Новый бренд успешно добавлен!');

        return redirect(route('admin.brand.show' , $brand->id));
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
        $logopath = storage_path("/brand_logo_orig/{$brand->logo}");
        if ($request->hasFile('logo')) {
            if ($brand->logo && File::exists($logopath)) {
                File::delete($logopath);
            }

            $logo = $request->file('logo');
            $logoName = $request->filename;
            $destinationPath = storage_path('/brand_logo_orig/');
            $logo->move($destinationPath, $logoName);
        } else {
            if ($request->remove) {
                // remove logo file
                if (File::exists($logopath)) {
                    File::delete($logopath);
                }
                $logoName = null;
            } elseif ($request->filename !== $brand->logo) {
                // rename logo file
                if (File::exists($logopath)) {
                    File::move(
                        $logopath,
                        storage_path("/brand_logo_orig/{$request->filename}")
                    );
                }
                $logoName = $request->filename;
            }
        }

        try {
            \DB::beginTransaction();

            $slug = Str::slug($request->slug, '-');

            if ($slug !== $brand->slug->value) {
                BrandSlug::create([
                    'brand_id' => $brand->id,
                    'value' => $slug,
                ]);
            }

            $brand->name = $request->name;
            $brand->description = $request->description;
            if ($logoName || $request->remove) {
                $brand->logo = $logoName;
            }
            $brand->save();

            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            throw $e;
        }

        $request->session()->flash('message', 'Изменения успешно сохранены!');

        return redirect(route('admin.brand.show' , $brand->id));
    }

    /**
     * @param Request $request
     * @param Brand $brand
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Request $request, Brand $brand)
    {
        try {
            \DB::beginTransaction();

            BrandSlug::where('brand_id', $brand->id)->delete();

            $brand->delete();

            $request->session()->flash('message', 'Бренд успешно удален!');

            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            throw $e;
        }

        return redirect(route('admin.brand.index'));
    }
}
