# API em Laravel

## Requisitos iniciais
 - Criar um arquivo .env, com as informações do banco de dados. Utilizar o .env.example como base.
 - Ter o PHP >= 8.2.

## Executando com o Laragon
 - Download e instalação do [Laragon](https://laragon.org/download/index.html)
 - Baixe o arquivo .zip do [PHP 8.2](https://windows.php.net/download#php-8.2) e descompacte na pasta C:/laragon/bin/php. Em seguida, clique direito em uma área vazia da janela do Laragon e selecione a versão do PHP.
 - Abra o Terminal do próprio Laragon (Cmder) Clonar ou fazer download deste projeto na pasta C:/laragon/www
 - Navegar até a pasta `cd api-laravel`
 - Executar o comando `composer install`
 - Abra o projeto com o VSCode `code .` na pasta do projeto.
 - Clique no botão Start do Laragon e verá que será executado o Apache e o MySQL 8.
 - No Cmder, execute os comandos:
    - `php artisan migrate --seed`
    - `php artisan serv` 