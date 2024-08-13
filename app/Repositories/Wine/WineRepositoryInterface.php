<?php

namespace App\Repositories\Wine;

interface WineRepositoryInterface
{
    public function model($slug = null);

    public function paginate($counts = [], $relationships = [], $perPage = 10);

    public function create($data);

    public function update($data, $model);

    public function delete($model);
    
}
