<?php

use App\Dish;
use Faker\Generator as Faker;

use Illuminate\Database\Seeder;
use PhpOption\None;

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
        // Dish::truncate();
        

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));
        
        for ($i = 0; $i < 10; $i++ ) {

            
            $newDish = new Dish();
            $newDish->name = $faker->foodName();
            $newDish->user_id =number_format(1);
            $newDish->ingredients =$faker->beverageName();
            $newDish->description = $faker->dairyName();
            $newDish->price = $faker->randomFloat(2, 0, 99);
            $newDish->visibility = true;
            
            $newDish->save();

          
        }
    }
}
// <?php

// $faker = \Faker\Factory::create();
// $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

// // Generator
// $faker->foodName();      // A random Food Name
// $faker->beverageName();  // A random Beverage Name
// $faker->dairyName();  // A random Dairy Name
// $faker->vegetableName();  // A random Vegetable Name
// $faker->fruitName();  // A random Fruit Name
// $faker->meatName();  // A random Meat Name
// $faker->sauceName();  // A random Sauce Name
