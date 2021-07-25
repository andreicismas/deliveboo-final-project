<?php


namespace App\Http\Controllers;

use App\Dish;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $orders = DB::table("orders")
            ->join("dish_order", "id", "=", "dish_order.order_id")
            ->join("dishes", "dish_id", "=", "dishes.id")
            ->join("users", "dishes.user_id", "=", "users.id")
            ->select("orders.*")
            ->groupBy("orders.id")
            ->where("user_id", $user_id)
            ->orderBy("orders.id", "asc")
            ->get();
        return view("orders.index", ["orders" => $orders]);

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

        // temp
        $newOrder["payment_amount"] = 10;
        $newOrder["payment_status"] = true;

        $newOrder->save();

        // da controllare con la view, per gestire i piatti ordinati con relative quantità

        // dump($request);
        // return;

        // sync con tabella ponte
        $newOrder->dishes()->sync($data["dishes"]);
        // route sbagliata, bisogna passare anche id ristorante
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // $order = Order::findOrFail($id);
        $data = [
            'order' => $order
        ];

        return view("orders.show", $data);
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
