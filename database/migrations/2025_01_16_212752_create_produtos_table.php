<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id(); // ID único
            $table->string('nome'); // Nome do produto
            $table->text('descricao'); // Descrição do produto
            $table->decimal('preco', 10, 2); // Preço do produto
            $table->enum('status', ['Ativo', 'Inativo'])->default('Ativo'); // Status do produto
            $table->softDeletes(); // Campo para Soft Deletes
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
