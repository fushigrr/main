<?php
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome']) && isset($_POST['cpf']) && isset($_POST['email']) && isset($_POST['celular']) &&
        !empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['email']) && !empty($_POST['celular'])) {
        
        require("conecta.php");

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $celular = $_POST['celular'];

        $query = "INSERT INTO clientes (nome, cpf, email, celular) 
                  VALUES ('$nome', '$cpf', '$email', '$celular')";

        if ($mysqli->query($query)) {
            $message = "<div class='message' style='color: green;'>Cadastro realizado com sucesso!</div>";
            
            $_POST['nome'] = '';
            $_POST['cpf'] = '';
            $_POST['email'] = '';
            $_POST['celular'] = '';
        } else {
            $message = "<div class='message' style='color: red;'>Erro ao cadastrar cliente. Tente novamente.</div>";
        }

        $mysqli->close();
    } else {
        $message = "<div class='message' style='color: red;'>Por favor, preencha todos os campos.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema TB - Cadastro de Clientes</title>
    <link rel="stylesheet" href="../css/styles.css">
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
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        header h1 {
            color: #e74c3c;
            margin: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .loja {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            width: 600px;
            margin-top: 20px;
        }

        .loja h1 {
            text-align: center;
            color: #e74c3c;
        }

        .loja button {
            width: 48%;
            padding: 12px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            margin: 5px;
        }

        .loja button:hover {
            background-color: #c0392b;
        }

        .form-container {
            margin-top: 30px;
        }

        .form-container form {
            display: flex;
            flex-direction: column;
        }

        .form-container label {
            margin-bottom: 8px;
            color: #fff;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="tel"] {
            padding: 12px;
            margin-bottom: 15px;
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
            font-size: 1.2em;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #c0392b;
        }

        .center-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .center-btn a {
            width: 100%;
            text-align: center;
            padding: 12px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            font-size: 1.2em;
            border-radius: 5px;
            cursor: pointer;
        }

        .center-btn a:hover {
            background-color: #c0392b;
        }

        .message {
            text-align: center;
            font-size: 1.2em;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Cadastro de Clientes</h1>
    </header>

    <div class="container">
        <div class="loja">
            <div class="center-btn">
                <a href="../index.php">Voltar</a>
            </div>

            <?php
            if ($message) {
                echo $message;
            }
            ?>

            <div class="form-container">
                <form action="adcli.php" method="POST">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>" required>

                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" value="<?php echo isset($_POST['cpf']) ? $_POST['cpf'] : ''; ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>

                    <label for="celular">Telefone:</label>
                    <input type="tel" id="celular" name="celular" value="<?php echo isset($_POST['celular']) ? $_POST['celular'] : ''; ?>" required>

                    <button type="submit">Cadastrar Cliente</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
