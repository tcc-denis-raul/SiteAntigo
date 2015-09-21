<!--Script para realizar avaliação de um curso do usuario-->
<?php
if ($_POST['Enviardados']){
	include "conexoes.php";
	session_start();
	if((!isset ($_SESSION['login']) == true)) { 
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header('location:index.html'); 
	}
	$value = trim($_POST['Enviardados']);
	$login = $_SESSION['login'];
	//verificar se existe na tabela
	
	$sql = "SELECT * FROM cursos WHERE nome='$value'";
	$resultado = pg_query($sql);
	$qtd_linhas = pg_num_rows($resultado);
	if($qtd_linhas > 0){	
		$linha = pg_fetch_assoc($resultado);
		$rate = $linha['rate']-1;
		$sql = "UPDATE cursos set rate = '$rate' WHERE nome = '$value'";
		$resultado = pg_query($sql) or die("erro");
		echo "<script>window.location='../descricao.php';alert('Curso avaliado negativamente com sucesso');</script>";
	}
	else{
		echo "<script>window.location='../descricao.php';alert('Erro na avaliação');</script>";
	}
}

?>




