<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Cinema TB - Cadastro</title>
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

    </style>
</head>
<body>

    <div class="loja">
        <a href="clientes.php">
            <button id="cadastroBtn">Cadastrar-se</button>
        </a><br/><br/>
        <a href="exccli.php">
            <button id="excluirCadastroBtn">Excluir Cadastro</button>
        </a><br/><br/>

        <a href="../index.php" id="voltarBtn">Voltar</a>
    </div>

    <script type="text/javascript" src="js/cadastro.js"></script>
</body>
</html>
