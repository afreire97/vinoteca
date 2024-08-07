<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use NumberFormatter;
class Wine extends Model
{


    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];





    protected function casts(){

        return [

            'year' => 'integer',
            'price' => 'decimal:2',
            'stock' => 'integer',
        ];
    }


  public function category()
  {
      return $this->belongsTo(Category::class);
  }

  public function formatedPrice(){



    $formatter = new NumberFormatter('es_ES', NumberFormatter::CURRENCY);

    return Attribute::make(

        fn()=> $formatter->formatCurrency($this->price, 'EUR'),
    );
  }
}
