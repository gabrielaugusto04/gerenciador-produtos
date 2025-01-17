<?php

namespace App\Http\Controllers;

use App\DTOs\ProdutoDTO; // Importa o DTO
use App\Services\ProdutoService; // Importa o serviço que criamos
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private ProdutoService $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService; // Injeta o serviço
    }

    /**
     * Cria um novo produto.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
            'preco' => 'required|numeric|min:0',
            'status' => 'nullable|in:Ativo,Inativo',
        ]);

        // Cria um DTO com os dados validados
        $produtoDTO = new ProdutoDTO(
            nome: $validated['nome'],
            descricao: $validated['descricao'],
            preco: $validated['preco'],
            status: $validated['status'] ?? 'Ativo' // Define um valor padrão
        );

        // Usa o serviço para criar o produto
        $produto = $this->produtoService->criarProduto($produtoDTO);

        // Retorna uma resposta JSON
        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'produto' => $produto,
        ], 201);
    }
}
