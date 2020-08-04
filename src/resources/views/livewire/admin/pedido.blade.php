<div>

    <div class="p-3">

        <div class="col-span-1 bg-white rounded-lg shadow w-56">
            <div class="flex items-center justify-between">
                <div class="w-full flex-1 p-3">
                    <h3 class="text-gray-900 text-md leading-5 font-medium truncate">#Pedido : {{$pedido->id}}</h3>
                    <p class="mt-2 ml-2 text-gray-500 text-sm leading-5 break-all">{{$pedido->cliente->endereco}}</p>
                    @if($pedido->status == 1)
                    <h3 class="text-gray-900 text-md leading-5 font-medium truncate my-3 ml-2 hidden md:block">Produtos</h3>
                    <dl class="px-6 px-4 grid grid-cols-1 col-gap-4 sm:grid-cols-2 hidden md:flex md:flex-wrap justify-between">

                        <div class="sm:col-span-1">
                            <dt class="text-sm leading-5 font-medium text-gray-500">
                                Quantidade
                            </dt>
                            <dd class="mt-1 text-sm leading-5 text-gray-900">
                                {{$pedido->produtos->count()}}
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
                        <a href="#" class="-mr-px flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150">
                            <svg class="w-5 h-5 text-gray-400 m-1" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                            <span>Produtos</span>
                        </a>
                    </div>
                    <div class="-ml-px flex-1 flex">
                        <a href="#" class="flex-1 inline-flex items-center justify-center py-4 text-sm leading-5 text-white font-medium border border-transparent rounded-br-lg hover:text-red-100 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 transition ease-in-out duration-150  bg-red-400">
                            <svg class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            <span class="space-x-1">Cancelar</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
