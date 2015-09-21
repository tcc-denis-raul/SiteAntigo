<!--Script para adicionar o curso no BD -->
<?php
if ($_POST['enviar_dados']){
	include "conexoes.php";
	session_start();
	if((!isset ($_SESSION['login']) == true)) { 
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header('location:index.html'); 
	}
	$value = trim($_POST['enviar_dados']);
	$login = $_SESSION['login'];
	$_SESSION['desc'] = 1;
	//verificar se existe na tabela	
	$sql = "SELECT * FROM user_cursos WHERE useremail = '$login' and cursonome='$value'";
	$sql2 = "SELECT * FROM user_cursos WHERE useremail= '$login'";
	$resultado = pg_query($sql);
	$resultado2 = pg_query($sql);
	$qtd_linhas = pg_num_rows($resultado);
	$qtd_linhas2 = pg_num_rows($resultado2);
	if(qtd_linhas2 < 14){
	if($qtd_linhas == 0){
		$sql = "INSERT INTO user_cursos(useremail,cursonome) values('$login','$value')";
		$resultado = pg_query($sql);
		echo "<script>alert('Curso Adicionado aos meus cursos');history.back();</script>";
	}
	else{
		echo "<script>alert('Curso ja adicionado aos meus cursos');history.back();</script>";

	}}
	else{
		echo "<script>alert('Máximo de curso atingido');history.back();</script>";
	}
	
}
?>


