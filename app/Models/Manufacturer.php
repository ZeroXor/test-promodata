<?php

namespace App\Models;

use App\Http\Requests\ManufacturerRequest;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property Product[] $products
 */
class Manufacturer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'products_manufacturers');
    }

    public function createManufacturer(ManufacturerRequest $request)
    {
        $data = $request->all();

        return Manufacturer::create($data);
    }

    /**
     * @param ManufacturerRequest $request
     * @param Manufacturer $manufacturer
     * @return Manufacturer
     */
    public function updateManufacturer(ManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $data = $request->all();
        $manufacturer->update($data);

        return $manufacturer;
    }

    /**
     * @param $manufacturer
     * @return bool
     */
    public function deleteManufacturer($manufacturer)
    {
        if (empty($manufacturer->products()->count())) {
            $manufacturer->delete();

            return true;
        }

        return false;
    }
}
