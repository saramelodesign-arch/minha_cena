# É a Minha Cena!

Projeto final desenvolvido em Laravel, com base na arquitetura MVC.

A aplicação tem como tema a música e permite consultar, criar e gerir bandas e respetivos álbuns, de acordo com o tipo de utilizador.

## Funcionalidades

* Autenticação de utilizadores (login e registo)
* Três tipos de acesso: visitante, utilizador autenticado e gestor
* CRUD de bandas
* CRUD de álbuns associados às bandas
* Upload de imagens com imagem por defeito
* Área de administração (dashboard)

## Tecnologias

* Laravel
* PHP
* MySQL
* Blade
* Bootstrap

## Como correr o projeto

1. Clonar o repositório
2. Instalar dependências com `composer install`
3. Criar o ficheiro `.env` a partir do `.env.example`
4. Gerar a chave da aplicação com `php artisan key:generate`
5. Configurar a base de dados no ficheiro `.env`
6. Executar `php artisan migrate:fresh --seed`
7. Iniciar o servidor com `php artisan serve`

## Utilizadores de teste

* Gestor: [gestor@minhacena.pt]
* Utilizador: [user@minhacena.pt]
