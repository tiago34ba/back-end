<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\IntensCompra;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class IntensCompraRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return IntensCompra::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveIntensCompras($columns = ['id','name']): Collection
    {
        return IntensCompra::active()
            ->get($columns);
    }

    /**
     * @return IntensCompra
     */
    public static function store($arrayIntensCompra): IntensCompra
    {
        return IntensCompra::create($arrayIntensCompra);
    }

    /**
     * @return bool
     */
    public static function update($arrayIntensCompra, $intensCompra): bool
    {
        return $intensCompra->update($arrayIntensCompra);
    }

    /**
     * @return bool
     */
    public static function destroy($intensCompra): bool
    {
        return $intensCompra->delete();
    }

}
