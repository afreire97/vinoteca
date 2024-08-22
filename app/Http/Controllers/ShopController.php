<?php

namespace App\Http\Controllers;

use App\Repositories\Shop\ShopRepositoryInterface;
use App\Services\Cart;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    

    public function __construct(private readonly ShopRepositoryInterface $repository, private readonly Cart $cart){}

    public function index(){

    $wines = $this->repository->paginate();

    return view('shop.index', compact('wines'));

    }


}
