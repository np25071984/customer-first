<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\ItemImage;
use App\ItemContainer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ItemContainer $container)
    {
        return view('admin/item/create', compact('container'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            \DB::beginTransaction();

            $item = Item::create([
                'container_id' => $request->container_id,
                'article' => $request->article,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
            ]);

            if($request->hasFile('image')) {
                $files = $request->file('image');
                foreach ($files as $id => $file) {
                    ItemImage::create([
                        'item_id' => $item->id,
                        'src' => $request->filename[$id],
                    ]);

                    $destinationPath = storage_path("item_image_orig/{$item->id}");
                    $file->move($destinationPath, $request->filename[$id]);
                }
            }

            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            throw $e;
        }

        $request->session()->flash('message', 'Новый товар успешно добавлен!');

        return redirect(route('admin.item.show' , $item->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('admin/item/show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('admin/item/edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        try {
            \DB::beginTransaction();

            $item->name = $request->name;
            $item->article = $request->article;
            $item->description = $request->description;
            $item->price = $request->price;
            $item->save();

            if($request->hasFile('image')) {
                $files = $request->file('image');
                foreach ($files as $id => $file) {
                    ItemImage::create([
                        'item_id' => $item->id,
                        'src' => $request->filename[$id],
                    ]);

                    $destinationPath = storage_path("item_image_orig/{$item->id}");
                    $file->move($destinationPath, $request->filename[$id]);
                }
            }

            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            throw $e;
        }

        if ($request->has('remove')) {
            foreach ($request->remove as $imgId) {
                ItemImage::find($imgId)->delete();
            }
        }

        $request->session()->flash('message', 'Изменения успешно сохранены!');

        return redirect(route('admin.item.show' , $item->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $containerId = $item->container->id;

        $item->delete();

        return redirect(route('admin.container.show', $containerId));

    }
}
