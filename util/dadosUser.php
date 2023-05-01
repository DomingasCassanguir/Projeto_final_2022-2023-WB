<?php

if (!isset($_SESSION)) {
    session_start();
}

$email = isset($_SESSION['MM_Username']) ? $_SESSION['MM_Username'] : "";

$sqlSelect = 'SELECT * FROM usuarios WHERE email = :email LIMIT 1';

try {
    $query = $conexao->prepare($sqlSelect);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erro ao consultar <br>" . $error->getMessage();
}

if (!empty($result)) {
    $user = $result[0];
}

?>