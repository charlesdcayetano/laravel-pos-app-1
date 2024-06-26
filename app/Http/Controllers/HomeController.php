<?php

namespace App\Http\Controllers;

use App\Models\PaymentTransaction;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Constructor for the HomeController class.
     *
     * This method sets up the middleware for the controller. The 'auth' middleware
     * is used to authenticate the user before executing any actions in the controller.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::get();
        $users = User::get();
        $orders = PaymentTransaction::get();


        return view('home', compact('products', 'users', 'orders'));
    }
}
