<?php

namespace App\Models;

use App\Services\UploadService;
use App\Traits\HasSlug;
use App\Traits\WithCurrencyFormatter;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use NumberFormatter;
class Wine extends Model
{


    use HasSlug;
    use WithCurrencyFormatter;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'category_id',
        'year',
        'stock',
        'price',
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

  public function formattedPrice(): Attribute {
    return Attribute::make(
        get: fn () => $this->formatCurrency($this->price),
    );
}


  protected function imageUrl(): Attribute
  {
      return Attribute::make(
          get: fn () => UploadService::url($this->image),
      );
  }
}
