<?php

use App\ItemContainer;
use App\Item;
use App\ItemSlug;
use Illuminate\Database\Seeder;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $container = App\ItemContainer::where('name', 'Архидея')->first();

        $item = Item::create([
            'container_id' => $container->id,
            'article' => 'AH83293',
            'name' => 'обыкновенная',
            'description' => 'Описание для Архидеи Обыкновенной',
            'price' => 199.99,
        ]);

        ItemSlug::create([
            'item_id' => $item->id,
            'value' => 'slug-item-a',
        ]);
        sleep(1);

        ItemSlug::create([
            'item_id' => $item->id,
            'value' => 'slug-item-b',
        ]);

        $container = App\ItemContainer::where('name', 'Роза')->first();

        $item = Item::create([
            'container_id' => $container->id,
            'article' => 'RZ35693',
            'name' => 'красная',
            'description' => 'Цветы розы красного цвета с насыщенным араматом',
            'price' => 150.15,
        ]);

        ItemSlug::create([
            'item_id' => $item->id,
            'value' => 'slug-item-c',
        ]);

        $container = App\ItemContainer::where('name', 'Смоленская кувалда')->first();

        $item = Item::create([
            'container_id' => $container->id,
            'article' => 'HB80453',
            'name' => 'длинная рукоять',
            'description' => 'Кувалда с длинной рукоятью',
            'price' => 50,
        ]);

        ItemSlug::create([
            'item_id' => $item->id,
            'value' => 'slug-item-d',
        ]);

        $item = Item::create([
            'container_id' => $container->id,
            'article' => 'HB80483',
            'name' => 'короткая',
            'description' => 'Кувалда короткая с удобным хватом',
            'price' => 30,
        ]);

        ItemSlug::create([
            'item_id' => $item->id,
            'value' => 'slug-item-e',
        ]);

        $container = App\ItemContainer::where('name', 'Деревянна облегченная')->first();

        $item = Item::create([
            'container_id' => $container->id,
            'article' => 'OD34323',
            'name' => 'сосновая',
            'description' => 'Деревяная кувалда из сосны',
            'price' => 10.5,
        ]);

        ItemSlug::create([
            'item_id' => $item->id,
            'value' => 'slug-item-f',
        ]);

    }
}
