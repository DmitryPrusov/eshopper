<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductRequest;
use App\Image;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(3);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {

        $categories = Category::pluck('name', 'id');
        return view('admin.product.create', compact('categories'));

    }
    public function store(ProductRequest $request)
    {
        // нужно написать валидацию - для это создали новый Request - php artisan make:request ProductRequest
        $images = $request->file('images');
            // создаем новый экземпляр класса
            $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->size = $request->size;
        //сохраняем все данные
        $product->save();
            foreach($images as $image):
                //получаем каждое имя
                $imageName = $image->getClientOriginalName();
                //отправляем в папку public/images
                $image->move('images', $imageName);
                $i = new Image(['image_name' => $imageName] );
                $product->images()->save($i);
            endforeach;

            return redirect()->route('admin.index')->with('message', 'Товар успешно добавлен!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
