<!--Pagina web para gerar descrição do curso selecionado-->

<?php include 'modelo.php';?>

<!DOCTYPE HTML>
<html lang="pt-br">
<!-- CSS e javascript-->
<head>
  <meta charset="UTF-8">
    <title>P.A.L.O.M.A</title>
     <!-- Aqui chamamos o nosso arquivo css externo -->
    <link rel="stylesheet" type="text/css"  href="CSS/modelo.css" />
    <link rel="stylesheet" type="text/css"  href="CSS/imagem.css" />
</head>

<!--Gera a descrição conforme o curso selecionado-->
<body>
	<!--Descrição-->	
	</br></br>
	<?php
		$logado = $_SESSION['login'];
		$curso = $_SESSION['type'];
		$desc = $_SESSION['desc'];
		$sql = "SELECT * from cursos where nome = '$curso'";
		$resultado = pg_query($sql);
		$linha = pg_fetch_assoc($resultado);
	?>
	<!--Nome do curso -->
	<div class="titulo">
		<div><span><?=$linha['nome']?></span></div>
	</div>
	<img src="Imagem/Logo/<?=$linha['nome']?>.png" id="<?=$linha['tid']?>"/>
	<!--Descrição do curso-->
	<div id="desc<?=$linha['tid']?>">
		<p>Um curso <?php if(($linha['gratis'] == t) && ($linha['pago'] == t)){?> que oferece planos gratuitos e pagos <?php } 
				  else if($linha['gratis'] == t){?> totalmente gratuito <?php } else{?> pago <?php }?> 
		   que tem como objetivo ensinar inglês para <?php if(($linha['adulto'] == t) && ($linha['crianca']==t)){?> crianças e adultos. 								     <?php } else if($linha['adulto']){?> adultos. <?php } else{?>crianças. <?php }?>
		</p>
		<p>Sua página é toda em <?php if($linha['portugues'] == t){?> português <?php } else{?> inglês<?php }?>
		   e está disponível <?php if(($linha['movel'] == t) && ($linha['desktop'] == t)){?> nas plataformas desktop e móvel. <?php }
		  		           else if($linha['movel'] == t){?>na plataforma móvel. <?php } else{?>na plataforma desktop.<?php } ?>
				     
		</p>
		<p>O curso tem como característica <?php if(($linha['comprofessor'] == t) && ($linha['semprofessor'] == t)){?> valorizar o estudo por conta do autodidata, mas também oferece ajuda de professores<?php } 
					else if($linha['comprofessor'] == t){?> o acompanhamento de professores para facilitar o aprendizado do aluno <?php } else{ ?> valorizar o estudo por conta do autodidata <?php } ?>
		</p>
		<p><?php if(($linha['comwebconf'] == t) && ($linha['comchatfor'] ==t)){?> O curso oferece Web conferência, chat ou forúm que permite a troca de informações entre os usuários <?php } else if($linha['comwebconf'] == t){?> O curso oferece Web conferência que permite a troca de informações entre os usuários<?php } else if($linha['comchatfor'] == t){?>O curso oferece chat ou forúm que permite a troca de informações entre os usuários <?php } ?>
		</p>
		<p><?php if($linha['comcertificado'] == t)?>Além disso, o curso emite certificado no final.
		</p>
		<p>Número de avaliações positivas: <?=$linha['rate']?>
		</p>
		<a href='<?=$linha['link']?>'>Pagina do curso &raquo</a>
	</div>
	<div class="botao">
		<div class="forms">	
		<?php if($desc == 1){ ?>
			<!--Para excluir curso-->
			<form method="post" action="Script/delete.php" >	
				<input type="hidden" id="<?=$linha['nome'] . '2'?>" name="enviarDados" value="" />
				<input type="image" align="center" value="Delete" src="Imagem/delete.png" onclick="return js2('<?=$linha['nome']?>')"/>
			</form> 
		<?php } else{ ?>
			<!--Para Adicionar o curso-->		
			<form method="post" action="Script/adiciona_c.php">
				<input type="hidden" id="<?=$linha['nome'] .'1'?>" name="enviar_dados" value="" />
		        	<input type="image" align="center" value="Adicionar" src="Imagem/mais.png" onclick="return js1('<?=$linha['nome']?>')" id="resposta"/>
		     	</form>	
		<?php } ?>

		<!--Para Avaliar positivamente o curso-->
		<form method="post" action="Script/like.php" >	
			<input type="hidden" id="<?=$linha['nome'] . '3'?>" name="enviardados" value="" />
			<input type="image" value="Like" align="center" src="Imagem/like.png" onclick="return js3('<?=$linha['nome']?>')"/>
	
		</form>
	
		<form method="post" action="Script/unlike.php">	
		<!--Para Avaliar negativamente o curso-->
			<input type="hidden" id="<?=$linha['nome'] . '4'?>" name="Enviardados" value="" />
			<input type="image" value="Unlike" align="center" src="Imagem/unlike.png" onclick="return js4('<?=$linha['nome']?>')"/>
	
		</form>
		</div> 
	</div>  
</body>
</html>
