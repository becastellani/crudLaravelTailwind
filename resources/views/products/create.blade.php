<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastro de Produtos') }}
        </h2>
    </x-slot>
    @if(session()->has('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('product.store') }}" >
                        @csrf
                        <div class="mb-4">
                            <label for="nome" class="block text-gray-600 font-bold">Nome do Produto:</label>
                            <input type="text" name="nome" id="nome" class="form-input mt-1 p-2 border rounded w-full" placeholder="Digite o nome do produto" required>
                        </div>

                        <div class="mb-4">
                            <label for="custo" class="block text-gray-600 font-bold">Preço de Custo (Unidade):</label>
                            <input  name="custo" class="form-input mt-1 p-2 border rounded w-full"  type="text" id="custo" step="0.01" placeholder="Digite o preço de custo em R$" required><br>
                        </div>

                        <div class="mb-4">
                            <label for="preco" class="block text-gray-600 font-bold">Preço de Venda (Unidade):</label>
                            <input name="preco" class="form-input mt-1 p-2 border rounded w-full"  type="number" id="preco" step="0.01" placeholder="Digite o preço de venda em R$" required><br>
                        </div>
                        <div class="mb-4">
                            <label for="quantidade" class="block text-gray-600 font-bold">Quantidade:</label>
                            <input step="1 "min="1" type="number" name="quantidade" id="quantidade" class="form-input mt-1 p-2 border rounded w-full" placeholder="Digite a quantidade" required>
                        </div>
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-600 font-bold">Categoria:</label>
                            <select name="category_id" id="category_id" class="form-select mt-1 p-2 border rounded w-full" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Salvar Produto</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
