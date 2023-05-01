
<?php
include_once "../util/conexao.php";

    $id = $_POST["id"];
    $categoria = $_POST["categoria"];

    $sqlUpdate = 'UPDATE categoria SET categoria = :categoria WHERE id = :id';

    try {
        $query = $conexao -> prepare($sqlUpdate);
        $query -> bindValue(':id', $id, PDO::PARAM_STR);
        $query->bindValue(':categoria', $categoria, PDO::PARAM_STR);
        $query -> execute();

        header("Location: ../categoria_lista.php");

    } catch (PDOException $error) {
        echo "Erro ao actualizar! <br>". $error -> getMessage();
    }

?>