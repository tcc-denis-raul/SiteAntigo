<!--Script para salvar todas as resposta aos questionario -->
<?php
include "conexoes.php";
session_start();
//selecionou alguma opção
if ($_POST){
	$logado = $_SESSION['login'];
	$curso = $_SESSION['type'];
	//pegar o id do curso
	$sql = "SELECT * FROM idiomas WHERE  idioma = '$curso'";
	$resultado = pg_query($sql);
	$linha = pg_fetch_assoc($resultado);
	$id = $linha['id'];		
	//selecionar os questionario do curso com id = $id
	$num_ques = $_SESSION['num_ques'];
	$sql = "SELECT * from questionario where id_idioma = '$id' and num_ques = '$num_ques'";
	$resultado = pg_query($sql);
	$linha = pg_fetch_assoc($resultado);
	//2 alternativas
	for($i = 1; $i <= 2; $i++){
		if($_POST['item'.$i ] == $linha['item'.$i]){
			$_SESSION[$linha['item'.$i]] = true;}
		else{
			$_SESSION[$linha['item'.$i]] = 0;}
	
	}
	//print($_SESSION['pago'] );//print($_SESSION[$linha['gratuito']] );//print($_SESSION[$linha['item3']] );
	$_SESSION['num_ques']++;
	echo "<script>window.location='../questionario.php'</script>";
}
else//não escolheu nenhuma opção
	echo "<script>alert('Escolha alguma opção');history.back();</script>";
?>

