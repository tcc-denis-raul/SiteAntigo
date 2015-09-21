<!--Script para verificar se o existe login/senha cadastrado no BD -->


<?php
    
    //iniciar a sessao
    session_start();

    //verificar se os dados vieram de um POST
    if ($_POST['login']) {
	//Conectar a um banco
        include "conexoes.php";
	//Recuperar os dados digitados sem espaços no começo
        $email = trim($_POST["email"]);
        $senha = trim($_POST["senha"]);
        //Verificar se algum campo está em branco
        if (empty($email)) {
            echo "<script>alert('Preencha o Login');history.back();</script>";
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
            $senha_bd = $linha["senha"];
            //Verificar se os dados estão corretos
	    if (empty($login_bd)) {
		unset($_SESSION['login']);	
		echo "<script>alert('Usuário Inválido');history.back();</script>";
	    } else if ($senha != $senha_bd) {
		unset($_SESSION['login']); 
                echo "<script>alert('Senha inválida');history.back();</script>";
            } else {
		$_SESSION['login'] = $login_bd;	
		header("Location: ../usuario.php");
 
            }
     
        }
    }else if($_POST['Clogin']){
	header("Location: ../criar.html"); 
    }else {
        echo "Requisicao invalida!";
        exit;
    }
?>

