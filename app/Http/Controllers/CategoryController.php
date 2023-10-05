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
        // Validação dos dados e salvamento da categoria
        $validatedData = $request->validate([
            'nome' => 'required|unique:categorias|max:255',
        ]);

        Categoria::create($validatedData);

        return redirect()->route('cadastro')->with('success', 'Categoria criada com sucesso!');
    }
}
