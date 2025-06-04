# API em Laravel

## Requisitos iniciais
 - Criar um arquivo .env na raiz do projeto, com as informações do banco de dados (schema, usuário e senha). Utilizar o .env.example como base.
    - Se for utilizar o Docker, defina o DB_HOST como `mysql`, o DB_USERNAME como `admin`e o DB_PASSWORD com uma senha qualquer de sua preferência.
 - Ter o VSCode instalado.

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
 - Acesse o navegador e digite a URL `localhost:8000/api/test` 

## Executando com o Docker
 - Downloado do Docker (se estiver no Windows, utilize a instalação com WSL).
   - Certifique-se de que o WSL2 esteja instalado. Siga as orientações neste [link](https://docs.microsoft.com/windows/wsl/wsl2-kernel).
 - Execute o comando `docker-compose up -d`
   - Caso esteja com containers anteriores, execute `docker-compose down`
 - Aguarde até a criação dos containers.
 - Acesse o container `docker-compose exec -w /var/www api bash`
    - Verifique se no terminal está aparecendo algo como `root@1234:/var/www# `, que é o terminal do Servidor do Docker.
 - Execute os comandos:
    - `composer install` (caso não tenha feito isso no projeto local)
    - `php artisan migrate --seed` (para criar o banco de dados e as tabelas)
      - É importante que o arquivo .env exista e esteja com as configurações definidas.

### Acesso remoto ao banco de dados do Docker
 - Copie o arquivo de configurações para o container: `docker cp docker/mysql/my.cnf database:/etc/mysql/my.cnf` 
 - Reinicie o container do MySQL `docker restart database`
 - Utilize softwares clientes MySQL, como o DBeaver, por meio do endereço IP do container MySQL, porta 3307 e o usuário admin, com a senha definida previamente.
   - Para saber o endereço IP do banco de dados, utilize o comando `docker inspect -f '{{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' database`

# Extensões do VSCode recomendadas
 - PHP Intelephense
 - Material Icon Theme