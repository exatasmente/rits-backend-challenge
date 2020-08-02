<?php

namespace App\Services;

use App\Repositories\BaseRepository;

abstract class BaseService
{
    protected BaseRepository $repo;
    public function __construct(BaseRepository $repo){
        $this->repo = $repo;

        if(request()->get('paginate',false) == true){
            $this->repo->setPagination(true,request()->get('paginate_items'));
        }
    }
    public function all()
    {
        return $this->repo->all();
    }

    public function paginated()
    {
        return $this->repo->paginated();
    }
    public function create(array $input)
    {
        return $this->repo->create($input);
    }
    public function find($id)
    {
        return $this->repo->find($id);
    }

    public function search($search){
        return $this->repo->search($search);
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
