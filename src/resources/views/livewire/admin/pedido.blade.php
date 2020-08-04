<div>
    @if($openModal)
        <x-modal is-open="true" wire:click="closeModal">
            <div class="mx-auto flex items-center justify-center my-2">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Detalhes Pedido #{{$pedido->id}}
                </h3>
            </div>
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Cliente
                </h3>
                <div class="mt-2">
                    <dl>
                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 sm:py-5">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Nome
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$pedido->cliente->name}}
                            </dd>
                        </div>
                        <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Endereço
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$pedido->cliente->endereco}}
                            </dd>
                        </div>
                        <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Email
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$pedido->cliente->email}}
                            </dd>
                        </div>
                        <div class="mt-8 sm:mt-0 sm:grid sm:grid-cols-3 sm:gap-4 sm:border-t sm:border-gray-200 sm:px-6 sm:py-5">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Telefone
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900 sm:mt-0 sm:col-span-2">
                                {{$pedido->cliente->telefone}}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Produtos
                </h3>
                <div class="mt-2">
                    <dl class="grid grid-cols-3 col-gap-2 row-gap-4">
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Produto
                        </dt>
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Quantidade
                        </dt>
                        <dt class="text-sm leading-5 font-medium text-gray-500">
                            Preço
                        </dt>
                        @foreach($pedido->produtos as $produto)
                            <div class="sm:col-span-1">
                                <dd class="mt-1 text-sm leading-5 text-gray-900">
                                    {{$produto->nome}}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dd class="mt-1 text-sm leading-5 text-gray-900">
                                    {{$produto->pivot->quantidade}}
                                </dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dd class="mt-1 text-sm leading-5 text-gray-900">
                                    R$ {{$produto->preco}}
                                </dd>
                            </div>
                        @endforeach
                        <div class="col-end-4">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Valor Total
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                R$ {{$pedido->produtos->sum('preco')* $pedido->produtos->sum('pivot.quantidade')}}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="mt-3 text-center sm:mt-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Status
                </h3>
                <div class="mt-2">
                    <x-pedido-status :status="$pedido->status" :status-str="$pedido->statusString"/>
                </div>

            </div>
            <div class="mt-5 sm:mt-6">
              <span class="flex w-full rounded-md shadow-sm ">
                <button wire:click="closeModal"  type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 border-indigo-600 text-base leading-6 font-medium text-indigo-700 shadow-sm  focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Fechar
                </button>
              </span>
            </div>
        </x-modal>
    @endif
    <div class="p-3">
        <div class="bg-white border border-green-400 col-span-1 rounded-lg shadow-xl w-56" style="max-height: 400px">
            <div class="flex items-center justify-between">
                <div class="w-full flex-1 p-3">
                    <h3 class="text-gray-900 text-md leading-5 font-medium truncate">#Pedido : {{$pedido->id}}</h3>
                    <time class="mt-2 text-gray-600  text-xs leading-5 break-all capitalize">{{$pedido->created_at->diffForHumans()}} ({{$pedido->created_at->format('d/m/Y - H:m:s')}})</time>
                    <p class="mt-2 ml-2 text-gray-500 text-sm leading-5 break-all">{{$pedido->cliente->endereco}}</p>
                    @if($pedido->status == 1)
                    <h3 class="text-gray-900 text-md leading-5 font-medium truncate my-3 ml-2 hidden md:block">Produtos</h3>
                    <dl class="px-6 px-4 grid grid-cols-1 col-gap-4 sm:grid-cols-2 hidden md:flex md:flex-wrap justify-between">

                        <div class="sm:col-span-1">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Quantidade
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                {{$pedido->produtos->sum('pivot.quantidade')}}
                            </dd>
                        </div>
                        <div class="sm:col-span-1">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Valor Total
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                R$ {{$pedido->produtos->sum('preco')* $pedido->produtos->sum('pivot.quantidade')}}
                            </dd>
                        </div>
                    </dl>
                    @endif
                    <x-pedido-status :status="$pedido->status" :status-str="$pedido->statusString"/>
                </div>
            </div>
            <div class="border-t border-gray-200">
                <div class="md:flex">
                    <div class="flex-1 flex border-r border-gray-200">
                        <button wire:click="verDetalhes" type="button" class="-mr-px flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                            <span>Detalhes</span>
                        </button>
                    </div>
                    <div class="-ml-px flex-1 flex">
                        <button wire:click="confirmar"  type="button" class="flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-white font-medium border border-transparent rounded-br-lg hover:text-green-100 focus:outline-none focus:shadow-outline-blue focus:border-green-300 focus:z-10 transition ease-in-out duration-150  bg-green-400">
                            <span class="space-x-1">Confirmar</span>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
