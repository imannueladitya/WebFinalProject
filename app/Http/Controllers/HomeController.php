<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Details;
use App\Models\Card;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transactions = DB::table('transaction')
        ->join('details', 'transaction.id', '=', 'details.transaction_id')
        ->join('product', 'details.product_id', '=', 'product.id')
        ->join('users', 'transaction.user_id', '=', 'users.id')
        ->select('transaction.id', 'users.name', 'transaction.transaction_totalprice', 'product.product_name', 'details.qty')
        ->orderBy('transaction.id', 'asc')->get();

        $cards = [];
        foreach ($transactions as $transaction) {
            
            $obj = $this->getObjectById($cards, $transaction->id);
            if($obj != null){
                $obj->products[$transaction->product_name] = $transaction->qty;
            }else {
                $card = new Card($transaction->id, $transaction->name, $transaction->transaction_totalprice);
                $card->products[$transaction->product_name] = $transaction->qty;
                array_push($cards, $card);
            }            
        }

        return view('HomePage', compact("cards"));
    }

    function getObjectById($list, $transactionId) {
        foreach ($list as $object) {
            if ($object->transactionId === $transactionId) {
                return $object;
            }
        }
        return null;
    }
}
