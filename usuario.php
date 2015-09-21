<?php include 'modelo.php';?>


<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Home</title>
    <!-- Abaixo um código que "chama" a folha de estilos que é responsável pelo tipo de fonte, localização do formulário...  -->
	<link rel="stylesheet" type="text/css"  href="CSS/home.css" />
	<script src="Textillate/jquery-2.1.4.min.js"></script>
	<script src="Textillate/jquery.lettering.js"></script>
	<script src="Textillate/jquery.textillate.js"></script>
	<link href="Textillate/animate.css" rel="stylesheet">
	<script> 
	   $(function () {
		 $('.p1').textillate({
		    initialDelay: 0,
		    in:{ 
		        effect: 'fadeInDown'
		    },
		});
		 $('.p2').textillate({
		    initialDelay: 700,
		    in:{ 
		        effect: 'fadeInDown'
		    },
		});
		 $('.p3').textillate({
		    initialDelay: 2500, 
		    in:{ 
		        effect: 'fadeInDown'
		    },
		});
		$('.p4').textillate({
		    initialDelay: 4500, 
		    in:{ 
		        effect: 'fadeInDown'
		    },
		});
		$('.p5').textillate({
		    initialDelay: 7200, 
		    in:{ 
		        effect: 'fadeInDown'
		    },
		});
	    })	

	</script>	
    </head>
<body>
	<a href="forum.php" ><img class="imagem" src="Imagem/pomba.gif"></a>
	<div class="parag">
		<div class="p1">	
			<p>Olá, eu sou a Paloma. </p>
		</div>
		<div class="p2">
			<p>Eu estou aqui para ajudar a escolher o melhor curso para você!!</p>
		</div>
		<div class="p3"> 
			<p>Vá na aba Escolher Curso Ideal para Desvendar o melhor curso.</p> 
		</div>	
		<div class="p4">		
			<p>Acesse Cursos Escolhidos caso já tenha escolhido um curso e começe a aprender AGORA!!</p>
		</div>
		<div class="p5">		
			<p>Caso tenha alguma dúvida, clique em mim, talvez eu possa ajudar.</p> 	
		</div>
	</div>
</body>
</html>
