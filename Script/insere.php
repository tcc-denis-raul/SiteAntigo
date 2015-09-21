<!--Script para inserir um novo usuário no BD -->

<?php
    
    //iniciar a sessao
    session_start();

    //verificar se os dados vieram de um POST
    if ($_POST) {
	//Conectar a um banco
        include "conexoes.php";
	//Recuperar os dados digitados sem espaços no começo
	$nome = trim($_POST["nome"]);        
	$email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);
        
	//Verificar se algum campo está em branco
        if (empty($nome)) {
            echo "<script>alert('Preencha o Nome');history.back();</script>";
        }
	else if (empty($email)) {
            echo "<script>alert('Preencha o campo email');history.back();</script>";
        }
        else if (empty($senha)) {
            echo "<script>alert('Preencha o campo senha');history.back();</script>";
        }
	
        else {
            //Procurar pelo usuário no Banco
	    $sql = "select * from usuario where email = '$email' limit 1";
            $resultado = pg_query($sql);
	    //Separar o usuário
            $linha = pg_fetch_array($resultado);
	    $login_bd = $linha["email"];
            if (!empty($login_bd)) {
                echo "<script>alert('Usuario existe');history.back();</script>";
            }else {
               $sql = "INSERT INTO usuario(nome,email,senha) values ('$nome','$email','$senha')";
	       $resultado = pg_query($dbconn,$sql);
	       if(resultado){
	           echo "<script>window.location='../index.html';alert('Usuario criado com sucesso');</script>";
	      }else{
		   echo "<script>alert('Erro: Tente novamente');history.back();</script>";
	       }
            }
	    
 
        }
    } else {
        echo "Requisicao invalida!";
        exit;
    }
?>
