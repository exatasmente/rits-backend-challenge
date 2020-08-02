<?php

namespace App\Services;

abstract class BaseService
{
    protected $repo;

    public function all()
    {
        return $this->repo->all();
    }

    public function paginated($items = 15)
    {
        return $this->repo->paginated($items);
    }
    public function create(array $input)
    {
        return $this->repo->create($input);
    }
    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function search($search,$paginated = false,$items = 15){
        return $this->repo->search($search,$paginated,$items);
    }

    public function update($id, array $input)
    {
        return $this->repo->update($id, $input);
    }

    public function destroy($id)
    {

        return $this->repo->destroy($id);
    }

    public function getRepository(){
        return $this->repo;
    }

    public function setRepository($repo){
        $this->repo = $repo;
    }
}
