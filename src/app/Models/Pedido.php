<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $guarded = [];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class,'pedido_id','id');
    }
    public function cliente()
    {
        return $this->
    }
}
