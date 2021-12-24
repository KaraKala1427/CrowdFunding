<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'eCommerce'
        ]);

        Category::create([
            'name' => 'Образовательный'
        ]);

        Category::create([
            'name' => 'FinTech'
        ]);

        Category::create([
            'name' => 'Игры'
        ]);

        Category::create([
            'name' => 'Социальные сети'
        ]);

        Category::create([
            'name' => 'Аппаратное и программное обеспечение'
        ]);
    }
}
