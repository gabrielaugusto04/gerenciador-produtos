<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-800 text-white">
    <div class="max-w-4xl mx-auto bg-gray-900 shadow-lg rounded p-6 mt-6">
        <h1 class="text-2xl font-bold text-center mb-4">Criar Produto</h1>
        <form action="{{ route('produtos.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-300">Nome:</label>
                <input type="text" id="nome" name="nome" required
                    class="w-full p-3 border border-gray-600 bg-gray-700 text-gray-100 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="descricao" class="block text-sm font-medium text-gray-300">Descrição:</label>
                <textarea id="descricao" name="descricao" rows="3" required
                    class="w-full p-3 border border-gray-600 bg-gray-700 text-gray-100 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div>
                <label for="preco" class="block text-sm font-medium text-gray-300">Preço:</label>
                <input type="text" id="preco" name="preco" required oninput="this.value = this.value
                        .replace(/[^0-9.,]/g, '') // Permite apenas números, ponto e vírgula
                        .replace(/,/, '.') // Converte vírgula para ponto
                        .replace(/(\.\d{2})\d+/, '$1'); // Limita a duas casas decimais" placeholder="Ex: 99.99"
                    class="w-full p-3 border border-gray-600 bg-gray-700 text-gray-100 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-300">Status:</label>
                <select id="status" name="status"
                    class="w-full p-3 border border-gray-600 bg-gray-700 text-gray-100 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 shadow-md">
                    Criar Produto
                </button>
            </div>
        </form>
    </div>
</body>

</html>