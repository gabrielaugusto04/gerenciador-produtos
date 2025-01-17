<?php

namespace App\Services;

use App\DTOs\ProdutoDTO;
use App\Models\Produto;

class ProdutoService
{
    /**
     * Cria um produto usando o DTO.
     *
     * @param ProdutoDTO $produtoDTO
     * @return Produto
     */
    public function criarProduto(ProdutoDTO $produtoDTO): Produto
    {
        return Produto::create([
            'nome' => $produtoDTO->nome,
            'descricao' => $produtoDTO->descricao,
            'preco' => $produtoDTO->preco,
            'status' => $produtoDTO->status,
        ]);
    }
}
