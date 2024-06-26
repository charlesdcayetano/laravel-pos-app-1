<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discount;
use App\Models\Gender;
use App\Models\PaymentMethod;
use App\Models\Role;
use App\Models\Supplier;
use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    //index
    public function index()
    {
        $categories = Category::get();
        $discounts = Discount::get();
        $genders = Gender::get();
        $paymentMethods = PaymentMethod::get();
        $roles = Role::get();
        $suppliers = Supplier::get();


        return view('misc.index', [
            'categories' => $categories,
            'discounts' => $discounts,
            'genders' => $genders,
            'paymentMethods' => $paymentMethods,
            'roles' => $roles,
            'suppliers' => $suppliers,
        ]);
    }
}
