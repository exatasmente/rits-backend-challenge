<?php


namespace App\Repositories\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasPagination
{
    public bool $paginated = false;
    public int $paginateItems = 15;

    public function setPagination(bool $paginated,int $paginateItems)
    {
        $this->paginated = $paginated;
        $this->paginateItems = $paginateItems;
    }

    public function executeQuery($query)
    {
        if($this->paginated === true){
            return $query->paginate($this->paginateItems);
        }
        return $query->get();
    }
}
