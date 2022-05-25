<?php

namespace App\Models;

use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Manufacturer[] $manufacturers
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function manufacturers()
    {
        return $this->belongsToMany('App\Models\Manufacturer', 'products_manufacturers');
    }
}
