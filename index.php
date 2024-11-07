<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Cinema Tim Burtom</title>
</head>
<body>

    <header>
        <h1>Bem-vindo ao <span class="cinema-tim-burton">Cinema Tim Burton</span></h1>
        <h2>Compre seu bilhete para os melhores filmes do Tim Burton!</h2>
    </header>

    <div class="loja">
        <a href="php/cadastro.php"><button id="cadastroClientes">Cadastro</button></a>
        <a href="php/login.php"><button id="cadastro">Pesquisa</button></a>
    </div>

    <h2 class="titulo-filmes">Filmes em Cartaz</h2> 

    <section class="filmes">
        <div class="filme">
            <img src="img/noiva.jpg" alt="A Noiva Cadáver">
            <h3>A Noiva Cadáver</h3>
        </div>
        
        <div class="filme">
            <img src="img/jack.jpg" alt="O Estranho Mundo de Jack">
            <h3>O Estranho Mundo de </h3>
        </div>
        
        <div class="filme">
            <img src="img/frank.jpg" alt="Frankenweenie">
            <h3>Frankenweenie</h3>
        </div>
    </section>

    <div class="loja">
        <h1>Menu de Compra</h1>
        <a href="php/venda.php"><button id="bilhete">Comprar bilhete</button></a>
    </div>

    <script type="text/javascript" src="js/menu.js"></script>
</body>
</html>
