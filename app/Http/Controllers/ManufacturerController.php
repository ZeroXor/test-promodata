<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Product;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $manufacturer = Manufacturer::create($data);
        return redirect()
            ->route('manufacturers.index', ['manufacturer' => $manufacturer->id]);
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
     * @param Request $request
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Manufacturer $manufacturer) {
        $data = $request->all();
        $manufacturer->update($data);
        return redirect()
            ->route('manufacturers.index', ['manufacturer' => $manufacturer->id]);
    }

    /**
     * @param Manufacturer $manufacturer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Manufacturer $manufacturer) {
        if (empty($manufacturer->products()->count())) {
            $manufacturer->delete();
        }
        return redirect()
            ->route('manufacturers.index');
    }
}
