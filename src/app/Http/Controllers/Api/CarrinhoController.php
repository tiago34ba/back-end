<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\ItensCompra;
use App\Models\Carrinho;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarrinhoCollection;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return CarrinhoCollection
     */
    public function index(Request $request)
    {

        $id_cliente=1 ;
        // $request['data']['id_cliente']=1;

      // $uid = auth()->id();
     //return new CarrinhoCollection(Carrinho::where('user_id', '=', $uid)->get());
       return new CarrinhoCollection(Carrinho::where('id_cliente', '=', $id_cliente)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'nome_produto' => 'required|min:2|max:100',
           // 'item_id' => 'required|exists:items,uuid,deleted_at,NULL',
        ]);
        $data["nome_produto"] ='teste';
       // var_dump($request->all());
      // die('aqui');
        //$data['user_id'] = auth('api')->id();
       // $data['item_id'] = $this->getItemByUuid($data['item_id'])?->id;
      // return   $data ;
       // die('aqui');

        try {

          DB::beginTransaction();

            $this->connection()::create($data);

          DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return $this->msgResponse($exception->getMessage(), 500);
        }

        return $this->msgResponse("Item Adicionado no carrinho.");
    }

    protected function getItemByUuid($uuid)
    {

        //  return Item::where('uuid', $uuid)->first();
    }

    protected function connection()
    {
        return new Carrinho();
    }

    /**
     * Display the specified resource.
     *
     * @param $uuid
     * @return JsonResponse
     */
    public function show($uuid)
    {

        $carrinho= $this->getOrderByUuid($uuid);

        if (!$carrinho) {
            return $this->msgResponse("You requested ID: $uuid not found.", 404);
        }

        return response()->json([
            "data" => Carrinho::with(['cliente'])->find($carrinho->id_carrinho)
        ]);
    }

    protected function getOrderByUuid($uuid)
    {

        return $this->connection()->where('id_cliente', $uuid)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $uuid
     * @return JsonResponse
     */
    public function update(Request $request, $uuid)
    {
        $order = $this->getOrderByUuid($uuid);

        if (!$order) {
            return $this->msgResponse("You requested ID: $uuid not found.", 404);
        }

        $data = $this->validate($request, [
            'name' => 'required|min:2|max:100',
            'item_id' => 'nullable|exists:items,uuid,deleted_at,NULL',
        ]);

        if (!empty($data['item_id'])) {
           // $data['item_id'] = $this->getItemByUuid($data['item_id'])?->id;
        }

        try {

            DB::beginTransaction();

            $this->connection()->where('id', $order->id)->update($data);

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return $this->msgResponse($exception->getMessage(), 500);
        }

        return $this->msgResponse("Order updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $uuid
     * @return JsonResponse
     */
    public function destroy($uuid)
    {
        $order = $this->getOrderByUuid($uuid);

        if (!$order) {
            return $this->msgResponse("You requested ID: $uuid not found.", 404);
        }

        try {

            DB::beginTransaction();

            $this->connection()->where('id', $order->id)->delete();

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return $this->msgResponse($exception->getMessage(), 500);
        }

        return $this->msgResponse("Order deleted.");
    }
}
