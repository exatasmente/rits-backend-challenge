<div>
    <h3 class="mt-4 mb-10 p-2 text-3xl leading-6 font-medium text-gray-900">
        Novo Produto
    </h3>
    @if($errors->any())
        @include('shared.alerts')
    @endif
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-2 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="store" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-1 gap-6">
                                <div class="col-span-1">
                                    <label for="nome" class="block text-sm font-medium leading-5 text-gray-700">Nome do Produto</label>
                                    <input wire:model.lazy="nome"  id="nome" class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                </div>

                                <div class="col-span-1">
                                        <label for="preco" class="block text-sm font-medium leading-5 text-gray-700">Preço</label>
                                        <div class="mt-1 relative rounded-md shadow-sm">
                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm sm:leading-5">
                                                    R$
                                                </span>
                                            </div>
                                            <input wire:model.lazy="preco" id="preco" type="number" step="any" class="mt-1 pl-10 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
                                {{$produtoId == null ? 'Salvar' : 'Atualizar'}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
