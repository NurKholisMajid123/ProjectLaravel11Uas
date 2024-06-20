<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboard');
        
    }
    public function view(){
        $products = Product::all();
        return view('user.product.viewUser', ['products' => $products]);
    }

   
}


