
<?php
include_once "../util/conexao.php";

    $id = $_GET["id"];
    $imagem = $_GET["imagem"];

    $sqlUpdate = 'DELETE FROM bens WHERE id = :id';
    
    
    try {
        $query = $conexao -> prepare($sqlUpdate);
        $query -> bindValue(':id', $id, PDO::PARAM_STR);
        $query -> execute();
        
        unlink("../assets/images/bens/$imagem");
        
        header("Location: ../bens_lista.php");

    } catch (PDOException $error) {
        echo "Erro ao eliminar! <br>". $error -> getMessage();
    }


?>