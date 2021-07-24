<?php


namespace App\Http\Controllers;

use App\Dish;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        // prendi gli ordini in cui lo user_id del primo piatto è uguale allo user_id passato per argomento

        // $orders = Order::where()->get();

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*----------------------------------------------------------------DA QUI PROVE
    public function create($user_id)
    {
        $dishes = Dish::where('user_id', $user_id)->get();
        $data = [
            'dishes' => $dishes
        ];

        return view ('order.create', $data);        
    }----*/

    public function create() 
        {
            $dishes = Dish::all(); //!!!! non passeranno tutti i piatti ma solo quelli del ristornate selezionato
        
            return view ('orders.create', ['dishes'=>$dishes]);        
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $request->validate([
            'delivery-address' => 'required|max:255',
            'customer-mail' => 'required|email:rfc,dns'
        ]);*/

        $data = $request->all();
        $newOrder = new Order();
        $newOrder->fill($data);
        $newOrder->save();

        // da controllare con la view, per gestire i piatti ordinati con relative quantità

        // sync con tabella ponte

        // route sbagliata, bisogna passare anche id ristorante
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);
        $data = [
            'order' => $order
        ];

        return view("order.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
