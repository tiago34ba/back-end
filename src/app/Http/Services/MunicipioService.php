<?php

namespace App\Http\Services;

use App\Entity\Municipio;
use Illuminate\Http\Request;

class MunicipioService extends Service
{
//   public function index() 
//     {
//         $municipios = Municipio::get();
//         return response()->json($municipios, 200);
//     }

    public function store(Municipio $municipio, Request $request) 
    {
        $municipio = Municipio::create($request->all());
        return response()->json($municipio, 200);
    }

    public function show($id)
    {
        return Municipio::find($id);
    }

    public function update(Municipio $municipio, Request $request, $id)
    {
        $municipio = Municipio::findOrFail($id);
        $municipio->update($request->all());
        return response()->json($municipio, 200);
    }

    public function destroy(int $id)
    {
        Municipio::destroy($id);
        return response()->json(null, 200);
    }
}
