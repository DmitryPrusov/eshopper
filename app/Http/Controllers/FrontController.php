<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        return view('front.home');
    }

    public function product() {

        return view('front.product_detail');
    }
    public function products() {
        return view('front.products');
    }





}
