<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Services\UploadService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{


    use HasSlug;


    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',

    ];

public function wines(): HasMany
{
    return $this->hasMany(Wine::class);
}



public function imageUrl() : Attribute {


return Attribute::make(

fn () => UploadService::url($this->image),



);


}

}



