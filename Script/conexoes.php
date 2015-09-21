<!--Script para conectar ao Banco de Dados -->
<?php
$servidor = "localhost";
$port = 5432;
$user = "postgres";
$password = "postgres";
$db = "palomabd";

$dbconn = pg_connect("host=$servidor port=$port dbname=$db user=$user password=$password") or die('connection failed');
?>

