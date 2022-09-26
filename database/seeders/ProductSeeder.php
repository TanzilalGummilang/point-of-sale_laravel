<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $field = [
            'discount' => 0,
            'stock' => 10
        ];

        Product::create(array_merge([
            'category_id' => 1,
            'name' => 'djarum super 12btg',
            'brand' => 'djarum',
            'purchase_price' => 200000,
            'selling_price' => 220000,
        ], $field));
        Product::create(array_merge([
            'category_id' => 1,
            'name' => 'gudang garam filter 12btg',
            'brand' => 'gudang garam',
            'purchase_price' => 200000,
            'selling_price' => 220000,
        ], $field));
        Product::create(array_merge([
            'category_id' => 1,
            'name' => 'sampurna mild 12btg',
            'brand' => 'sampurna',
            'purchase_price' => 180000,
            'selling_price' => 200000,
        ], $field));
        Product::create(array_merge([
            'category_id' => 2,
            'name' => 'kapal api special mix sachet 24gr',
            'brand' => 'kapal api',
            'purchase_price' => 9000,
            'selling_price' => 10000,
        ], $field));
        Product::create(array_merge([
            'category_id' => 2,
            'name' => 'abc susu sachet 24gr',
            'brand' => 'abc',
            'purchase_price' => 8000,
            'selling_price' => 9000,
        ], $field));
    }
}
