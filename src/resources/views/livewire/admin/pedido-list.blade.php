<div>
<h3 class="p-4 text-2xl leading-6 font-medium text-gray-900">
    {{$listName}} {{$pedidosTotal}}
</h3>
<div class="">
{{$pedidos->links('pagination')}}
</div>
        <ul class="border-r-2 border-indigo-50 flex md:justify-start mb-3 overflow-x-auto ">
            @foreach($pedidos as $pedido)
                <li class="flex">
                    <livewire:admin.pedido :pedido="$pedido" :key="$pedido->id"></livewire:admin.pedido>
                </li>
            @endforeach
        </ul>
        <div class="flex md:hidden justify-center w-full">
            @for($i =0 ; $i < 4 ; $i++ )
                <div  class="bg-indigo-300 cursor-pointer  rounded-full w-3 h-3 mx-2">
            </div>
            @endfor
        </div>
</div>
