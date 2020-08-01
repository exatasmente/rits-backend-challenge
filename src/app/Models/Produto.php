<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $guarded = [];

    public function pedido(){
        return $this->belongsToMany(Pedido::class,'pedido_produto');
    }

    public function pedidos(){
        return $this->belongsToMany(Pedido::class,'pedido_produto')->withPivot(['quantidade']);
    }
}
