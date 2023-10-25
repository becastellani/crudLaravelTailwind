<x-app-layout>
    <x-slot name="header">
    </x-slot>
    @if(session()->has('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">Lista de Categorias</h3>

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider">
                                    Nome da Categoria
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($categories as $category)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $category->nome }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @can('admin')
                                            <a href="{{ route('categories.edit', $category->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <form class="inline-block" action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta categoria?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                            </form>
                                        @elsecan('user')
                                            <h1 class="font-black">Você não tem permissão</h1>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if($categories->isEmpty())
                        <div class="mt-5 bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                            <p class="font-bold">Nenhuma categoria encontrada.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
