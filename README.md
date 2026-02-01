# É a Minha Cena!

Projeto final desenvolvido em **Laravel**, no âmbito da unidade de **Server-Side Development**.

## Descrição

"É a Minha Cena!" é uma aplicação web simples com o tema da música, que funciona como um pequeno CRM para **bandas e álbuns**, aplicando os conceitos base lecionados em aula.

A aplicação utiliza a arquitetura **MVC (Model–View–Controller)**, autenticação de utilizadores e controlo de permissões através de middleware.

## Funcionalidades

* Registo, login e logout de utilizadores (Laravel Fortify)
* Dois tipos de utilizador:

  * **Gestor** (administração)
  * **Visitante** (visualização)
* Dashboard protegida por middleware
* CRUD de utilizadores
* CRUD de bandas
* CRUD de álbuns associados a bandas
* Upload e visualização de imagens
* Layout reutilizável com Blade e Bootstrap

## Tecnologias

* Laravel
* PHP
* MySQL
* Blade
* Bootstrap

## Como correr o projeto

1. Clonar o repositório:

```bash
git clone https://github.com/saramelodesign-arch/minha_cena.git
```

2. Entrar na pasta do projeto:

```bash
cd minha_cena
```

3. Instalar dependências:

```bash
composer install
```

4. Criar ficheiro de ambiente:

```bash
cp .env.example .env
```

5. Gerar a chave da aplicação:

```bash
php artisan key:generate
```

6. Configurar a base de dados no ficheiro `.env`.

7. Criar tabelas e dados iniciais:

```bash
php artisan migrate --seed
```

8. Criar link para o storage:

```bash
php artisan storage:link
```

9. Iniciar o servidor:

```bash
php artisan serve
```

## Base de Dados

A base de dados é criada através de **migrations**.

Foi utilizado um **DatabaseSeeder** apenas para criar um utilizador gestor, facilitando a demonstração da aplicação.

## Acesso inicial (Seeder)

* Email: [gestor@minhacena.pt](mailto:gestor@minhacena.pt)
* Password: password
