<!--Script para realizar Delete de um curso do usuario-->
<?php
if ($_POST['enviarDados']){
	include "conexoes.php";
	session_start();
	if((!isset ($_SESSION['login']) == true)) { 
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header('location:index.html'); 
	}
	$value = trim($_POST['enviarDados']);
	$login = $_SESSION['login'];
	//verificar se existe na tabela
	
	$sql = "SELECT * FROM user_cursos WHERE useremail = '$login' and cursonome='$value'";
	$resultado = pg_query($sql);
	$qtd_linhas = pg_num_rows($resultado);
	if($qtd_linhas > 0){	
		$sql = "DELETE FROM user_cursos WHERE useremail = '$login' and cursonome='$value'";
		$resultado = pg_query($sql) or die("erro");
		echo "<script>window.location='../usuario.php';alert('Curso excluido com sucesso');</script>";
	}
	else{
		echo "<script>window.location='../usuario.php';alert('Curso ja excluido');</script>";
	}
}
?>




