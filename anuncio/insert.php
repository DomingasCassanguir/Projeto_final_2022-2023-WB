
<?php
include_once "../util/conexao.php";
date_default_timezone_set('Africa/Luanda');

$categoria_id = $_POST["categoria_id"];
$titulo = $_POST["titulo"];
$preco = $_POST["preco"];
$localizacao = $_POST["localizacao"];
$descricao = $_POST["descricao"];
$data_publicacao = date('Y/m/d');
$hora_publicacao = date('H:i:s');
//$data_aprovacao = $_POST["data_aprovacao"];
$periodo_id = $_POST["periodo_id"];
$status_id = 1;
$usuario_id = $_POST["usuario_id"];


if (isset($_POST["enviar-formulario"])) {
    $formatosPermitidos = array("pdf");
    $extensao = pathinfo($_FILES['comprovativo']['name'], PATHINFO_EXTENSION);

    if (in_array($extensao, $formatosPermitidos)) {
        $pasta = "../documentos/comprovativo/";
        $temporario = $_FILES['comprovativo']['tmp_name'];
        $comprovativo_do_Pagamento = "comprovativo_$titulo" . "_" . uniqid() . ".$extensao";

        if (move_uploaded_file($temporario, $pasta . $comprovativo_do_Pagamento)) {
            /* $mensagem = "Upload feito com exito"; */
        } else {
            /* $mensagem = "Erro ao fazer o upload"; */
        }
    } else {
        /* $mensagem = "Formato inválido"; */
    }
    /* echo $mensagem; */
}


$sqlInsert = 'INSERT INTO anuncios (categoria_id, titulo, preco, localizacao, descricao, data_publicacao, hora_publicacao, periodo_id, comprovativo, status_id, usuario_id) 
VALUES (:categoria_id, :titulo, :preco, :localizacao, :descricao, :data_publicacao, :hora_publicacao, :periodo_id, :comprovativo_do_Pagamento, 1, :usuario_id)';

try {
    $query = $conexao->prepare($sqlInsert);
    $query->bindValue(':categoria_id', $categoria_id, PDO::PARAM_STR);
    $query->bindValue(':titulo', $titulo, PDO::PARAM_STR);
    $query->bindValue(':preco', $preco, PDO::PARAM_STR);
    $query->bindValue(':localizacao', $localizacao, PDO::PARAM_STR);
    $query->bindValue(':descricao', $descricao, PDO::PARAM_STR);
    $query->bindValue(':data_publicacao', $data_publicacao, PDO::PARAM_STR);
    $query->bindValue(':hora_publicacao', $hora_publicacao, PDO::PARAM_STR);
    $query->bindValue(':periodo_id', $periodo_id, PDO::PARAM_STR);
    $query->bindValue(':comprovativo_do_Pagamento', $comprovativo_do_Pagamento, PDO::PARAM_STR);
    $query->bindValue(':usuario_id', $usuario_id, PDO::PARAM_STR);
    $query->execute();

    carregarFoto($conexao, $usuario_id);

    $msg = "Anúncio criado com sucesso!";
    header("Location: ../index2.php?msg=$msg");
} catch (PDOException $error) {
    echo "Erro ao cadastrar! <br>" . $error->getMessage();
}





function carregarFoto($conexao, $user_id)
{
    $qry = $conexao->prepare("SELECT * FROM anuncios WHERE usuario_id = $user_id ORDER BY id DESC LIMIT 1");
    $qry->execute();
    $res = $qry->fetch(PDO::FETCH_ASSOC);
    $anuncio_id = $res["id"];


    if (isset($_POST["enviar-formulario"])) {
        $formatosPermitidos = array("jpg", "JPG", "jpeg", "JPEG", "gif", "GIF", "png", "PNG",);
        $quantidadeArquivos = count($_FILES['fotos']['name']);
        $contador = 0;

        while ($contador < $quantidadeArquivos) {
            $extensao = pathinfo($_FILES['fotos']['name'][$contador], PATHINFO_EXTENSION);

            if (in_array($extensao, $formatosPermitidos)) {
                $pasta = "../images/anuncios/";
                $temporario = $_FILES['fotos']['tmp_name'][$contador];
                $foto = "IMG_$anuncio_id" . "_" . uniqid() . ".$extensao";

                if (move_uploaded_file($temporario, $pasta . $foto)) {
                    /* $mensagem = "Upload feito com exito"; */
                } else {
                    /* $mensagem = "Erro ao fazer o upload"; */
                }
            } else {
                /* $mensagem = "Formato inválido"; */
            }
            /* echo $mensagem; */


            $sqlInsert = 'INSERT INTO fotos (anuncio_id, foto) VALUES (:anuncio_id, :foto)';

            try {
                $query = $conexao->prepare($sqlInsert);
                $query->bindValue(':anuncio_id', $anuncio_id, PDO::PARAM_STR);
                $query->bindValue(':foto', $foto, PDO::PARAM_STR);
                $query->execute();
            } catch (PDOException $error) {
                echo "Erro ao cadastrar! <br>" . $error->getMessage();
            }

            $contador++;
        }
    }
}

?>