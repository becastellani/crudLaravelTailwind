<x-app-layout>
    <x-slot name="header">
        <!-- Conteúdo do cabeçalho, se necessário -->
    </x-slot>


    <h1 class="text-2xl font-bold mt-4 ml-10">Gerenciar Usuários</h1>
    <div class="py-2 -mx-4 sm:-mx-6 lg:-mx-8 overflow-x-auto">
        <div class="align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Nome
                            </th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Função
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <h1 class="mb-5 font-medium text-gray-500 uppercase tracking-wider text-center">É admin?</h1>
                                    <form method="POST" action="{{ route('panel.update', $user->id) }}">
                                        @csrf
                                        @method('POST')
                                        <label class="relative inline-flex items-center mb-5 cursor-pointer mr-5">
                                            <input type="hidden" name="role" value="1"> <!-- Valor padrão (Usuário) -->
                                            <input type="checkbox" name="role" value="2" {{ $user->role_id == 2 ? 'checked' : '' }} class="sr-only peer">
                                            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                        </label>
                                        <button type="submit"
                                            class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-300">
                                            Atualizar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
