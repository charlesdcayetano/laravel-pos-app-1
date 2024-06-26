<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Product;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $products = Product::get();
        $users = User::get();

        $data = [
            'title' => 'Welcome to Snazzy Shoe Shop - snazzyshoeshop.com',
            'date' => date('m/d/Y'),
            'products' => $products,
            'users' => $users,
        ];

        $pdf = PDF::loadView('products.generate-product-pdf', $data);
        return $pdf->download('snazzyshoeshop-product-data.pdf');
    }
}
