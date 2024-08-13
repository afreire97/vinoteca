<?php

namespace App\Traits;
use NumberFormatter;

trait WithCurrencyFormatter
{
    public function formatCurrency($value){

        $formatter = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);
    
        return $formatter->formatCurrency($value, 'EUR');
      }
}
