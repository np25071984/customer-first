<?php

use App\CategorySlug;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
            'slug' => 'flowers_old',
            'category_id' => $id,
        ]);
        sleep(1);

        CategorySlug::create([
            'slug' => 'flowers',
            'category_id' => $id,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Красивые',
            'parent_id' => $id,
            'order' => 2,
        ]);

        CategorySlug::create([
            'slug' => 'butiful',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Сезонные',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'slug' => 'odsnfla',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Многолетние',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'slug' => 'oahi38shf',
            'category_id' => $subId,
        ]);

        $id = DB::table('categories')->insertGetId([
            'title' => 'Инструмент',
            'parent_id' => null,
            'order' => 1,
        ]);

        CategorySlug::create([
            'slug' => 'instrument',
            'category_id' => $id,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Кувалды',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'slug' => '9asfklsdds',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Отвертки',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'slug' => '8349rdgadg',
            'category_id' => $subId,
        ]);

        $subId = $id = DB::table('categories')->insertGetId([
            'title' => 'Недвижимость',
            'parent_id' => null,
            'order' => 3,
        ]);

        CategorySlug::create([
            'slug' => '9329nfskajh',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Квартиры',
            'parent_id' => $id,
            'order' => 2,
        ]);

        CategorySlug::create([
            'slug' => 'ksdn389sf',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Гаражи',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'slug' => 'sklamdf234kmlfd',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Коттеджи',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'slug' => 'o32knlksf',
            'category_id' => $subId,
        ]);

        $id = DB::table('categories')->insertGetId([
            'title' => 'Молочные продукты',
            'parent_id' => null,
            'order' => 2,
        ]);

        CategorySlug::create([
            'slug' => 'milk',
            'category_id' => $id,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Натуральные',
            'parent_id' => $id,
            'order' => 1,
        ]);

        CategorySlug::create([
            'slug' => 'o32l4kdslf',
            'category_id' => $subId,
        ]);

        $subId = DB::table('categories')->insertGetId([
            'title' => 'Заменители',
            'parent_id' => $id,
            'order' => 0,
        ]);

        CategorySlug::create([
            'slug' => 'lsdnf32nls',
            'category_id' => $subId,
        ]);

    }
}
