<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Doctrine\DBAL\Driver\IBMDB2\DB2Driver;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {

    $restaurantName = ['Fratelli La Bufala', 'Road House', 'Da Sahid', 'Haochi Canguan', 'Tenji', 'Il Fornello',
    'Osteria dei Servi', 'I Gelsi', 'Carpe Diem', 'La Brace', 'Puccetteria', 'PokeHouse', 'Delifrance', 'Battistini',
    'Giusto Spirito', 'Meat', 'Mosquito', 'Caracol', 'Da Walter', 'Pizzeria Paradiso', 'I Tramonti', 'Casa Matta',
    'Fortuna Rosa Albicocca', 'Il Gelsomino', 'Da Gelia'];

    $randomRestaurantName = $restaurantName[rand(0, count($restaurantName) - 1)];

    $slug = Str::slug($randomRestaurantName);
    dump($slug);
    $slugTemp = $slug;
    $slugExists = App\User::where("slug", $slug)->first();

    $counter = 1;
    dump($slugExists);
    
    while ($slugExists) {
        $slug = $slugTemp . "-" . $counter;
        $counter++;
        $slugExists = App\User::where("slug", $slug)->first();
    }
    
    $uniqueSlug = $slug;
    
    dump($randomRestaurantName,$slug,$slugExists,$uniqueSlug);
        
    return [
        'name' => $randomRestaurantName,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password(8,20),//'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),

        'address' => $faker->address(),
        'VAT' => strval(rand(0,9)).strval(random_int(1000000000,2147483647)),
        'slug' => $uniqueSlug
    ];
});
