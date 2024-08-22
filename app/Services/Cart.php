<?php

namespace App\Services;
use App\Models\Wine;
use App\Repositories\Cart\CartRepositoryInterface;
use Illuminate\Support\Collection;

final class Cart
{
    /**
     * Create a new class instance.
     */
    public function __construct(private readonly CartRepositoryInterface $repository)
    {

    }


    public function add(Wine $wine, int $quantity = 1)
    {

        $this->repository->add($wine, $quantity);

    }


    public function increment(Wine $wine)
    {

        $this->repository->increment($wine);

    }

    public function decrement(int $wineId)
    {

        $this->repository->decrement($wineId);

    }

    public function remove(int $wineId)
    {

        $this->repository->remove($wineId);

    }

    public function clear()
    {

        $this->repository->clear();

    }
    public function getTotalQuantityForWine(Wine $wine)
    {

        return $this->repository->getTotalQuantityForWine($wine);

    }


    public function getTotalCostForWine(Wine $wine, bool $formatted = false)
    {

        return $this->repository->getTotalCostForWine($wine, $formatted);

    }

    public function getTotalQuantity()
    {

        return $this->repository->getTotalQuantity();

    }

    public function getTotalCost($formatted = false)
    {

        return $this->repository->getTotalCost($formatted);

    }

    public function hasProduct(Wine $wine)
    {

        return $this->repository->hasProduct($wine);

    }

    public function getCart(): Collection
    {

        return $this->repository->getCart();

    }

    public function isEmpty()
    {

        return $this->repository->isEmpty();

    }
}
