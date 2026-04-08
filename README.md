# 📦 Sistema de Gestão de Produtos e Fornecedores

Um sistema web completo desenvolvido em **Laravel** para o gerenciamento de produtos e fornecedores. O projeto implementa as operações fundamentais de um CRUD (Create, Read, Update, Delete), aplicando relacionamentos de banco de dados e consumindo APIs externas para otimização da experiência do usuário.

## ✨ Funcionalidades

* **Dashboard Inteligente:** Painel central que orienta o usuário, bloqueando o cadastro de produtos caso não exista nenhum fornecedor registrado.
* **Gestão de Fornecedores:** CRUD completo com integração à API **ViaCEP** (preenchimento automático de endereço via JavaScript).
* **Gestão de Produtos:** CRUD completo com relacionamento de chaves estrangeiras (1:N), garantindo que cada produto pertença a um fornecedor ativo.
* **Interface Responsiva:** Front-end estilizado com **Bootstrap 5** através do motor de templates **Blade**.
* **Validação de Dados:** Backend robusto com validações rigorosas de requisições (`Form Requests`).

## 🛠️ Tecnologias e Ferramentas Utilizadas

* **[PHP 8.2+](https://www.php.net/):** Linguagem base do backend.
* **[Laravel](https://laravel.com/):** Framework PHP moderno focado em elegância e padronização (Padrão MVC).
* **[Composer](https://getcomposer.org/):** Gerenciador de dependências do PHP.
* **[XAMPP](https://www.apachefriends.org/):** Pacote de desenvolvimento local fornecendo os servidores **Apache** e banco de dados **MySQL / MariaDB**.
* **[Bootstrap 5](https://getbootstrap.com/):** Framework CSS para estilização e responsividade.
* **[ViaCEP API](https://viacep.com.br/):** Web service gratuito para consulta de CEPs em formato JSON.
* **[Git & GitHub](https://github.com/):** Versionamento de código.

## ⚙️ Arquitetura do Banco de Dados

O sistema utiliza um relacionamento **1:N (Um para Muitos)**.
* Um Fornecedor (`Supplier`) pode fornecer vários Produtos (`Products`).
* Um Produto (`Product`) pertence a obrigatoriamente um Fornecedor.

A restrição é garantida pela chave estrangeira `supplier_id` na tabela de produtos, configurada com deleção em cascata (`onDelete('cascade')`).

## 🚀 Como Executar o Projeto Localmente

Siga o passo a passo abaixo para rodar o projeto na sua máquina:

### 1. Pré-requisitos
Certifique-se de ter instalado em sua máquina:
* XAMPP (com Apache e MySQL iniciados)
* Composer
* Git

### 2. Clonando o Repositório
Abra o terminal e execute:
```bash
git clone https://github.com/VHC2201/projeto-crud.git
cd projeto-crud
```

### 3. Instalando as Dependências
Baixe os pacotes necessários do Laravel:
```bash
composer install
```

### 4. Configurando o Ambiente
Crie uma cópia do arquivo `.env.example` e renomeie para `.env`.
No Windows (PowerShell/CMD):
```bash
copy .env.example .env
```

No arquivo `.env` recém-criado, configure a conexão com o banco de dados local do XAMPP:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=projeto_crud_db
DB_USERNAME=root
DB_PASSWORD=
```
*(Nota: Lembre-se de criar o banco de dados correspondente no seu phpMyAdmin antes de prosseguir).*

### 5. Gerando a Chave da Aplicação
```bash
php artisan key:generate
```

### 6. Executando as Migrations
Crie as tabelas no banco de dados:
```bash
php artisan migrate
```

### 7. Iniciando o Servidor Local
```bash
php artisan serve
```

Acesse o sistema através do navegador no endereço: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**