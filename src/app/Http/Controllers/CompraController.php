<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Http\Requests\CompraRequest;
use App\Http\Resources\CompraResource;
use App\BO\CompraBO;

class CompraController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $compraBO = new CompraBO();
        $compras = $compraBO->initialize();

        return CompraResource::collection($compras);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compraBO = new CompraBO();
        $compras = $compraBO->index();

        return CompraResource::collection($compras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CompraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompraRequest $request)
    {
        $compraBO = new CompraBO();
        $compra = $compraBO->store($request->validated());

        return new CompraResource($compra);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        return new CompraResource($compra);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CompraRequest  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(CompraRequest $request, Compra $compra)
    {
        $compraBO = new CompraBO();
        $updated = $compraBO->update($request->validated(), $compra);

        if ($updated)
        {
            return new CompraResource($compra);
        }
        return response()->json([], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compraBO = new CompraBO();
        $compraBO->destroy($compra);

        return response()->json("DELETED", 204);
    }
}
