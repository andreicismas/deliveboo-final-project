<?php

use App\Dish;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
//use Faker\FakerRestaurant\Restaurant;

 //$faker = \Faker\Factory::create();
 //$faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Dish::truncate();
        
        for ($i = 0; $i < 10; $i++ ) {
            $newDish = new Dish();
            $newDish->name = $faker->name();
            $newDish->ingredients = $faker->text();
            $newDish->description = $faker->text();
            $newDish->price = $faker->randomFloat(2, 0, 99);
            $newDish->visibility = true;

            $newDish->save();
        }
    }
}
