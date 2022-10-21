<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\News\Model\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => 1, 'name' => 'Компьютерное железо'],
            ['code' => 2, 'name' => 'Тесты'],
            ['code' => 3, 'name' => 'Смартфоны'],
            ['code' => 4, 'name' => 'Технологии'],
        ];

        collect($data)->each(function ($item){
            Category::query()->updateOrCreate([
                'code' => $item['code']
            ], $item);
        });
    }
}
