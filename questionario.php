<!--Pagina web para gerar o questionario de um determinado idioma-->

<?php include 'modelo.php';?>

<!DOCTYPE HTML>
<html lang="pt-br">
<!--CSS e javascript-->
<head>
  <meta charset="UTF-8">
    <title>P.A.L.O.M.A</title>
     <!-- Aqui chamamos o nosso arquivo css externo -->
    <link rel="stylesheet" type="text/css"  href="CSS/modelo.css" />  
</head>

<body>
	<!--Pegar algumas informações do curso -->
	<?php 
		$logado = $_SESSION['login'];
		$curso = $_SESSION['type'];
		//pegar o id do curso
		$sql = "SELECT * FROM idiomas WHERE  idioma = '$curso'";
		$resultado = pg_query($sql);
		$linha = pg_fetch_assoc($resultado);
		$id = $linha['id'];		
		//selecionar os questionario do curso com id = $id
		$sql = "SELECT * from questionario where id_idioma = '$id'";
		$resultado = pg_query($sql);
		$qtd_perg = pg_num_rows($resultado);		
	?>
	</br> </br>
		
	<!--Mostras as opções de cada pergunta-->
	<?php 
	     $num_ques = $_SESSION['num_ques']; 	
	     if($num_ques <= $qtd_perg){?>
		<div class="botao">
			<?php
				$sql =  "SELECT * from questionario where id_idioma = '$id' and num_ques = '$num_ques'";
				$resultado = pg_query($sql);
				$linha = pg_fetch_assoc($resultado);
			?>
			<div class="pergunta">
				<div align="center"><span><?=$linha['pergunta']?></span></div>
			</div>			
			<form name="form4" id="form4" method="post" action="Script/ques_resp.php">
				<?php for($i = 1; $i <= 2; $i++){
					if($linha[item . $i] != '-'){?>	
						<input type="checkbox" name="<?=item . $i?>" value="<?=$linha[item . $i]?>" /><?=$linha[item . $i]?></br>
				<?php }}?>
				<input type="submit" value="Enviar"/>
			</form>
		</div>
	<?php }
	    //usuário respondeu a todas as perguntas, processar elas e mostras os melhores cursos.
	    else{include "Script/seleciona.php";}?>
		
</body>
</html>
