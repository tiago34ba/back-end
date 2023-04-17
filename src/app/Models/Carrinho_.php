<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Carrinho extends Model
{
    use HasFactory, HasUUID, SoftDeletes;

     /**
   * The primary key for the model.
   *
   * @var string
   */
  protected $primaryKey = 'id_carrinho';

  /**
   * Indicates if the model should be timestamped.
   *
   * @var bool
   */

   protected $fillable = ['
   id_cliente,
   cod_produto,nome_produto,
   valor_unitario,imagem,
   quantidade,
   categoria_produto,
   descricao_produto'];
  public $timestamps = false;


    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class, 'id_cliente','id_cliente');
    }
}
