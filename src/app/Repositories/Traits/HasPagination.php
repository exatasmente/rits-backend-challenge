<?php


namespace App\Repositories\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasPagination
{
    public bool $paginated = false;
    public int $paginateItems = 15;

    public function setPagination($paginated,$paginateItems = 15)
    {
        if(is_integer($paginateItems)){
            $paginateItems = $paginateItems <= 50 and $paginateItems > 0 ? $paginateItems : 15 ;
        }else{
            $paginateItems = 15;
        }
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
