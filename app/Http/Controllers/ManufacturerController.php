<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerRequest;
use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Manufacturer();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::select('id', 'name')
            ->withCount('products')
            ->get();
        return view('manufacturers.index', compact('manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManufacturerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerRequest $request)
    {
        $manufacturer = $this->model->createManufacturer($request);
        return redirect()
            ->route('manufacturers.index', ['manufacturer' => $manufacturer->id])
            ->with('success', 'Запись успешно создана!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return view('manufacturers.edit', compact('manufacturer'));
    }

    /**
     * @param ManufacturerRequest $request
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer = $this->model->updateManufacturer($request, $manufacturer);
        return redirect()
            ->route('manufacturers.index', ['manufacturer' => $manufacturer->id])
            ->with('success', 'Запись успешно обновлена!');
    }

    /**
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Manufacturer $manufacturer)
    {
        if ($this->model->deleteManufacturer($manufacturer)) {
            return redirect()
                ->route('manufacturers.index')
                ->with('success', 'Запись успешно удалена!');
        }
    }
}
