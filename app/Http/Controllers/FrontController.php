<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index() {
        $products  = Product::paginate(3);

        return view('front.home', compact('products'));
    }
    public function product($id) {
        $product = Product::findOrFail($id);
        return view('front.product_detail', compact('product'));
    }
    public function products() {
        return view('front.products');
    }
    public function blog() {
        return view('blog.index');
    }

    public function show_category($categoryId=null)
    {
        if(!empty($categoryId)){
            $products=Category::findOrFail($categoryId)->products;
        }
        // $categories=Category::all();
        return view('front.products',compact(['products']));
    }












}
