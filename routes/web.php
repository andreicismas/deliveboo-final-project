<?php

use App\Type;
use App\Order;
use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

Auth::routes();

//Sarà la Dashboard dell'UR
Route::get('/home', 'HomeController@index')->name('home');

//ORDERS UR
Route::post("/orders", "OrderController@store")->name("orders.store");
Route::get("/orders/create/{slug}", "OrderController@create")->name("orders.create");

Route::middleware('auth')
    //->prefix('user/{user}')
    ->group(function () {

        //ORDERS
        Route::get("/orders", "OrderController@index")->name("orders.index");
        Route::get("/orders/{order}", "OrderController@show")->name("orders.show");

        //DISHES
        Route::resource("/dishes", "DishController");
    });

// braintree
Route::post("/payment", function (Request $request) {
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);
    // validazione dati request
    // dump($request);
    // return;

    $token = $gateway->ClientToken()->generate();

    // prendo i piatti del ristorante


    return view("payment", [
        "token" => $token,
        "ordered_dishes" => $request->dishes
    ]);
})->name("payment");

Route::post('/checkout', function (Request $request) {
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);

    // $amount = $request->amount;
    $amount = 10;
    $nonce = $request->payment_method_nonce;

    $name = $request->customer_name;
    $mail = $request->customer_mail;
    $phone = $request->customer_phone_number;
    $address = $request->delivery_address;

    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'customer' => [
            'firstName' => $name,
            'email' => $mail,
            'phone' => $phone,
        ],
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        // $transaction = $result->transaction;

        // return redirect()->route("orders.store");

        // immissione dell'orders.store
        $request->validate([
            'delivery_address' => 'required|max:255',
            'customer_mail' => 'required|email:rfc,dns'
        ]);

        $data = $request->all();
        $newOrder = new Order();
        $newOrder->fill($data);

        // temp
        $newOrder["payment_amount"] = 10;
        $newOrder["payment_status"] = true;

        $newOrder->save();

        $dishes = collect($request->input('dishes', [])) //colleziona i dati nell'input e li mappa con la...
            ->filter(function ($dish) {
                return !is_Null($dish);
            })
            ->map(function ($dish) {
                return ['quantity' => $dish];  //...terza colonna chiamata nel model Order
            });
        //dd($dishes);
        $newOrder->dishes()->sync($dishes);
        return redirect()->route('welcome');
        // 

    } else {
        $errorString = "";

        foreach ($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }

        return back()->withErrors('An error occurred with the message: ' . $result->message);
    }
})->name("checkout");

// //valutare se e come passare lo user_id come argomento
// Route::get("/dishes/user/{user}", "DishController@index")->name("dishes.index"); 

//Route::get("/dishes", "DishController@index")->name("dishes.index"); 
//Route::post("/dishes", "DishController@store")->name("dishes.store");
//Route::get("/dishes/create", "DishController@create")->name("dishes.create");
//Route::get("/dishes/{dish}", "DishController@show")->name("dishes.show");
//Route::match(["put", "patch"], "/dishes/{dish}", "DishController@update")->name("dishes.update");
//Route::delete("/dishes/{dish}", "DishController@destroy")->name("dishes.destroy");
//Route::get("/dishes/{dish}/edit", "DishController@edit")->name("dishes.edit");
