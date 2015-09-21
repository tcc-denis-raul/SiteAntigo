<!--Pagina principal para o Usuário logado -->

<!--Pegar alguns dados básicos-->
<?php 
include "Script/conexoes.php";
session_start();
if((!isset ($_SESSION['login']) == true)) { 
	unset($_SESSION['login']); 
	unset($_SESSION['senha']); 
	header('location:index.html'); 
}
$logado = $_SESSION['login']; 
$sql = "select cursonome from user_cursos where useremail = '$logado'";
$resultado = pg_query($dbconn,$sql);
$numLinhas = pg_num_rows($resultado);
?>

<!--Pagina html-->
<!DOCTYPE HTML>
<html lang="pt-br">
<!--CSS e Javascript-->
<head>
  <meta charset="UTF-8">
    <title>P.A.L.O.M.A</title>
     <!-- Aqui chamamos o nosso arquivo css externo -->
    <link rel="stylesheet" type="text/css"  href="CSS/modelo.css" />
    <script src="js/Scripts.js"></script> 
<link rel="stylesheet" href="CSS/reveal.css">  
	<script src="js/Scripts.js"></script>  
	<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="js/jquery.reveal.js"></script>   
</head>

<body>

<nav>
  <!--Primeiro menu-->
  <ul class="menu">
    <li><a href="usuario.php">Home</a></li>

    <li><a href="#">Meus Cursos</a>
         <ul>
		<?php if($numLinhas > 0){ 
			while($linha = pg_fetch_assoc($resultado)){?>
				<form method="post" action="Script/set_ci.php">
					<input type="hidden" id="<?=$linha['cursonome']?>" name="dados_enviar" value="" />
                   			<input type="submit" value="<?=$linha['cursonome']?>" onclick="return js('<?=$linha['cursonome']?>')" id="meuscursos"/>
                        	</form>
			<?php } ?>		      
		<?php }?>        
		        
	</ul>
    </li>

	
    <li><a>Escolher um Curso Ideal</a>
	<ul>
		<?php
			$sql = "select idioma from idiomas";
			$resultado = pg_query($sql);
			$numLinha = pg_num_rows($resultado);
			if($numLinha > 0){
				while($linha = pg_fetch_assoc($resultado)){?>
					<form method="post" action="Script/set_ci.php">
						<input type="hidden" id="<?=$linha['idioma']?>" name="dados_enviar" value="" />
		           			<input type="submit" value="<?=$linha['idioma']?>" onclick="return js('<?=$linha['idioma']?>')"  id = "cursos"/>
		 			</form>     
		<?php }} ?>
	</ul>
    </li>
    <li><a href="about.php">Sobre nós</a></li>              
  </ul>
  


  <!--Segundo menu-->
  <ul class="menu2">
	<?php $sql2 = "SELECT * FROM usuario WHERE email = '$logado'";
	      $resultado2 = pg_query($sql2);
	      $linha2 = pg_fetch_assoc($resultado2);
	?>
	<li><a href="#">Olá, <?=$linha2['nome']?></a>
		<ul>
			<a href="#" data-reveal-id="pDesconectar" align="center">Desconectar</a>
		</ul>
	</li>
  </ul>

  <div id="pDesconectar" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  	<h2 id="Ptitulo" align="center">Desconectar.</h2>
  	<p class="lead" align="center">Tem certeza?</p>
	<form method="post" action="Script/desconectar.php">
		<input type="hidden" id="<?=$linha2['email']?>" name="denviar" value="" />
		<input type="submit" value="Confirmar" onclick="return js('<?=$linha2['email']?>')" id="PbotaoDesc"/>
	</form>
	<input type="submit" class="close-reveal-modal" value="Cancelar"/>
  </div>
</nav>
</body>
</html>



