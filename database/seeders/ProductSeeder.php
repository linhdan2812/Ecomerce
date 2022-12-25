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
                'size' => '["S","M","L"]',
                'price' => $faker->randomNumber(2) * 10000,
                'stock' => 1,
                'photo' => 'uploads/products/639a07fc4539c-124602284_1281968725534852_8190833051340759716_n.jpg',
                'images' =>'["uploads\/products\/639a07fc445fa-159619156_1368224876909236_1845970681692965881_n.jpg","uploads\/products\/639a07fc44d7c-213510437_1461092024289187_6527211432507163266_n.jpg"]',
                'created_at' =>  $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'color' => '["Tr\u1eafng","\u0110en",null]',
            ]);
        }
    }
}
