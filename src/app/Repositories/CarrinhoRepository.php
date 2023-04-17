<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Carrinho;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CarrinhoRepository
{
    public function __construct()
    {
    }

    /**
     * @return LengthAwarePaginator
     */
    public static function index(): LengthAwarePaginator
    {
        return Carrinho::paginate();
    }

    /**
     * @return Collection
     */
    public static function findActiveCarrinhos($columns = ['id','name']): Collection
    {
        return Carrinho::active()
            ->get($columns);
    }

    /**
     * @return Carrinho
     */
    public static function store($arrayCarrinho): Carrinho
    {
        return Carrinho::create($arrayCarrinho);
    }

    /**
     * @return bool
     */
    public static function update($arrayCarrinho, $carrinho): bool
    {
        return $carrinho->update($arrayCarrinho);
    }

    /**
     * @return bool
     */
    public static function destroy($carrinho): bool
    {
        return $carrinho->delete();
    }

    public static function totalcart($request){


       return Carrinho::all()->where('uuid_cliente',$request)->count();

    }

}
