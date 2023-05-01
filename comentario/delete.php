
<?php
include_once "../util/conexao.php";

    $id = $_GET["id"];

    $sqlUpdate = 'DELETE FROM categoria WHERE id = :id';

    try {
        $query = $conexao -> prepare($sqlUpdate);
        $query -> bindValue(':id', $id, PDO::PARAM_STR);
        $query -> execute();

        header("Location: ../categoria_lista.php");

    } catch (PDOException $error) {
        header("Location: ../alert2.php");
    }


?>