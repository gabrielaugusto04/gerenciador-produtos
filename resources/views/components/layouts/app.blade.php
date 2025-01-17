<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Gerenciador de Produtos' }}</title>
    <!-- Adiciona o Tailwind via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="bg-gray-900 text-gray-100">
    <header class="bg-gray-800 text-white p-4 shadow-md">
        <h1 class="text-2xl font-bold text-center">Gerenciador de Produtos</h1>
    </header>
    <main class="p-6">
        {{ $slot }}
    </main>
    <footer class="bg-gray-700 text-gray-400 p-4 mt-4 text-center">
        <p>{{ date('d/m/Y') }} </p>
    </footer>
    @livewireScripts
</body>

</html>