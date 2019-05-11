<?php

use App\CategorySlug;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = DB::table('categories')->insertGetId([
            'title' => 'Цветы',
            'parent_id' => null,
            'order' => 0,
        ]);

        CategorySlug::create([
            'value' => 'flowers_old',
            'category_id' => $id,
        ]);
        sleep(1);

        CategorySlug::create([
            'value' => 'flowers',
            'category_id' => $id,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Красивые',
            'parent_id' => $id,
            'order' => 2,
        ]);

        CategorySlug::create([
            'value' => 'beautiful',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Сезонные',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'value' => 'odsnfla',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Многолетние',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'value' => 'oahi38shf',
            'category_id' => $subId,
        ]);

        $id = DB::table('categories')->insertGetId([
            'title' => 'Инструмент',
            'parent_id' => null,
            'order' => 1,
        ]);

        CategorySlug::create([
            'value' => 'instrument',
            'category_id' => $id,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Кувалды',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'value' => 'sledgehammer',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Отвертки',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'value' => '8349rdgadg',
            'category_id' => $subId,
        ]);

        $subId = $id = DB::table('categories')->insertGetId([
            'title' => 'Недвижимость',
            'parent_id' => null,
            'order' => 3,
        ]);

        CategorySlug::create([
            'value' => '9329nfskajh',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Квартиры',
            'parent_id' => $id,
            'order' => 2,
        ]);

        CategorySlug::create([
            'value' => 'ksdn389sf',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Гаражи',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'value' => 'sklamdf234kmlfd',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Коттеджи',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'value' => 'o32knlksf',
            'category_id' => $subId,
        ]);

        $id = DB::table('categories')->insertGetId([
            'title' => 'Молочные продукты',
            'parent_id' => null,
            'order' => 2,
        ]);

        CategorySlug::create([
            'value' => 'milk',
            'category_id' => $id,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Натуральные',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'value' => 'o32l4kdslf',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Заменители',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'value' => 'lsdnf32nls',
            'category_id' => $subId,
        ]);
    }
}
