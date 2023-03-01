<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodCategory::firstOrCreate(
            ['name' => 'Desszertek'],
            ['name' => 'Desszertek']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Levesek'],
            ['name' => 'Levesek']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Pizzák'],
            ['name' => 'Pizzák']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Panzerottik'],
            ['name' => 'Panzerottik']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Kenyérlángosok'],
            ['name' => 'Kenyérlángosok']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Saláták'],
            ['name' => 'Saláták']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Tészták'],
            ['name' => 'Tészták']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Tálak'],
            ['name' => 'Tálak']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Főételek'],
            ['name' => 'Főételek']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Gyros'],
            ['name' => 'Gyros']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Qurrito'],
            ['name' => 'Qurrito']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Üdítők'],
            ['name' => 'Üdítők']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Savanyúság'],
            ['name' => 'Savanyúság']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Köretek'],
            ['name' => 'Köretek']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Szószok, öntetek'],
            ['name' => 'Szószok, öntetek']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Kebab'],
            ['name' => 'Kebab']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Boxok'],
            ['name' => 'Boxok']
        );
        FoodCategory::firstOrCreate(
            ['name' => 'Sombrero'],
            ['name' => 'Sombrero']
        );

    }
}
