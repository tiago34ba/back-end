<?php

namespace App\Http\Controllers;

use App\Models\IntensCompra;
use App\Http\Requests\IntensCompraRequest;
use App\Http\Resources\IntensCompraResource;
use App\BO\IntensCompraBO;

class IntensCompraController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $intensCompraBO = new IntensCompraBO();
        $intensCompras = $intensCompraBO->initialize();

        return IntensCompraResource::collection($intensCompras);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intensCompraBO = new IntensCompraBO();
        $intensCompras = $intensCompraBO->index();

        return IntensCompraResource::collection($intensCompras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\IntensCompraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IntensCompraRequest $request)
    {
        $intensCompraBO = new IntensCompraBO();
        $intensCompra = $intensCompraBO->store($request->validated());

        return new IntensCompraResource($intensCompra);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IntensCompra  $intensCompra
     * @return \Illuminate\Http\Response
     */
    public function show(IntensCompra $intensCompra)
    {
        return new IntensCompraResource($intensCompra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\IntensCompraRequest  $request
     * @param  \App\Models\IntensCompra  $intensCompra
     * @return \Illuminate\Http\Response
     */
    public function update(IntensCompraRequest $request, IntensCompra $intensCompra)
    {
        $intensCompraBO = new IntensCompraBO();
        $updated = $intensCompraBO->update($request->validated(), $intensCompra);

        if ($updated)
        {
            return new IntensCompraResource($intensCompra);
        }
        return response()->json([], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IntensCompra  $intensCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(IntensCompra $intensCompra)
    {
        $intensCompraBO = new IntensCompraBO();
        $intensCompraBO->destroy($intensCompra);

        return response()->json("DELETED", 204);
    }
}
