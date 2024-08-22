<?php

namespace App\Traits;
use Exception;

trait CartActions
{

    public function addProductToCart() {

        $wineId = request()->input('wine_id');
        $quantity = request()->input('quantity', 1);

        $wine = $this ->repository -> find($wineId);
        $this ->cart ->add($wine, $quantity);
    }


    public function incrementProductQuantity(){

        $wine = $this->repository->find(request('wine_id'));

        try {
            $this->cart->increment($wine);
            session()->flash('success','Cantidad incrementada');
        } catch (Exception $e) {
        session()->flash('error', $e->getMessage());
    }

}


    public function decrementProductQuantity(){

        $this->cart->decrement(request('wine_id'));

    }

    public function removeProduct(){

        $this->cart->remove(request('wine_id'));

    }



    
}