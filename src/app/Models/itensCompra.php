<?php

namespace App\Models;

use App\Traits\HasUUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class itensCompra extends Model
{
    use HasFactory, HasUUID, SoftDeletes,HasOne;


	public function compra(): HasOne
    {
        return $this->hasOne(Compra::class, 'id_compra','id_compra');
    }
}
