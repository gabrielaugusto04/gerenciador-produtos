<?php

namespace App\Observers;

use App\Models\Produto;
use Illuminate\Support\Facades\Log;

class ProdutoObserver
{
    /**
     * Evento antes de criar um produto.
     */
    public function creating(Produto $produto)
    {
        if (!$produto->status) {
            $produto->status = 'Ativo'; // Define status padrão
        }
    }

    /**
     * Evento após atualizar um produto.
     */
    public function updated(Produto $produto)
    {
        Log::info('Produto atualizado', [
            'id' => $produto->id,
            'nome' => $produto->nome,
            'atualizado_em' => now(),
        ]);
    }

    /**
     * Evento antes de excluir um produto.
     */
    public function deleting(Produto $produto)
    {
        if ($produto->status === 'Ativo') {
            throw new \Exception('Não é possível excluir um produto com status "Ativo".');
        }
    }
}
