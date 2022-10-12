<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    // Show all products
    public function index() {

        return view('products.index', [
            'products' => Product::latest()->paginate(5)
        ]);
    }

    // Show single product
    public function show(Product $product) {
        return view('products.show', [
            'product' => $product
        ]);
    }

    // Show add form
    public function create() {
        return view('products.create');
    }

    // Store product data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'colors' => 'required'
        ]);
        
        $product = Product::create($formFields);

        if($product && $colors = explode(',',$formFields['colors'])) {
            foreach($colors as $color) {
                Color::create(['product_id'=>$product->id,'title'=>$color]);
            }
        }

        return redirect('/')->with('message', 'Product created successully');
    }

    // Delete product
    public function distroy(Product $product) {
        $product->delete();
        return redirect('/')->with('message', 'Product deleted successully');
    }

    // Show edit form
    public function edit(Product $product) {
        return view('products.edit',['product'=>$product]);
    }

    // Update product data
    public function update(Request $request, Product $product) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'colors' => 'required'
        ]);

        $product->update($formFields);
        
        Color::where(['product_id' => $product->id])->delete();

        if($product && $colors = explode(',',$formFields['colors'])) {
            foreach($colors as $color) {
                Color::create(['product_id'=>$product->id,'title'=>$color]);
            }
        }

        return back()->with('message', 'Product updated successully');
    }
}
