<?php

namespace App\Models;

use App\Traits\HasSlug;
use App\Services\UploadService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasSlug;
    use HasFactory;

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

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => UploadService::url($this->image),
        );
    }
}
