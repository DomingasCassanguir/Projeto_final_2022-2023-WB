
<?php
include_once "../util/conexao.php";

date_default_timezone_set('Africa/Luanda');

$anuncio_id = $_POST["anuncio_id"];
$usuario_id = $_POST["usuario_id"];
$comentario = $_POST["comentario"];
$data = date('Y/m/d');
$hora = date('H:i:s');

$sqlInsert = 'INSERT INTO comentarios (anuncio_id, usuario_id, comentario, data, hora) 
VALUES (:anuncio_id, :usuario_id, :comentario, :data, :hora)';

try {
    $query = $conexao->prepare($sqlInsert);
    $query->bindValue(':anuncio_id', $anuncio_id, PDO::PARAM_STR);
    $query->bindValue(':usuario_id', $usuario_id, PDO::PARAM_STR);
    $query->bindValue(':comentario', $comentario, PDO::PARAM_STR);
    $query->bindValue(':data', $data, PDO::PARAM_STR);
    $query->bindValue(':hora', $hora, PDO::PARAM_STR);
    $query->execute();

    header("Location: ../index.php#anuncio$anuncio_id");
    
} catch (PDOException $error) {
    header("Location: ../login.php");
    //echo "Erro ao cadastrar! <br>" . $error->getMessage();
}
?>