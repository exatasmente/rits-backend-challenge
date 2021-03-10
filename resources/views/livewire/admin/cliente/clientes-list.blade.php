<div>
    <h3 class="mt-4 mb-10 p-2 text-3xl leading-6 font-medium text-gray-900">
        Clientes
    </h3>
    <div class="flex flex-col">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="flex w-full justify-end mb-4">
                <div class="flex-1 flex justify-center lg:justify-end">
                    <div class="w-full px-2 lg:px-6">
                        <label for="search" class="sr-only">Perquisar Clientes</label>
                        <div class="relative text-indigo-300 focus-within:text-gray-400">
                            <div wire:click="clearSearch" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input wire:model.debounce.250="search" id="search" class="bg-gray-500 bg-opacity-25 block border border-transparent duration-150 ease-in-out focus:outline-none focus:placeholder-gray-400 focus:text-gray-900 leading-5 pl-10 placeholder-indigo-300 pr-3 py-2 rounded-md sm:text-sm text-indigo-300 transition w-full" placeholder="Perquisar Clientes" type="search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                <div class="w-full">
                    {{$clientes->links('pagination')}}

                </div>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Nome
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Email
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Telefone
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Endereço
                        </th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Pedidos
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr class="bg-white">
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                {{$cliente->name}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{$cliente->email}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{$cliente->telefone}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{$cliente->endereco}}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                                {{$cliente->pedidos->count()}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
