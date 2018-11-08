<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = json_decode(Storage::disk('local')->get('data.json'));
        $quantity = 1;
        $totalQuantity = 0;
        $totalPrice = 0;
        $total = 0;
        foreach($products as $key => $product){
            $totalPrice +=  $product->price;
            $totalQuantity +=  $product->quantity;
            $total += $product->price * $product->quantity;
            $products[$key]->total = $product->quantity * $product->price;
        }
        return view('home')->with(compact('products', $products[0], 'quantity', 'totalQuantity', 'totalPrice', 'total'));
    }

    public function store(Request $request){
        try {
            // my data storage location is project_root/storage/app/data.json file.
            $contactInfo = Storage::disk('local')->exists('data.json') ? (array)json_decode(Storage::disk('local')->get('data.json')) : [];

            $inputData = $request->only(['productName', 'quantity', 'price']);
            $inputData['datetime_submitted'] = date('Y-m-d H:i:s');

            array_push($contactInfo,$inputData);

            Storage::disk('local')->put('data.json', json_encode($contactInfo));

//            return $inputData;

        } catch(Exception $e) {

            return ['error' => true, 'message' => $e->getMessage()];

        }
        return redirect("home");
    }
}
