
<?php
include_once "../util/conexao.php";

$id = $_POST["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];
$foto_actual = $_POST["foto_actual"];

if (isset($_POST["enviar-formulario"])) {
    $formatosPermitidos = array("jpg", "JPG", "jpeg", "JPEG", "png", "PNG", "gif", "GIF");
    $extensao = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
    
    if (in_array($extensao, $formatosPermitidos)) {
        $pasta = "../images/usuarios/";
        $temporario = $_FILES['foto']['tmp_name'];
        $foto_nova = $email.".$extensao";

        if (move_uploaded_file($temporario, $pasta.$foto_nova)) {
            /* $mensagem = "Upload feito com exito"; */
            if ($foto_actual != $foto_nova) {
                unlink($pasta.$foto_actual);
            }

            try {
                $query = $conexao->prepare('UPDATE usuarios SET foto = :foto_nova WHERE id = :id');
                $query->bindValue(':id', $id, PDO::PARAM_STR);
                $query->bindValue(':foto_nova', $foto_nova, PDO::PARAM_STR);
                $query->execute();            
            } catch (PDOException $error) {
                echo "Erro ao Actualizar a Foto! <br>" . $error->getMessage();
            }

        } else {
            /* $mensagem = "Erro ao fazer o upload"; */
        }
    } else {
        /* $mensagem = "Formato inválido"; */
    }
    /* echo $mensagem; */
}


$sqlInsert = 'UPDATE usuarios SET nome = :nome, endereco = :endereco, telefone = :telefone WHERE id = :id';

try {
    $query = $conexao->prepare($sqlInsert);
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->bindValue(':nome', $nome, PDO::PARAM_STR);
    $query->bindValue(':endereco', $endereco, PDO::PARAM_STR);
    $query->bindValue(':telefone', $telefone, PDO::PARAM_STR);
    $query->execute();

    header("Location: ../minha_conta.php");

} catch (PDOException $error) {
    echo "$fornecedor <br> <br>";
    echo "Erro ao Actualizar! <br>" . $error->getMessage();
}

?>