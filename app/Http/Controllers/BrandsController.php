<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all() ;
        return view('admin.brand.index', compact('brands'));
    }
    public function create()
    {

    }

    public function store(Request $request)
    {
        $brand = Brand::create($request->all());
        return response()->json($brand);
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
        $brand = Brand::findOrFail($id);
        return response()->json($brand);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $brand_id)
    {

        $brand = Brand::findOrFail($brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return response()->json($brand);


    }

    public function destroy($id)
    {
        $brand = Brand::destroy($id);
        return response()->json($brand);
    }
}
