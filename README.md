# Homework - Backend

## Descrição:

```
API foi construída com PHP, utilizando Framework Laravel 10. Para o banco de dados, foi utilizado
a ferramenta MySQL Workbench. Para o envio de email, foi utilizado o Mailtrap.

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
PHP: ^8 | Laravel: 10| Composer: 2.6 | MySQL Workbench | Mailtrap Account
```

## Funções - Vendedor:

-   Cadastro de Vendedor
-   Listar Vendedores
-   Excluir Vendedor
-   Editar Vendedor

## Funções - Vendas:

-   Cadastro de Venda
-   Listar Venda por Vendedor

## Funções - Relatório:
-   Enviar relatório via email

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

No arquivo mail.php(config\mail.php), alterar linhas 102-105 para o respectivo remente

```
Ex:

'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'remetente@email.com'),
        'name' => env('MAIL_FROM_NAME', 'Nome Remetente'),
    ],

```

**Passo 4:**

No arquivo SendReport.php(app\Console\Commands\SendReport.php), alterar linha 47 para o respectivo destinatário

```
Ex:

$to = 'destinatario@email.com';
```

**Passo 5:**

No arquivo .env(raiz do projeto), alterar linhas 31-35 com as informações da plataforma do Mailtrap

```
Ex:

MAIL_MAILER=smtp
MAIL_HOST=host
MAIL_PORT=port
MAIL_USERNAME=username
MAIL_PASSWORD=password
```

**Passo 6:**

Para rodar o projeto, execute o seguinte comando:

```
php artisan serve
```

**URL do projeto com Swagger**

```
http://127.0.0.1:8000/api/documentation
```

**CRON envio de email**

Para rodar a CRON de enviar o relatório, altere para a linha 15 do arquivo Kernel.php(app\Console\Kernel.php) para a hora desejada.

```
Ex:
$schedule->command('app:send-report')->dailyAt('18:00'); 
```

Em seguida, basta rodar o comando:
```
php artisan schedule:run
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
[GET]   /api/sale/list/{id}       /* Busca apenas a venda de um vendedor, usando o ID do vendedor
                                     como parâmetro */
```

Referente ao relatório:

```
 HTTP         URL                         TO DO
[POST]  /api/send-email           /* Envia relatório por email pré-setado no projeto(citados nos
                                     passos 3, 4 e 5) */
```

**Diagrama ER**

![Diagrama ER](https://media.discordapp.net/attachments/899352560379494450/1180288238292836352/689021cc-30fe-49ac-aac7-39b37dcdf85b.jpg?ex=657ce014&is=656a6b14&hm=2dd899b962a424ad9c1f6bbc76b2dccda18261f11299a2b6373da71fd58f9fb6&=&format=webp)


**Documentação no Swagger**

![Doc Swagger](https://media.discordapp.net/attachments/899352560379494450/1180359994974146721/swagger_2.jpg?ex=657d22e8&is=656aade8&hm=d8bc117c183f4e26e152b78135dd4da44cda1213ffc72da48537c3c2af1065da&=&format=webp&width=1020&height=566)


