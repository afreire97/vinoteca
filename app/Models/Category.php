<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Services\UploadService;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

public function wines()
{
    return $this->hasMany(Wine::class);
}



public function imageUrl() {


return Attribute::make(

fn () => UploadService::url($this->image),



);


}

}



