<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CompraRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Compra::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveCompras($columns = ['id','name']): Collection
    {
        return Compra::active()
            ->get($columns);
    }

    /**
     * @return Compra
     */
    public static function store($arrayCompra): Compra
    {
        return Compra::create($arrayCompra);
    }

    /**
     * @return bool
     */
    public static function update($arrayCompra, $compra): bool
    {
        return $compra->update($arrayCompra);
    }

    /**
     * @return bool
     */
    public static function destroy($compra): bool
    {
        return $compra->delete();
    }

}
