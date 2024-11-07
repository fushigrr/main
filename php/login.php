<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa de Usuários - Cinema TB</title>
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

        .form-container input[type="text"] {
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

        .alert {
            color: #fff;
            background-color: #f39c12;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }

        .voltar-btn {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            text-decoration: none;
        }

        .voltar-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

    <header>
        <h1>Pesquisa de Usuários</h1>
    </header>

    <div style="text-align: center; margin-top: 20px;">
	<a href="../index.php" class="voltar-btn">Voltar</a>
    </div>

    <div class="container">
        <div class="form-container">
            <form method="POST" style="text-align:center;">
                <label for="pesquisar">Digite o nome ou e-mail:</label>
                <input type="text" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
                <button type="submit">Pesquisar</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $mysqli = new mysqli("localhost", "root", "", "aula10");

                if ($mysqli->connect_error) {
                    die("Falha na conexão: " . $mysqli->connect_error);
                }

                $pesquisar = $mysqli->real_escape_string($_POST['pesquisar']);

                $query = "SELECT * FROM clientes WHERE nome LIKE '%$pesquisar%' OR email LIKE '%$pesquisar%'";
                $result = $mysqli->query($query);

                if ($result->num_rows > 0) {
                    echo "<div class='resultado'>";
                    echo "<h3>Resultados da Pesquisa</h3>";
                    echo "<div class='produto-info'>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Nome</th><th>CPF</th><th>E-mail</th></tr>";

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>"; 
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['cpf'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<div class='alert'>Nenhum usuário encontrado com esse critério.</div>";
                }
                $mysqli->close();
            }
            ?>
        </div>
    </div>

</body>
</html>
