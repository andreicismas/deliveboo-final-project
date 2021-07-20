<?php

use App\Type;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;


class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            "AsianFusion", "Dolci", "Fritti", "Gelato", "Giapponese", "Hamburger", "Insalate", "Italiano", "Kebab", "Panini", "Pizza", "Pollo", "Senza Glutine" 
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Str::slug($type);
            $newType->save();
        }
    }
}
