<?php

use App\ItemContainer;
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
        $slug = CategorySlug::where('value', 'beautiful')->first();
        $category = Category::where('id', $slug->category_id)->first();

        ItemContainer::create([
            'category_id' => $category->id,
            'name' => 'Архидея',
        ]);

        ItemContainer::create([
            'category_id' => $category->id,
            'name' => 'Роза',
        ]);

        $slug = CategorySlug::where('value', 'sledgehammer')->first();
        $category = Category::where('id', $slug->category_id)->first();

        ItemContainer::create([
            'category_id' => $category->id,
            'name' => 'Смоленская кувалда',
        ]);

        ItemContainer::create([
            'category_id' => $category->id,
            'name' => 'Деревянна облегченная',
        ]);
    }
}
