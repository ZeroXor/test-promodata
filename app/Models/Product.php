<?php

namespace App\Models;

use App\Http\Requests\ProductRequest;
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

    public function getProductsList()
    {
        return self::select('id', 'name')
            ->with('manufacturers')
            ->get();
    }

    /**
     * @param ProductRequest $request
     * @return mixed
     */
    public function createProduct(ProductRequest $request)
    {
        $data = $request->all();
        $product = Product::create($data);
        if (isset($data['manufacturers'])) {
            $product->manufacturers()->sync($data['manufacturers']);
        }

        return $product;
    }

    /**
     * @param ProductRequest $request
     * @param Product $product
     * @return Product
     */
    public function updateProduct(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        $product->manufacturers()->sync($data['manufacturers']);
        $product->update($data);

        return $product;
    }
}
