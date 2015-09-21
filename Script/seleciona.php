<!--Seleciona os cursos conforme as resposta do questionario("pagina continuação de questionario.php")-->

<!--Informações básicas-->
<?php 
	include "conexoes.php";
	session_start();
	if((!isset ($_SESSION['login']) == true)) { 
		unset($_SESSION['login']); 
		unset($_SESSION['senha']); 
		header('location:index.html'); 
	}
	//Campos do banco de dados: preencher conforme os campos da tabela questionario
	$Pago=$_SESSION['Pago'];
	$Gratis=$_SESSION['Gratuito']; 	
	$Adulto=$_SESSION['Adulto'];		
	$Crianca=$_SESSION['Criança'];
	$Portugues=$_SESSION['Português'];
	$Ingles=$_SESSION['Inglês'];
	$Movel=$_SESSION['Móvel'];
	$Desktop=$_SESSION['Desktop'];
	$CProfessor=$_SESSION['Com Professor'];
	$SProfessor=$_SESSION['Sem Professor'];
	$CWeb=$_SESSION['Com Web Conferência'];
	$SWeb=$_SESSION['Sem Web Conferência'];
	$CChat=$_SESSION['Com chat/forum'];
	$SChat=$_SESSION['Sem chat/forum'];
	$CCert=$_SESSION['Com Certificado'];
	$SCert=$_SESSION['Sem Certificado'];

	$sql = "SELECT * FROM cursos WHERE (pago = '$Pago' or gratis = '$Gratis') AND
					   (adulto = '$Adulto' or crianca = '$Crianca') AND
					   (portugues = '$Portugues' or ingles = '$Ingles') AND
					   (movel = '$Movel' or desktop = '$Desktop')  AND 
					   (comprofessor = '$CProfessor' or semprofessor = '$SProfessor') AND
					   (comwebconf = '$CWeb' or semwebconf = '$SWeb') AND
					   (comchatfor = '$CChat' or semchatfor = '$SChat' ) AND
					   (comcertificado = '$CCert' or semcertificado = '$SCert') ORDER BY rate DESC LIMIT 7";
	$resultado = pg_query($sql);
	$qtd_linha = pg_num_rows($resultado);

	
?>

<!DOCTYPE HTML>
<html lang="pt-br">
<!--CSS e Javascript-->
<head>
  <meta charset="UTF-8">
    <title>P.A.L.O.M.A</title>
     <!-- Aqui chamamos o nosso arquivo css externo -->
    <link rel="stylesheet" type="text/css"  href="CSS/modelo.css" /> 
    <script src="js/Scripts.js"></script> 
</head>
<body>
  <div class="melhores"> 	
  	<div><span>Melhores cursos para seu perfil:</span></div>
  </div>
	</br></br>
	<?php if($qtd_linha > 0){
		$count=1;
		while($linha = pg_fetch_assoc($resultado)){?>
			<table class="tab">
				<td><form align="center" method="post" action="Script/set_cd.php">
					<div class="botaoR">
						<input type="hidden" id="<?=$linha['nome'] .'2'?>" name="enviaR_dados" value="" />
						<input type="submit" value="<?=$count?><?='. '?><?=$linha['nome']?>" onclick="return js2('<?=$linha['nome']?>')" id="resposta"/>
						<?php $count++;?>
					</div>
				</form></td>
		<?php } ?>
			
					      
	<?php }else{ echo "<script>window.location='usuario.php';alert('Nenhum curso encontrado');</script>";
		    }?>
</body>
</html>





