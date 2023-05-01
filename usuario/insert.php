
<?php
include_once "../util/conexao.php";

$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$foto =$email.".jpg";


$sqlInsert = 'INSERT INTO usuarios (nome, endereco, telefone, email, senha, foto) 
VALUES (:nome, :endereco, :telefone, :email, :senha, :foto)';

try {
    $query = $conexao->prepare($sqlInsert);
    $query->bindValue(':nome', $nome, PDO::PARAM_STR);
    $query->bindValue(':endereco', $endereco, PDO::PARAM_STR);
    $query->bindValue(':telefone', $telefone, PDO::PARAM_STR);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->bindValue(':senha', $senha, PDO::PARAM_STR);
    $query->bindValue(':foto', $foto, PDO::PARAM_STR);
    $query->execute();

    copy("../images/usuario.jpg", "../images/usuarios/$foto");

    $msg_registro = "Conta criada com sucesso";
    
    header("Location: ../criar-conta.php?msg_registro=$msg_registro");

} catch (PDOException $error) {
    echo "Erro ao cadastrar! <br>" . $error->getMessage();
}

?>