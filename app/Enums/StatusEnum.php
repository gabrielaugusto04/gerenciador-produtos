<?php

namespace App\Enums;

enum StatusEnum: string
{
    case Ativo = 'Ativo';
    case Inativo = 'Inativo';
    case Todos = 'Todos';

    /**
     * Retorna a cor correspondente ao status.
     */
    public function getColor(): string
    {
        return match ($this) {
            self::Ativo => 'text-green-500',   // Cor verde para "Ativo"
            self::Inativo => 'text-red-500',  // Cor vermelha para "Inativo"
            self::Todos => 'text-gray-500',   // Cor cinza para "Todos"
        };
    }
}
