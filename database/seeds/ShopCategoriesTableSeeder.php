<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShopCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        for($i = 1; $i<=10; $i++){

            $title = 'Category #' . $i;
            $description = 'Description category #' . $i;

            $categories[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $description,
            ];

        }
        DB::table('shop_categories')->insert($categories);
    }
}
