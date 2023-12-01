
<!DOCTYPE html>
<html>
<head>
    <title>Vendas de hoje</title>

    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Relatório de vendas do dia {{ $today }}</h1>

    <p>Olá,</p>
    <p>Segue abaixo, relatório de vendas.</p>
    <p>Número total de vendas: {{ $countSales }}</p>
    <p>Somatória sobre o valor das vendas: R$ {{ $sumAllSales }}</p>

    <table>
        <thead>
            <tr>
                <th>ID Vendedor</th>
                <th>Vendedor</th>
                <th>Email</th>
                <th>Comissão</th>
                <th>Valor da venda</th>
                <th>Data da venda</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message['id'] }}</td>
                    <td>{{ $message['user']['name'] }}</td>
                    <td>{{ $message['user']['email'] }}</td>
                    <td>{{ $message['commission'] }}</td>
                    <td>{{ $message['sale_value'] }}</td>
                    <td>{{ $message['sale_date'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
  
</body>
</html>