<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar Produtos') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    @if(session()->has('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl font-semibold mb-4">Lista de Produtos</h3>

                    <table class="min-w-full divide-y divide-gray-200" id="product-table">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider ">
                                    Nome do Produto
                                </th>
                                <th class=" px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider">
                                    Preço de Custo (Unidade)
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider">
                                    Preço de Venda (Unidade)
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider">
                                    Quantidade
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider">
                                    Categoria
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-black-700 uppercase tracking-wider">
                                    Ações
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @foreach($products as $product)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $product->nome }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        R$ {{ number_format($product->custo, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        R$ {{ number_format($product->preco, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $product->quantidade }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $product->category ? $product->category->nome : 'N/A' }}
                                    </td>
                                    
                                    
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        @can('admin')
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                        <form class="inline-block" action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
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
                    @if($products->isEmpty())
                    <div class="mt-5 bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert"">
                    <p class="font-bold">Nenhum item encontrado.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#product-table').DataTable({
                "order": [[0, "asc"]],
                 
            });
        });

        $(document).ready(function () {

    var $dataTablesLength = $(".dataTables_length");

    var $select = $dataTablesLength.find("select");
    var novaLargura = "100px"; 
    $select.css("width", novaLargura);
});
    </script>
</x-app-layout>
