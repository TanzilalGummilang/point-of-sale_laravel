<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SellingTransactionController extends Controller
{
    public function index()
    {
        return view('selling-transaction.index', [
            'products' => Product::get()
        ]);
    }
}
