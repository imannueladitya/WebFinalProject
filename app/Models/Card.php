<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model{
    public $transactionId;
    public $username;
    public $products;    
    public $totalPrice;

    public function __construct($transactionId, $username, $totalPrice) {
        $this->products = array();
        $this->transactionId = $transactionId;
        $this->username = $username;
        $this->totalPrice = $totalPrice;
    }
}