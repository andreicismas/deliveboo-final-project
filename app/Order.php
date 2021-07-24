<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        "delivery_address", "customer_mail"
    ];

    public function dishes() {
        return $this->belongsToMany("App\Dish");
    }
}
