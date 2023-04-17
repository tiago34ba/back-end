<?php

namespace App\BO;

use App\Repositories\IntensCompraRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\IntensCompra;

class IntensCompraBO
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
        return IntensCompraRepository::index();
    }

    /**
    * Get only active resources
    *
    * @return Collection
    */
    public function findActiveIntensCompras(): Collection
    {
        return IntensCompraRepository::findActiveIntensCompras();
    }

    /**
     * Store a new resource in storage
     *
     * @param \App\Http\Requests\IntensCompraRequest  $request
     * @return IntensCompra
     */
    public function store(array $request): IntensCompra
    {
        return IntensCompraRepository::store($request);
    }

    /**
     * Update an specific resource in storage.
     *
     * @param \App\Http\Requests\IntensCompraRequest  $request
     * @param \App\Models\IntensCompra  $intensCompra
     * @return bool
     */
    public function update(array $request, $intensCompra): bool
    {
        return IntensCompraRepository::update($request, $intensCompra);
    }

    /**
     * Delete an specific resource from storage.
     *
     * @param \App\Models\IntensCompra  $intensCompra
     * @return bool
     */
    public function destroy($intensCompra): bool
    {
        return IntensCompraRepository::destroy($intensCompra);
    }
}
