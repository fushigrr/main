<?php 
	require("conecta.php");
	$cpf="";
	$nome=""; 
	if(isset($_GET["alterar"])){
		$id = htmlentities($_GET["alterar"]);
		$query=$mysqli->query("select * from clientes where id = '$id'");
		$tabela=$query->fetch_assoc();
		$cpf=$tabela["cpf"];		
		$nome=$tabela["nome"];
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="altcli.php">
		<input type="hidden" name="idc" value="<?php echo $id ?>">
		cpf: <input type="text" name="cpf" value="<?php echo $cpf ?>">
		<br/><br/>			
		nome: <input type="text" name="nome" value="<?php echo $nome ?>">
		<input type="submit" value="Salvar" name="botao">

	</form>
	<a href ="clientes.php"> Voltar </a>
	<br />
</body>
</html>

<?php 
	if(isset($_POST["botao"])){
		$id   = htmlentities($_POST["id"]);
		$cpf  = htmlentities($_POST["cpf"]);
		$nome = htmlentities($_POST["nome"]);

		$mysqli->query("update clientes set cpf = '$cpf', nome='$nome' where id = '$id'  ");
		echo $mysqli->error;
		if ($mysqli->error == "") {
			echo "Alterado com sucesso";
		}
	}
?>