<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;

interface RepositoryInterface
{
    public function all();
    public function paginated();
    public function executeQuery($query);
    public function create(array $data);
    public function update($id,array $data);
    public function destroy($id);
    public function find($id);
    public function search($search);
    public function getModel();

}
