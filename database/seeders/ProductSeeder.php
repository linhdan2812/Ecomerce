<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
use Faker\Generator as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            \DB::table('products')->insert([
                'title' => $faker->name,
                'status' => 'active',
                'price' => $faker->randomNumber(6),
                'stock' => 1,
                'photo' => $faker->imageUrl($width = 640, $height = 480),
            ]);
        }
    }
}
