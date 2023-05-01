
<?php
include_once "../util/conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

date_default_timezone_set('Africa/Luanda');
$anuncio_id = $dados["anuncio_id"];
$usuario_id = $dados["usuario_id"];
$comentario = $dados["comentario"];
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

    $sqlSelect = 'SELECT * FROM comentarios WHERE usuario_id = :usuario_id ORDER BY id desc LIMIT 1';
    //$sqlSelect = "SELECT u.nome, c.anuncio_id, c.usuario_id, c.comentario, data, hora FROM comentarios c JOIN usuarios u on u.id = usuario_id WHERE usuario_id = :usuario_id ORDER BY u.id desc LIMIT 1";

    $query = $conexao->prepare($sqlSelect);
    $query->bindValue(':usuario_id', $usuario_id, PDO::PARAM_STR);
    $query->execute();
    $retorna = $query->fetch(PDO::FETCH_ASSOC);
    
} catch (PDOException $error) {
    echo "Erro ao cadastrar! <br>" . $error->getMessage();
}

echo json_encode($retorna);

?>