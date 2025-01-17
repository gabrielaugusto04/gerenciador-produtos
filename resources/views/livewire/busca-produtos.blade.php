<div class="max-w-4xl mx-auto bg-gray-800 shadow-lg rounded p-6 mt-6">
    <!-- Campo de Busca -->
    <form wire:submit.prevent="buscar" class="flex items-center space-x-3 mb-4">
        <input type="text" wire:model.debounce.500ms="search" placeholder="Buscar produtos pelo nome..."
            class="w-full p-3 border border-gray-600 bg-gray-900 text-gray-100 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
        <button type="submit"
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
            Buscar
        </button>
    </form>

    <!-- Filtro de Status -->
    <div class="flex items-center space-x-3 mb-4">
        <label for="statusFiltro" class="text-gray-300 text-sm">Status:</label>
        <select wire:model="status" id="statusFiltro"
            class="w-48 p-2 border border-gray-600 bg-gray-900 text-gray-100 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
            @foreach ($statusOpcoes as $status)
                <option value="{{ $status->value }}">{{ $status->value }}</option>
            @endforeach
        </select>
    </div>

    <!-- Tabela de Produtos -->
    <table class="min-w-full divide-y divide-gray-700 mt-4">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Nome</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Descrição</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Preço</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-300">Status</th>
            </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
            @forelse ($produtos as $produto)
                        @php
    // Verifica se o status precisa ser convertido para o enum
    $statusEnum = is_string($produto->status)
        ? \App\Enums\StatusEnum::tryFrom($produto->status)
        : $produto->status;
                        @endphp
                        <tr>
                            <td class="px-6 py-4 text-sm font-semibold text-gray-100">{{ $produto->nome }}</td>
                            <td class="px-6 py-4 text-sm text-gray-300">{{ $produto->descricao }}</td>
                            <td class="px-6 py-4 text-sm text-gray-300">R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm font-semibold {{ $statusEnum?->getColor() }}">
                                {{ $produto->status }}
                            </td>
                        </tr>
            @empty
                <tr>
                    <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">Nenhum produto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>