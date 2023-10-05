<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## CRUD em Laravel com Níveis de Acesso
Projeto CRUD com Laravel e Tailwind CSS

## Descrição
Este é um projeto de exemplo que demonstra como criar um aplicativo CRUD (Create, Read, Update, Delete) simples usando o framework Laravel e estilizando-o com o Tailwind CSS.

## Pré-requisitos
Antes de começar, certifique-se de que você tenha o seguinte instalado em sua máquina:
PHP (versão 7.4 ou superior)
Composer
Node.js
NPM
Git

## Instalação
Siga os passos abaixo para configurar e executar o projeto em sua máquina:

Clone este repositório para sua máquina local usando o Git:
```
git clone https://github.com/seu-usuario/seu-projeto.git
```

Navegue até o diretório do projeto:
```
cd seu-projeto
```

Instale as dependências PHP com o Composer:
```
composer install
```

Gere uma chave de aplicativo Laravel:
```
php artisan key:generate
```

Execute as migrações do banco de dados para criar as tabelas necessárias:
```
php artisan migrate
```

Crie as permissões de user e admin
```
php artisan permission:create-permission admin
php artisan permission:create-permission user
```

Inicie o servidor de desenvolvimento:
```
php artisan serve
```

Instale as dependências do Node.js:
```
npm install
```

Inicie os assets do Tailwind 
```
npm run dev
```


Agora você pode acessar o aplicativo em seu navegador em http://localhost:8000.

## Uso
Descreva aqui como usar seu aplicativo CRUD. Você pode incluir capturas de tela, exemplos de código e guias passo a passo.

## Contribuição
Se você quiser contribuir para este projeto, siga as diretrizes de contribuição a seguir:


Contato
Autor: Bernardo Mantoan Castellani
Email: becastellani10@gmail.com
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
