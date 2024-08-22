<?php

namespace App\Repositories\Shop;
use App\Models\Wine;

class EloquentShopRepository implements ShopRepositoryInterface
{
    

    public function paginate(int $perPage=15){

        return Wine::paginate($perPage);
    }

    public function find(int $id){

        return Wine::findOrFail($id);
    }
    




}
