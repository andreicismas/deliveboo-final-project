<?php

use App\Payment;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //Payment::truncate();

        for ($i = 0; $i < 10; $i++) {
            $newPayment = new Payment();
            $newPayment->payment_amount = $faker->randomFloat(2, 0, 999);
            $newPayment->payment_status = true;

            $newPayment->save();
        }
    }
}
