 <?php
include_once "../util/conexao.php";

if (!isset($_SESSION)) {
    session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
    $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

$emailForm = $_POST["email"];
$senhaForm = $_POST["senha"];

$sqlSelect = 'SELECT * FROM usuarios WHERE email = :emailForm LIMIT 1';

try {
    $query = $conexao->prepare($sqlSelect);
    $query->bindValue(':emailForm', $emailForm, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erro ao consultar <br>" . $error->getMessage();
}

if (!empty($result)) {
    $res = $result[0];
    $email = $res['email'];
    $senha = $res['senha'];

    if ($senhaForm == $senha) {
        
        if (PHP_VERSION >= 5.1) {
            session_regenerate_id(true);
        } else {
            session_regenerate_id();
        }

        $_SESSION['MM_Username'] = $email;

        if (isset($_SESSION['PrevUrl']) && false) {
            $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
        }
        header("Location: ../index2.php");
        
    } else {
        $msg = "Senha incorrecta";
        header("Location: ../login.php?msg=$msg&email=$emailForm");
    }
} else {
    $msg = "Usuario não encontrado";
    header("Location: ../login.php?msg=$msg");
}

?>