<?php
namespace App\Repositories;

use App\Repositories\Traits\HasPagination;
use App\Repositories\Traits\HasRelations;
use App\Repositories\Traits\Sortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    use Sortable, HasRelations , HasPagination;

    public function all()
    {
        return $this->executeQuery($this->model
            ->with($this->relations)
            ->orderBy($this->sortBy, $this->sortOrder)
            );
    }

    public function paginated()
    {
        return $this->executeQuery(
            $this->model
            ->with($this->relations)
            ->orderBy($this->sortBy, $this->sortOrder)
            );
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id,array $data)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function search($search){
        /** @var Builder $query */
        $query = $this->model->newQuery();

        collect($search)->each(function ($field) use($query){
            $query->where($field['field'],$field['operator'], $field['value']);
        });
        $query->orderBy($this->sortBy, $this->sortOrder);
        return $this->executeQuery($query);
    }

    public function getModel()
    {
        return $this->model;
    }

    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

}
