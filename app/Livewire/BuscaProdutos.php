<?php

namespace App\Livewire;

use App\Models\Produto;
use App\Enums\StatusEnum;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class BuscaProdutos extends Component
{
    use WithPagination;

    #[Url]
    public string $search = ''; // Campo de busca
    public $produtos = []; // Lista de produtos buscados
    public string $status = ''; // Filtro de status

    #[Url]
    public string $sortField = 'nome'; // Campo de ordenação padrão

    #[Url]
    public string $sortDirection = 'asc'; // Direção de ordenação padrão

    public function mount(): void
    {
        // Inicializa os produtos e define o status padrão
        $this->status = StatusEnum::Ativo->value;
        $this->buscar();
    }

    public function buscar(): void
    {
        // Realiza a busca dos produtos com base nos filtros
        $this->produtos = Produto::query()
            ->when($this->search, function ($query) {
                $query->where('nome', 'like', '%' . $this->search . '%');
            })
            ->when($this->status !== 'Todos', function ($query) {
                $query->where('status', $this->status);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->get();
    }

    public function render()
    {
        return view('livewire.busca-produtos', [
            'produtos' => $this->produtos,
            'statusOpcoes' => StatusEnum::cases(),
        ]);
    }
}
