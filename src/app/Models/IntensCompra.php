<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IntensCompra extends Model
{
    use Traits\Scope;

    protected $guarded = ['id'];

    /**
     * Attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // "name",
    ];
}
