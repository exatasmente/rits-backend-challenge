<div>
<h3 class="p-4 text-2xl leading-6 font-medium text-gray-900">
    {{$listName}} {{$pedidosTotal}}
</h3>
    <div class="flex w-full justify-end">
        <button wire:click="decrementPagination">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 12H9M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
        <button wire:click="incrementPagination">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4V20M20 12L4 12" stroke="#4A5568" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>
<div class="">
{{$pedidos->links('pagination')}}
</div>

        <ul class="border-r-2 border-indigo-50 flex md:justify-start mb-3 overflow-x-auto">
            @foreach($pedidos as $pedido)
                <li class="flex">
                    <livewire:admin.pedido  :pedido="$pedido" :key="$pedido->id"></livewire:admin.pedido>
                </li>
            @endforeach
        </ul>
</div>
