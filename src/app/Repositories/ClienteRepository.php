<?php
namespace App\Repositories;

use App\Models\User;

class ClienteRepository extends Repository
{
    protected $model;
    public function __construct(User $cliente)
    {
        $this->model = $cliente;
    }

    public function find($id){
        return $this->model->with($this->relations)->findOrFail($id);
    }
}
