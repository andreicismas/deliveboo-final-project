<?php

use App\Order;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Order::truncate();
        //Cannot truncate a table referenced in a foreign key constraint (`deliveboo`.`dish_order`, CONSTRAINT `dish_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `deliveboo`.`orders` (`id`))")

        for ($i = 0; $i < 5; $i++) {
            $newOrder = new Order();
            $newOrder->customer_name = $faker->name();
            $newOrder->customer_phone_number = $faker->phoneNumber();
            $newOrder->delivery_address = $faker->address();
            $newOrder->customer_mail = $faker->safeEmail;
            $newOrder->payment_amount = $faker->randomFloat(2, 0, 99);
            $newOrder->payment_status = true;

            $newOrder->save();
        }
    }
}
