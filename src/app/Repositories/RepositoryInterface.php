<?php


namespace App\Repositories;

namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function create(array $data);

    public function update(array $data, $id);

    public function destroy($id);

    public function show($id);
}
