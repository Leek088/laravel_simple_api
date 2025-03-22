# Laravel Simple API

Este é um projeto de API simples desenvolvido com o framework Laravel. Ele fornece endpoints para autenticação e gerenciamento de clientes.

## Estrutura do Projeto

A estrutura do projeto é a seguinte:

```
.editorconfig
.env
.env.example
.gitattributes
.gitignore
artisan
composer.json
composer.lock
package.json
phpunit.xml
vite.config.js
.vscode/
    launch.json
app/
    Http/
    Models/
    Providers/
    Services/
bootstrap/
    app.php
    providers.php
    cache/
config/
    app.php
    auth.php
    cache.php
    database.php
    filesystems.php
    logging.php
    mail.php
    queue.php
    sanctum.php
    services.php
    session.php
database/
    .gitignore
    factories/
    migrations/
    seeders/
public/
    .htaccess
    index.php
    robots.txt
resources/
    css/
    js/
    lang/
    views/
routes/
    api.php
    console.php
    web.php
storage/
    app/
    framework/
    logs/
tests/
    Feature/
    Unit/
vendor/
```

## Instalação

1. Clone o repositório:

    ```sh
    git clone https://github.com/seu-usuario/laravel_simple_api.git
    cd laravel_simple_api
    ```

2. Instale as dependências do PHP:

    ```sh
    composer install
    ```

3. Instale as dependências do Node.js:

    ```sh
    npm install
    ```

4. Copie o arquivo `.env.example` para `.env` e configure suas variáveis de ambiente:

    ```sh
    cp .env.example .env
    ```

5. Gere a chave da aplicação:

    ```sh
    php artisan key:generate
    ```

6. Execute as migrações do banco de dados:

    ```sh
    php artisan migrate
    ```

7. Execute os seeders para popular o banco de dados:
    ```sh
    php artisan db:seed
    ```

## Executando o Projeto

Para iniciar o servidor de desenvolvimento, execute:

```sh
npm run dev
```

## Testes

Para executar os testes, utilize o comando:

```sh
php artisan test
```

## Endpoints

### Autenticação

-   `POST /login`: Realiza o login do usuário.
-   `GET /logout`: Realiza o logout do usuário autenticado.

### Clientes

-   `GET /clients`: Lista todos os clientes.
-   `GET /clients/{id}`: Exibe um cliente específico.
-   `POST /clients`: Cria um novo cliente.
-   `PUT /clients/{id}`: Atualiza um cliente existente.
-   `DELETE /clients/{id}`: Remove um cliente.

## Contribuição

Se você deseja contribuir com este projeto, por favor, siga os passos abaixo:

1. Faça um fork do repositório.
2. Crie uma branch para sua feature (`git checkout -b feature/nova-feature`).
3. Commit suas alterações (`git commit -am 'Adiciona nova feature'`).
4. Faça o push para a branch (`git push origin feature/nova-feature`).
5. Crie um novo Pull Request.

## Licença

Este projeto está licenciado sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
