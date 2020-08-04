<?php


namespace App\Repositories\Traits;

trait HasRelations
{
    public $relations = [];

    public function setRelations($relations = null)
    {
        $this->relations = $relations;
    }
}
