<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function addproduct(Request $request){
        $product = New Product;
        $product->name = $request->input('name');
        $product->file_path = $request->file('file')->store('products');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();

        return $product;
    }

    function list(){
        $products = Product::all();
        return $products;
    }

    function delete($id){
        $result = Product::where("id", $id);
        $result->delete();
    }

    function getProduct($id){
        return Product::find($id);
    }

    function updateProduct(Request $request, $id){
        $input = $request->all();
        $product = Product::find($id);
        $product->update($input);
        //return $product;
    }

    function search($search){
        return Product::where("name", "Like", "%$search%")->get();
    }
}
