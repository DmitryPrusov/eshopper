<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class FrontController extends Controller
{

    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        $products=Product::where('name','LIKE','%'.$query.'%')->get();
        $data=array();
        foreach ($products as $product) {
            $data[]=array('value'=>$product->name,'id'=>$product->id);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'Ничего не найдено','id'=>''];

    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search_text'   => 'required|max:255',
        ]);

        $keyword = $request->get('search_text');
        $products=Product::where('name','LIKE','%'.$keyword.'%')->get();
        return view('front.search',compact(['products']));
    }



    public function index() {

        $products  = Product::paginate(9);
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
