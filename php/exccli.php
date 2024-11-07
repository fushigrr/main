<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema TB - Exclusão de Cadastro</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <style>
        body {
            font-family: 'Garamond', serif;
            background-color: #2c2c2c;
            color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .loja {
            text-align: center;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .loja h1 {
            color: #e74c3c;
            font-size: 2em;
            margin-bottom: 20px;
        }

        .loja button {
            width: 100%;
            padding: 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            margin: 10px 0;
            transition: background-color 0.3s;
        }

        .loja button:hover {
            background-color: #c0392b;
        }

        .loja #voltarBtn {
            width: 100%;
            padding: 12px;
            background-color: #e74c3c; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            margin: 10px 0;
            text-decoration: none; 
            transition: background-color 0.3s;
        }

        .loja #voltarBtn:hover {
            background-color: #c0392b;
        }

        .message {
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
        }

        .form-container {
            margin-top: 30px;
        }

        .form-container input[type="text"] {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            background-color: #333;
            color: #fff;
            font-size: 1em;
            width: 100%;
        }
    </style>
</head>
<body>

    <div class="loja">

        <div class="form-container">
            <form action="exccli.php" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <button type="submit">Excluir Cadastro</button>
            </form>
        </div>

        <?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = htmlentities($_POST["nome"]);

            require("conecta.php");

            $query = "SELECT * FROM clientes WHERE nome = '$nome'";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                $mysqli->query("DELETE FROM clientes WHERE nome = '$nome'");
                
                if ($mysqli->error == "") {
                    echo "<div class='message' style='color: green;'>Cadastro excluído com sucesso!</div>";
                } else {
                    echo "<div class='message' style='color: red;'>Erro ao excluir o cadastro. Tente novamente.</div>";
                }
            } else {
                echo "<div class='message' style='color: red;'>Cliente não encontrado. Verifique os dados.</div>";
            }

            $mysqli->close();
        }
        ?>

        <br><br><a href="../index.php" id="voltarBtn">Voltar</a>
    </div>

</body>
</html>
