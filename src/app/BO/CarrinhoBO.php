<?php

namespace App\BO;

use App\Repositories\CarrinhoRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Carrinho;

class CarrinhoBO
{
    /**
     * Return initialization page data
     *
     * @return Object
     */
    public function initialize(): Object
    {
        // Your code

        return new \stdClass();
    }

    /**
     * Displays a resource's list
     *
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return CarrinhoRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveCarrinhos(): Collection
    {
        return CarrinhoRepository::findActiveCarrinhos();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\CarrinhoRequest  $request
     * @return Carrinho
     */
    public function store(array $request): Carrinho
    {
        return CarrinhoRepository::store($request);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\CarrinhoRequest  $request
     * @param \App\Models\Carrinho  $carrinho
     * @return bool
     */
    public function update(array $request, $carrinho): bool
    {
        return CarrinhoRepository::update($request, $carrinho);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\Carrinho  $carrinho
     * @return bool
     */
    public function destroy($carrinho): bool
    {
        return CarrinhoRepository::destroy($carrinho);
    }
    public function totalcart($request){
        return CarrinhoRepository::totalcart($request);

    }
}
