<!--Script para configurar o nome do curso e descrição tipo 2 quando no campo de "Melhores cursos" -->
<?php
if ($_POST['enviaR_dados']){
	include "conexoes.php";
	session_start();
	if((!isset ($_SESSION['login']) == true)) { 
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header('location:index.html'); 
	}
	$value = trim($_POST['enviaR_dados']);
	$login = $_SESSION['login'];
	$_SESSION['type'] = $value;
	$sql = "SELECT * from user_cursos where useremail='$login' and cursonome='$value'";
	$resultado = pg_query($sql);
	$qtd_linha = pg_num_rows($resultado);	
	if($qtd_linha > 0){
		$_SESSION['desc'] = 1;}
	else
		$_SESSION['desc'] = 2;
	echo "<script>window.location='../descricao.php';</script>";
	
}
?>


