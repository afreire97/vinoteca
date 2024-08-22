<?php

namespace App\Repositories\Shop;

interface ShopRepositoryInterface
{
    public function paginate (int $perPage = 15);

    public function find(int $id);


}
