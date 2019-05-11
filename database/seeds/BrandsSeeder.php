<?php

use App\Brand;
use App\BrandSlug;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::create([
            'name' => 'first brand',
            'description' => 'First brand description',
        ]);

        BrandSlug::create([
            'brand_id' => $brand->id,
            'value' => 'first-brand-old',
        ]);
        sleep(1);
        BrandSlug::create([
            'brand_id' => $brand->id,
            'value' => 'first-brand',
        ]);

        $brand = Brand::create([
            'name' => 'second brand',
        ]);

        BrandSlug::create([
            'brand_id' => $brand->id,
            'value' => 'second-brand',
        ]);

        $brand = Brand::create([
            'name' => 'third brand',
            'description' => 'Third brand description',
        ]);

        BrandSlug::create([
            'brand_id' => $brand->id,
            'value' => 'third-brand',
        ]);
    }
}
