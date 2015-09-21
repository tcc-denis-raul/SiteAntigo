<!--Script para reconhecer item selecionado pelo usuário 
e redirecionar corretamente(para descrição do curso ou para questionario do idioma) -->
<?php
if ($_POST['dados_enviar']){
	include "conexoes.php";
	session_start();
	if((!isset ($_SESSION['login']) == true)) { 
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header('location:index.html'); 
	}
	$value = trim($_POST["dados_enviar"]);
	$_SESSION['type'] = $value;
	$_SESSION['desc'] = 1;
	$sql1 = "SELECT idioma from idiomas where idioma = '$value'";
	$sql2 = "SELECT nome from cursos where nome = '$value'";
	$resultado1 = pg_query($dbconn,$sql1);
	$resultado2 = pg_query($dbconn,$sql2);
	$linha1 = pg_num_rows($resultado1); 	
	$linha2 = pg_num_rows($resultado2);
	if(($linha1 == 0) && ($linha2 == 0) || ($linha1 == 1) && ($linha2 == 1)){
		echo "<script>alert('Erro desconhecido');history.back();</script>";
	}
	else if(($linha1 == 1) && ($linha2 == 0)){
		$_SESSION['num_ques'] = 1;
		header("Location: ../questionario.php");
	}
	else if(($linha1 == 0) && ($linha2 == 1)){
		header("Location: ../descricao.php");	
	}	
	

}
?>

