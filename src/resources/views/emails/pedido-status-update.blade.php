@component('mail::message')
# Atualização de Status
### Olá {{$pedido->cliente->name}},
#### O status do seu pedido #{{$pedido->id}} foi alterado para **{{$pedido->statusString}}**
@component('mail::table')
| Produto                      | Quantidade    | Preço       |
| :---------------------------- |:-------------:| -----------:|
@foreach($pedido->produtos as $produto)
|{{$produto->nome}}   | {{$produto->pivot->quantidade}} | R$ {{number_format($produto->preco,2)}}
@endforeach
|Total                          |              | R$  {{$pedido->produtos->reduce(fn($valorTotal,$produto)=> $valorTotal + ($produto->preco * $produto->pivot->quantidade),0) }}           |
@endcomponent

Atenciosamente,

{{ config('app.name') }}
@endcomponent
