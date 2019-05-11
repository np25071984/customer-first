<?php

use App\ItemContainer;
use App\Brand;
use App\BrandSlug;
use App\Category;
use App\CategorySlug;
use Illuminate\Database\Seeder;

class ItemContainersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categrySlug = CategorySlug::where('value', 'beautiful')->first();
        $category = Category::where('id', $categrySlug->category_id)->first();
        $brandSlug = BrandSlug::where('value', 'first-brand')->first();
        $brand = Brand::where('id', $brandSlug->brand_id)->first();

        ItemContainer::create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'name' => 'Архидея',
        ]);

        ItemContainer::create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'name' => 'Роза',
        ]);

        $categrySlug = CategorySlug::where('value', 'sledgehammer')->first();
        $category = Category::where('id', $categrySlug->category_id)->first();
        $brandSlug = BrandSlug::where('value', 'third-brand')->first();
        $brand = Brand::where('id', $brandSlug->brand_id)->first();

        ItemContainer::create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'name' => 'Смоленская кувалда',
        ]);

        ItemContainer::create([
            'category_id' => $category->id,
            'brand_id' => $brand->id,
            'name' => 'Деревянна облегченная',
        ]);
    }
}
