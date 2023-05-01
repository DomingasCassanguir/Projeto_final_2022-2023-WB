

<?php
define('HOST', 'localhost');
define('DB', 'santomemoney');
define('USER', 'root');
define('PASS', '');

$stringConexao = 'mysql:host='. HOST .';dbname='.DB;
try {
   $conexao = new PDO($stringConexao, USER, PASS);
   $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
  echo "Erro ao conectar <br>". $error -> getMessage();
}   

?>