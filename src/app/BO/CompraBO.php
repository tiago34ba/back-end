<?php

namespace App\BO;

use App\Repositories\CompraRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Compra;

class CompraBO
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
        return CompraRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveCompras(): Collection
    {
        return CompraRepository::findActiveCompras();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\CompraRequest  $request
     * @return Compra
     */
    public function store(array $request): Compra
    {
        return CompraRepository::store($request);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\CompraRequest  $request
     * @param \App\Models\Compra  $compra
     * @return bool
     */
    public function update(array $request, $compra): bool
    {
        return CompraRepository::update($request, $compra);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\Compra  $compra
     * @return bool
     */
    public function destroy($compra): bool
    {
        return CompraRepository::destroy($compra);
    }
}
