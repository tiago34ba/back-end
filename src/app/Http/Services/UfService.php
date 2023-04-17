<?php
namespace App\Http\Services;

use App\Entity\Uf;
use Illuminate\Http\Request;

class UfService extends Service
{

    public function index()
    {
        $ufs = Uf::get();
        return response()->json($ufs, 200);
    }

    public function store(Uf $uf, Request $request)
    {
        $uf = Uf::create($request->all());
        return response()->json($uf, 200);
    }

    public function show($id)
    {
        return Uf::find($id);
    }

    public function update(Uf $uf, Request $request, $id)
    {
        $uf = Uf::findOrFail($id);
        $uf->update($request->all());
        return response()->json($uf, 200);
    }

    public function destroy(int $id)
    {
        Uf::destroy($id);
        return response()->json(null, 200);
    }
    
    public function getMunicipios($id) 
    {
        return response()->json(Uf::find($id)->municipios()->get(), 200);
    }
}
