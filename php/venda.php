<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema TB - Compra</title>
    <style>
        body {
            font-family: 'Garamond', serif;
            background-color: #2c2c2c;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1a1a1a;
            color: #e74c3c;
            text-align: center;
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            width: 500px; 
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .form-container h2 {
            text-align: center;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-size: 1em;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            background-color: #333;
            color: #fff;
            font-size: 1em;
        }

        .form-container button {
            width: 100%;
            padding: 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
        }

        .form-container button:hover {
            background-color: #c0392b;
        }

        .resultado {
            margin-top: 20px;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 10px;
            text-align: center;
        }

        .resultado p {
            font-size: 1.1em;
            margin-bottom: 8px;
        }

        .resultado h3 {
            font-size: 1.5em;
            color: #e74c3c;
        }

        .form-container h3 {
            text-align: center;
        }

        .form-container p {
            text-align: center;
        }

        .produto-info {
            margin-top: 10px;
            font-size: 1.1em;
            text-align: left;
        }

        .produto-info table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .produto-info th, .produto-info td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .produto-info th {
            background-color: #333;
            color: #fff;
        }

        .produto-info td {
            background-color: #444;
        }

    </style>
</head>
<body>

    <header>
        <h1>Venda de Filmes</h1>
    </header>

    <div class="container">
        <div class="form-container">
            <h2>Formulário de Compra</h2>
            <form method="POST" action="">
                <label for="nome">Nome do Cliente:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="celular">Celular:</label>
                <input type="text" id="celular" name="celular" required>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>

                <h3>Produtos</h3>
                <label for="produto1qtd">A Noiva Cadáver (R$30):</label>
                <input type="number" id="produto1qtd" name="produto1qtd" min="0" value="0" required>

                <label for="produto2qtd">O Estranho Mundo de Jack (R$25):</label>
                <input type="number" id="produto2qtd" name="produto2qtd" min="0" value="0" required>

                <label for="produto3qtd">Frankenstein (R$35):</label>
                <input type="number" id="produto3qtd" name="produto3qtd" min="0" value="0" required>

                <h3>Taxa Fixa</h3>
                <p>Taxa de Processamento (R$ 15,00)</p>
        
                <button type="submit">
                    Finalizar Compra
                </button>
            </form>
        </div>
    </div>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mysqli = new mysqli("localhost", "root", "", "aula10");

        if ($mysqli->connect_error) {
            die("Falha na conexão: " . $mysqli->connect_error);
        }

        $nome = $_POST['nome'];
        $celular = $_POST['celular'];
        $email = $_POST['email'];

        $produto1qtd = $_POST['produto1qtd'];
        $produto2qtd = $_POST['produto2qtd'];
        $produto3qtd = $_POST['produto3qtd'];
        
        $taxa = 15.00;

        $produto1preco = 30.00;
        $produto2preco = 25.00;
        $produto3preco = 35.00;

        $produto1total = $produto1qtd * $produto1preco;
        $produto2total = $produto2qtd * $produto2preco;
        $produto3total = $produto3qtd * $produto3preco;

        $tprodutostotal = $produto1total + $produto2total + $produto3total;

        $total = $tprodutostotal + $taxa;

        // Preparando a consulta
        $stmt = $mysqli->prepare(
            "INSERT INTO vendas (nome_cliente, celular_cliente, email_cliente, 
                                 produto1nome, produto1preco, produto1qtd,
                                 produto2nome, produto2preco, produto2qtd,
                                 produto3nome, produto3preco, produto3qtd,
                                 taxa_fixa, total)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );

        if ($stmt === false) {
            die('Erro ao preparar a consulta SQL: ' . $mysqli->error);
        }

        $stmt->bind_param("sssdssssddddd", 
            $nome, $celular, $email, 
            $produto1nome = 'A Noiva Cadáver', $produto1preco, $produto1qtd,
            $produto2nome = 'O Estranho Mundo de Jack', $produto2preco, $produto2qtd,
            $produto3nome = 'Frankenstein', $produto3preco, $produto3qtd,
            $taxa, $total
        );

        $stmt->execute();
        $stmt->close();

        echo "<div class='resultado'>";
        echo "<h3>Compra Realizada com Sucesso!</h3>";
        echo "<p><strong>Cliente:</strong> $nome</p>";
        echo "<p><strong>Celular:</strong> $celular</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        
        echo "<div class='produto-info'>";
        echo "<h4>Detalhes dos Produtos:</h4>";
        echo "<table>";
        echo "<tr><th>Produto</th><th>Preço Unitário</th><th>Quantidade</th><th>Total</th></tr>";

        if ($produto1qtd > 0) {
            echo "<tr><td>A Noiva Cadáver</td><td>R$ " . number_format($produto1preco, 2, ',', '.') . "</td><td>$produto1qtd</td><td>R$ " . number_format($produto1total, 2, ',', '.') . "</td></tr>";
        }
        if ($produto2qtd > 0) {
            echo "<tr><td>O Estranho Mundo de Jack</td><td>R$ " . number_format($produto2preco, 2, ',', '.') . "</td><td>$produto2qtd</td><td>R$ " . number_format($produto2total, 2, ',', '.') . "</td></tr>";
        }
        if ($produto3qtd > 0) {
            echo "<tr><td>Frankenstein</td><td>R$ " . number_format($produto3preco, 2, ',', '.') . "</td><td>$produto3qtd</td><td>R$ " . number_format($produto3total, 2, ',', '.') . "</td></tr>";
        }

        echo "</table>";
        echo "<p><strong>Taxa Fixa:</strong> R$ " . number_format($taxa, 2, ',', '.') . "</p>";
        echo "<p><strong>Total Final:</strong> R$ " . number_format($total, 2, ',', '.') . "</p>";
        echo "</div>";
        echo "</div>";

        $mysqli->close();
    }
?>

</body>
</html>
