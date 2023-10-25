<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categoria;
use Khill\Lavacharts\Lavacharts;
use Illuminate\Support\Str;

class ProductController extends Controller
{
        public function create()
        {
            $categories = Categoria::all(); 
            return view('products.create', compact('categories'));
        }

        public function index()
        {
            $products = Product::all();
            return view('products.index', compact('products'));
        }
    
        public function store(Request $request)
        {   
            $validatedData = $request->validate([
                'nome' => 'required|max:255',
                'custo' => 'required|numeric',
                'preco' => 'required|numeric',
                'quantidade' => 'required|integer|min:1',
                'category_id' => 'integer', 
            ]);



            Product::create($validatedData);
            
            return redirect()->route('cadastro')->with('success', 'Produto criado com sucesso!');
        }

        public function destroy(Product $product)
        {
            $product->delete();
            return redirect()->route('visualizar')->with('success', 'Produto excluído com sucesso.');
        }

        public function edit(Product $product)
        {
            $categories = Categoria::all();
            return view('products.edit', compact('product', 'categories'));
        }

        public function update(Request $request, Product $product)
        {
            $validatedData = $request->validate([
                'nome' => 'required|max:255',
                'custo' => 'required|numeric',
                'preco' => 'required|numeric',
                'quantidade' => 'required|integer|min:1',
                'category_id' => 'integer', 
            ]);
            $product->update($validatedData);

            return redirect()->route('visualizar')->with('success', 'Produto atualizado com sucesso.');
        }

    

 
    }

