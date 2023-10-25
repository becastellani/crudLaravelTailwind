<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edição de Categoria') }}
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
                    <form method="POST" action="{{ route('categories.update', $category->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="nome" class="block text-gray-600 font-bold">Nome da Categoria:</label>
                            <input type="text" name="nome" id="nome" class="form-input mt-1 p-2 border rounded w-full" placeholder="Digite o nome do produto" value="{{ $category->nome }}">
                        
                        <div class="mb-4">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5">Salvar Categoria</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
