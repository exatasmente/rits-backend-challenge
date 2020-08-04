<div>
<h3 class="p-4 text-2xl leading-6 font-medium text-gray-900">
    {{$listName}}
</h3>
<div class="">
{{$pedidos->links('pagination')}}
</div>

        <ul class="flex justify-between overflow-x-auto">
            @foreach($pedidos as $pedido)
                <li class="flex-wrap">
                    <livewire:admin.pedido :pedido="$pedido" :key="$pedido->id"></livewire:admin.pedido>
                </li>
            @endforeach
        </ul>

</div>
