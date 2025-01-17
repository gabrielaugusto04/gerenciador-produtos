
# Gerenciador de Produtos

Este é um sistema básico para gerenciamento de produtos, desenvolvido com Laravel, Filament e Livewire. Ele implementa as principais operações de CRUD e conta com funcionalidades adicionais como Soft Deletes, Observers, uso de DTOs e busca dinâmica com Livewire.

---

## Endpoints do Sistema

### Busca de Produtos
**URL:** `http://127.0.0.1:8000/busca-produtos?search=<termo>`

- Este endpoint utiliza **Livewire** para realizar buscas dinâmicas e reativas.
- O parâmetro `search` permite filtrar produtos pelo nome.
- Caso o parâmetro `search` esteja vazio, a lista exibe todos os produtos.

**Exemplo de Uso:**
- Para buscar produtos com o nome "Exemplo":
  ```
  http://127.0.0.1:8000/busca-produtos?search=Exemplo
  ```
- Para exibir todos os produtos:
  ```
  http://127.0.0.1:8000/busca-produtos
  ```

---

### Cadastro de Produtos
**URL:** `http://127.0.0.1:8000/produtos/criar`

- Este endpoint exibe um formulário para cadastrar novos produtos.
- Campos do formulário:
  - Nome
  - Descrição
  - Preço
  - Status (Ativo/Inativo)
- Após preencher e enviar, o produto será salvo no banco de dados.

---

## Tecnologias Utilizadas

- Laravel 11
- Filament
- Livewire
- PHP 8.3

---

## Funcionalidades do Sistema

1. Cadastro de produtos com os campos:
   - Nome
   - Descrição
   - Preço
   - Status (Ativo/Inativo)
2. Busca dinâmica de produtos, implementada com Livewire.
3. Filtro por status utilizando Enum.
4. Exclusão lógica (Soft Deletes), permitindo restauração de itens.
5. Observers para ações automáticas ao criar, atualizar ou excluir produtos.
6. Cadastro de produtos via DTO (Data Transfer Object).

---

## Instalação e Configuração

### 1. Clone o repositório
```bash
git clone https://github.com/seu-usuario/gerenciador-produtos.git
cd gerenciador-produtos
```

### 2. Instale as dependências do PHP
```bash
composer install
```

### 3. Configure o ambiente
Crie um arquivo `.env`:
```bash
cp .env.example .env
```

Edite o arquivo `.env` para configurar o banco de dados:
```plaintext
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

### 4. Gere a chave da aplicação
```bash
php artisan key:generate
```

### 5. Execute as migrações
```bash
php artisan migrate
```

### 6. Suba o servidor local
```bash
php artisan serve
```

Acesse o sistema pelo navegador em `http://localhost:8000`.

---

## Como Testar

Para testar as funcionalidades básicas do sistema, você pode usar o **Tinker**:

1. Acesse o Tinker:
   ```bash
   php artisan tinker
   ```

2. Exemplos de comandos no Tinker:
   - Criar um produto:
     ```php
     \App\Models\Produto::create([
         'nome' => 'Produto Teste',
         'descricao' => 'Produto de exemplo',
         'preco' => 100.50,
         'status' => 'Ativo',
     ]);
     ```

   - Excluir um produto (Soft Delete):
     ```php
     $produto = \App\Models\Produto::find(1);
     $produto->delete();
     ```

   - Restaurar um produto excluído:
     ```php
     $produto = \App\Models\Produto::withTrashed()->find(1);
     $produto->restore();
     ```

   - Excluir permanentemente:
     ```php
     $produto = \App\Models\Produto::withTrashed()->find(1);
     $produto->forceDelete();
     ```

---

## Estrutura do Projeto

- **Modelo Produto**:
  - Implementa Soft Deletes e Enum para o status.
- **Busca Dinâmica**:
  - Desenvolvida com Livewire para filtros reativos.
- **DTO e Serviços**:
  - Utilizados para centralizar a lógica de manipulação de dados no cadastro de produtos.
- **Observer**:
  - Automatiza ações como definir valores padrão e impedir exclusão de produtos ativos.
- **Soft Deletes**:
  - Permite exclusão lógica com possibilidade de restauração.

---

## Observações

Este projeto foi desenvolvido para um teste prático e pode ser utilizado como base para sistemas mais complexos. Caso tenha dúvidas, verifique a documentação oficial do Laravel em [https://laravel.com/docs](https://laravel.com/docs).
