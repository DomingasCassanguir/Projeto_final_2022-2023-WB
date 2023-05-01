
<?php
include_once "../util/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$categoria = $_POST["categoria"];
$fornecedor = $_POST["fornecedor"] == 0 ? null: $_POST["fornecedor"];
$marca = $_POST["marca"];
$modelo = $_POST["modelo"];
$serie = $_POST["serie"];
$estado = $_POST["estado"];
$quantidade = $_POST["quantidade"];
$localizacao = $_POST["localizacao"];
$obs = $_POST["obs"];
$img = $_POST["img"];



if (isset($_POST["enviar-formulario"])) {
    $formatosPermitidos = array("png", "PNG", "jpeg", "JPEG", "jpg", "JPG", "gif", "GIF",);
    $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    
    if (in_array($extensao, $formatosPermitidos)) {
        $pasta = "../assets/images/bens/";
        $temporario = $_FILES['imagem']['tmp_name'];
        $novoNome = $nome.".$extensao";

        

        if (move_uploaded_file($temporario, $pasta.$novoNome)) {
            $fileAntigo = $pasta.$img;
            if (file_exists($fileAntigo)) {
                unlink($fileAntigo);
            }
        } else {
            /* $mensagem = "Erro ao fazer o upload"; */
        }
    } else {
        /* Formato inválido */
    }
    /* echo $mensagem; */
}
if ($novoNome == "") {
    $novoNome = $img;
    $pasta = "../assets/images/bens/";
}

$arquivo = $pasta.$novoNome;
if (file_exists($arquivo) && is_file($arquivo)) {
    $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
    $novoNome = $nome.".$extensao";
    rename($arquivo, $pasta.$novoNome);
}


$sqlInsert = 'UPDATE bens SET nome = :nome, categoria_id = :categoria, fornecedor_id = :fornecedor, marca = :marca, modelo = :modelo,
serie = :serie, estado_id = :estado, quantidade = :quantidade, localizacao = :localizacao, obs = :obs, imagem = :novoNome  WHERE id = :id';

try {
    $query = $conexao->prepare($sqlInsert);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(':nome', $nome, PDO::PARAM_STR);
    $query->bindValue(':categoria', $categoria, PDO::PARAM_STR);
    $query->bindValue(':fornecedor', $fornecedor, PDO::PARAM_STR);
    $query->bindValue(':marca', $marca, PDO::PARAM_STR);
    $query->bindValue(':modelo', $modelo, PDO::PARAM_STR);
    $query->bindValue(':serie', $serie, PDO::PARAM_STR);
    $query->bindValue(':estado', $estado, PDO::PARAM_STR);
    $query->bindValue(':quantidade', $quantidade, PDO::PARAM_STR);
    $query->bindValue(':localizacao', $localizacao, PDO::PARAM_STR);
    $query->bindValue(':obs', $obs, PDO::PARAM_STR);
    $query->bindValue(':novoNome', $novoNome, PDO::PARAM_STR);
    $query->execute();

    header("Location: ../bens_lista.php");

} catch (PDOException $error) {
    echo "$fornecedor <br> <br>";
    echo "Erro ao Actualizar! <br>" . $error->getMessage();
}

?>