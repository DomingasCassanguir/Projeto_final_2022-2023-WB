
<?php
include_once "../util/conexao.php";

$categoria = $_POST["categoria"];

$sqlInsert = 'INSERT INTO categorias (categoria) VALUES (:categoria)';

try {
    $query = $conexao->prepare($sqlInsert);
    $query->bindValue(':categoria', $categoria, PDO::PARAM_STR);
    $query->execute();

    header("Location: ../categoria_cadastro.php");

} catch (PDOException $error) {
    echo "Erro ao cadastrar! <br>" . $error->getMessage();
}

?>