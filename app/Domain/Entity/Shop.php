<?php


namespace App\Domain\Entity;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'address',
        'zip',
        'city',
        'instagram',
        'facebook',
        'website',
        'description',
        'image',
        'img_manager',
        'infrontof'
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'shop_id');
    }

    public function scopeInFrontOf(Builder $query): Builder
    {
        return $query->whereInFrontOf(true);
    }
}
