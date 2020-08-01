<?php
namespace App\Repositories;

use App\Repositories\Traits\HasRelations;
use App\Repositories\Traits\Sortable;
abstract class Repository
{
    use Sortable, HasRelations;
    // Get all instances of model
    public function all()
    {

        return $this->model
            ->with($this->relations)
            ->orderBy($this->sortBy, $this->sortOrder)
            ->get();
    }

    // create a new record in the database
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    // update record in the database
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        return $record->update($data);
    }

    // remove record from the database
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    // show the record with the given id
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    // Get the associated model
    public function getModel()
    {
        return $this->model;
    }

    // Set the associated model
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }
}
