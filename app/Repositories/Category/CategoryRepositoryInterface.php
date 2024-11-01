<?php

namespace App\Repositories\Category;

interface CategoryRepositoryInterface
{
    //

    public function model($slug = null);

    public function paginate($counts = [], $relationships = [], $perPage = 10);

    public function create($data);

    public function update($data, $model);

    public function delete($model);

}
