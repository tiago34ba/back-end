<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Http\Requests\CarrinhoRequest;
use App\Http\Resources\CarrinhoResource;
use App\BO\CarrinhoBO;
use Illuminate\Http\Request;
class CarrinhoController extends Controller
{
    /**
     * Return initialization page data
     *
     * @return  \Illuminate\Http\Response
     */
    public function initialize()
    {
        $carrinhoBO = new CarrinhoBO();
        $carrinhos = $carrinhoBO->initialize();

        return CarrinhoResource::collection($carrinhos);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrinhoBO = new CarrinhoBO();
        $carrinhos = $carrinhoBO->index();

        return CarrinhoResource::collection($carrinhos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CarrinhoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarrinhoRequest $request)
    {
        $carrinhoBO = new CarrinhoBO();
        $carrinho = $carrinhoBO->store($request->validated());

        return new CarrinhoResource($carrinho);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function show(Carrinho $carrinho)
    {
        return new CarrinhoResource($carrinho);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CarrinhoRequest  $request
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function update(CarrinhoRequest $request, Carrinho $carrinho)
    {
        $carrinhoBO = new CarrinhoBO();
        $updated = $carrinhoBO->update($request->validated(), $carrinho);

        if ($updated)
        {
            return new CarrinhoResource($carrinho);
        }
        return response()->json([], 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrinho  $carrinho
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrinho $carrinho)
    {
        $carrinhoBO = new CarrinhoBO();
        $carrinhoBO->destroy($carrinho);

        return response()->json("DELETED", 204);
    }
    function totalcart($request){

        $carrinhoBO = new CarrinhoBO();
        $result =  $carrinhoBO->totalcart($request);
        return response()->json($result, 201);

    }
}
