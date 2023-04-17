<?php

namespace App\Http\Requests;

use App\Http\Requests\CustomRulesRequest;

class CarrinhoRequest extends CustomRulesRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return Bool
     */
    public function authorize(): Bool
    {
        return true;
    }

    /**
     * @return Array
     */
    public function validateDefault(): Array
    {
        return [
            // Your default validation
        ];
    }

    /**
     * @return Array
     */
    public function validateToStore(): Array
    {
        return [
            'nome_produto'   => 'required|max:60',
            'id_cliente'     => 'null',
            'nome_produto'   => 'required',
            'valor_unitario' => 'required',
            'imagem' => 'required',
            'quantidade' => 'required',
            'categoria_produto' => 'required',
            'cod_produto' => 'required',
            'descricao_produto' => 'required',
            'uuid_cliente'=>'required',

        ];

    }

    /**
     * @return Array
     */
    public function validateToUpdate(): Array
    {
        return [
            // 'name' => 'max:60',
        ];
    }

    /**
     * @return Array
     */
    public function validateToDestroy(): Array
    {
        return [
            // 'id' => 'required',
        ];
    }

    /**
     * @return Array
     */
    public function messages(): Array
    {
        return [
            // 'id.required' => 'O id é obrigatório!',
        ];
    }

    /**
     * @return Array
     */
    public function attributes(): Array
    {
        return [
            // 'name' => 'nome',
        ];
    }
}
