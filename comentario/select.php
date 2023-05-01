 <?php
 try {
    /* Pegar a quantidade total de objecto no banco */
    $qry = $conexao->prepare('SELECT * FROM comentarios');
    $qry->execute();
    $res = $qry->fetchAll(PDO::FETCH_ASSOC);
    $num_total = count($res);

    /* Definir número intens por página*/
    $intens_por_pagina = 10;
                                    
    /* Pegar a página actual */
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;

    /* Definir número de páginas */
    $num_paginas = ceil($num_total / $intens_por_pagina); 

    $init = $pagina * $intens_por_pagina;
    $sqlSelect = "SELECT * FROM comentarios ORDER BY id LIMIT $init, $intens_por_pagina";


    $query = $conexao->prepare($sqlSelect);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erro ao consultar <br>" . $error->getMessage();
}

?>