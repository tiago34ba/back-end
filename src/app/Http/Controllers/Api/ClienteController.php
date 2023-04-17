<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Item;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteCollection;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ClienteCollection
     */
    public function index()
    {
        $uid = auth()->id();

        //return new ClienteCollection(Cliente::where('id_cliente', '=', $uid)->get());
        return new ClienteCollection(Cliente::where('id_cliente', '=', 1)->get());
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
            'name' => 'required|min:2|max:100',
            'item_id' => 'required|exists:items,uuid,deleted_at,NULL',
        ]);

        $data['user_id'] = auth('api')->id();
        $data['item_id'] = $this->getItemByUuid($data['item_id'])?->id;

        try {

            DB::beginTransaction();

            $this->connection()->create($data);

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return $this->msgResponse($exception->getMessage(), 500);
        }

        return $this->msgResponse("Cliente created.");
    }

    protected function getItemByUuid($uuid)
    {
        return Item::where('uuid', $uuid)->first();
    }

    protected function connection()
    {
        return new Cliente();
    }

    /**
     * Display the specified resource.
     *
     * @param $uuid
     * @return JsonResponse
     */
    public function show($uuid)
    {
        $Cliente = $this->getClienteByUuid($uuid);

        if (!$Cliente) {
            return $this->msgResponse("You requested ID: $uuid not found.", 404);
        }

        return response()->json([
            "data" => Cliente::with(['item' => fn($query) => $query->with('category')])->find($Cliente->id)
        ]);
    }

    protected function getClienteByUuid($uuid)
    {
        return $this->connection()->where('uuid', $uuid)->first();
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
        $Cliente = $this->getClienteByUuid($uuid);

        if (!$Cliente) {
            return $this->msgResponse("You requested ID: $uuid not found.", 404);
        }

        $data = $this->validate($request, [
            'name' => 'required|min:2|max:100',
            'item_id' => 'nullable|exists:items,uuid,deleted_at,NULL',
        ]);

        if (!empty($data['item_id'])) {
            $data['item_id'] = $this->getItemByUuid($data['item_id'])?->id;
        }

        try {

            DB::beginTransaction();

            $this->connection()->where('id', $Cliente->id)->update($data);

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return $this->msgResponse($exception->getMessage(), 500);
        }

        return $this->msgResponse("Cliente updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $uuid
     * @return JsonResponse
     */
    public function destroy($uuid)
    {
        $Cliente = $this->getClienteByUuid($uuid);

        if (!$Cliente) {
            return $this->msgResponse("You requested ID: $uuid not found.", 404);
        }

        try {

            DB::beginTransaction();

            $this->connection()->where('id', $Cliente->id)->delete();

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();

            return $this->msgResponse($exception->getMessage(), 500);
        }

        return $this->msgResponse("Cliente deleted.");
    }
}
