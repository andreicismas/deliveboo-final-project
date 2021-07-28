<?php

use App\Dish;
use App\User;
use Faker\Generator as Faker;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
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
        Schema::disableForeignKeyConstraints();

        Dish::truncate();

        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\it_IT\Restaurant($faker));

        $users = User::all()->pluck('id');

        if($users->isEmpty()) {
            for ($i = 0; $i < 10; $i++) {

                $newDish = new Dish();
                $newDish->name = $faker->foodName();
                $newDish->user_id = number_format(1);
                $newDish->ingredients = $faker->beverageName() . ", "
                                        .$faker->vegetableName() . ", "
                                        .$faker->meatName() . ", "
                                        .$faker->sauceName();
                $newDish->description = $faker->text();
                $newDish->price = $faker->randomFloat(2, 0, 20);
                $newDish->visibility = true;

                $newDish->save();
            }

            Schema::enableForeignKeyConstraints();

            return;
        }

        Schema::enableForeignKeyConstraints();
        
        foreach (range(1, 30) as $index) {
            $dish = Dish::create([
                'name' => $faker->foodName(),
                'user_id' => $faker->randomElement($users),
                'ingredients' => $faker->dairyName().", "
                                .$faker->vegetableName().", "
                                .$faker->meatName().", "
                                .$faker->sauceName(),
                'description' => $faker->text(),
                'price' => $faker->randomFloat(2, 0, 20),
                'visibility' => true
            ]);
        }
    }
}
