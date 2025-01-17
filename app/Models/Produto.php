<?php

namespace App\Models;

use App\Enums\StatusEnum; // Importa o Enum
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'descricao', 'preco', 'status'];

    // Faz o casting do campo 'status' para o Enum
    protected $casts = [
        'status' => StatusEnum::class,
    ];

    // Define que o campo 'deleted_at' será tratado como uma data
    protected $dates = ['deleted_at'];
}
