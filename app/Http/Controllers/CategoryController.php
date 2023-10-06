<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
 
    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|unique:categorias|max:255',
        ]);

        Categoria::create($validatedData);

        return redirect()->route('cadastro-categoria')->with('success', 'Categoria criada com sucesso!');
    }

    public function index()
    {
        $categories = Categoria::all();
        return view('categories.index', compact('categories'));
    }


    public function destroy(Categoria $category)
    {
        $category->delete();
    
        return redirect()->route('visualizar')->with('success', 'Produto excluído com sucesso.');
    }
    
    public function edit(Categoria $category)
    {
        return view('categories.edit', compact('category'));
    }
    
    public function update(Request $request, Categoria $category)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
        ]);
    
        $category->update($validatedData);
    
        return redirect()->route('categoria-visualizar')->with('success', 'Produto atualizado com sucesso.');
    }
    
}
