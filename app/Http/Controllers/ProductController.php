<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('product.index',compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $product = Product::create( $request->all());
        return redirect()->route('products.index')->with('success','Produit Ajouté');
    }

    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ]);
        $product->update( $request->all());
        return redirect()->route('products.index')->with('success','Produit modifié');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Produit supprimé');
    }
}
