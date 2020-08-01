<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    const PENDENTE   = 1;
    const EM_PREPARO = 2;
    const EM_ENTREGA = 3;
    const ENTREGUE   = 4;
    const CANCELADO  = 5;

    protected $guarded = [];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class,'pedido_produto')->withPivot(['quantidade','preco_unidade']);
    }
    public function cliente()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
