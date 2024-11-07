<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<form method="POST" action="pesqcli.php">
		Nome do Cliente: <input type="text" name="nome" maxlength="40" placeholder="digite o nome">
		<input type="submit" value="pesquisar" name="botao">
	</form>

	<?php 
	if(isset($_POST["botao"])){

		require("conecta.php");
		$nomecli=htmlentities($_POST["nome"]);

		$query = $mysqli->query("select * from clientes where nome like '%$nome%'");
		echo $mysqli->error;

		echo "
		<table border='1' width='400'>
		<tr>
		<th>ID</th>
		<th>CPF</th>
		<th>Nome do Cliente</th>
		</tr>
		";
		while ($tabela=$query->fetch_assoc()) {
			echo "
			<tr><td align='center'>$tabela[id]</td>
			<td align='center'>$tabela[cpf]</td>
			<td align='center'>$tabela[nome]</td>
			</tr>
			";
		}
		echo "</table>";
	}
	?>
	<a href='clientes.php'> Voltar</a>
</body>
</html>