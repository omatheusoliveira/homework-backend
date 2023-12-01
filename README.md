# Homework - Backend

## Descrição:

```
API foi construída com PHP, utilizando Framework Laravel 10. Para o banco de dados,
foi utilizado MySQL Workbench

Em resumo, ela foi feita para o controle de vendas, onde é possível cadastrar vendedor(CRUD), cadastrar
venda e consultar venda. Está setado o valor de 8.5% de comissão para o vendedor sobre o valor da venda.
Há uma CRON para todos os dias, as 5pm, enviar um relatório de vendas referente ao dia corrente via email.
```

## Tecnologias usadas:

```
PHP | Laravel | SQL
```

## Itens obrigatórios:

```
PHP: ^8 | Laravel: 10| Composer: 2.6 | MySQL Workbench
```

## Funções - Vendedor:

-   Cadastro de Vendedor
-   Listar Vendedores
-   Excluir Vendedor
-   Editar Vendedor

## Funções - Vendas:

-   Cadastro de Venda
-   Listar Venda por Vendedor

## Inicializando o projeto

**Passo 1:**

Abra o arquivo .env e coloque as informações referentes ao seu db.

```
DB_CONNECTION=mysql
DB_HOST=your_host
DB_PORT=your_port
DB_DATABASE=your_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

**Passo 2:**

Execute este comando para criar as tabelas no db:

```
php artisan migrate
```

**Passo 3:**

Para rodar o projeto, execute o seguinte comando:

```
php artisan serve
```

## Rotas:

Referente ao vendedor:

```
 HTTP          URL                        TO DO
[POST]   /api/users/create        /* Cria um vendedor */
[GET]    /api/users/list          /* Busca todos os vendedores */
[DELETE] /api/user/delete/{id}    /* Deleta vendedor usando ID do mesmo como parâmetro na request */
[PUT]    /api/users/update/{id}   /* Edita vendedor usando ID do mesmo como parâmetro na request */

```

Referente as vendas:

```
 HTTP         URL                         TO DO
[POST]  /api/sale/create          /* Cria uma venda */
[GET]   /api/sale/list/{id}       /* Busca apenas a venda de um vendedor, usando o ID do vendedor como parâmetro */

```
