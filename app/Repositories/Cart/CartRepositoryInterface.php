<?php

namespace App\Repositories\Cart;
use App\Models\Wine;
use Illuminate\Support\Collection;

interface CartRepositoryInterface
{
    public function add(Wine $wine, int $quantity): void;
    public function increment(Wine $wine): void;
    public function decrement(int $wineId): void;
    public function remove(int $wineId): void;
    public function getTotalQuantityForWine(Wine $wine): float;
    public function getTotalCostForWine(Wine $wine, bool $formatted);

    public function getTotalQuantity();
    public function getTotalCost(bool $formatted);

    public function hasProduct(Wine $wine);
    public function clear();
    public function isEmpty();
    
    public function getCart(): Collection;

}
