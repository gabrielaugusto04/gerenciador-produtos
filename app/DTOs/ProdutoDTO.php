<?php

namespace App\DTOs;

class ProdutoDTO
{
    public function __construct(
        public string $nome,
        public string $descricao,
        public float $preco,
        public string $status = 'Ativo' // Valor padrão
    ) {
    }
}
