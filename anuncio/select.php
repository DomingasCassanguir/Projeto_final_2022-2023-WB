 <?php
    // LISTAR ANÚNCIOS POR CATEGORIA
    function anuncios($conexao)
    {
        /* Pegar a quantidade total de objecto no banco */
        $qry = $conexao->prepare('SELECT * FROM anuncios');
        $qry->execute();
        $res = $qry->fetchAll(PDO::FETCH_ASSOC);
        $num_total = count($res);

        /* Definir número intens por gágina*/
        $intens_por_pagina = 100;

        /* Pegar a página actual */
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;

        /* Definir número de páginas */
        $num_paginas = ceil($num_total / $intens_por_pagina);

        $init = $pagina * $intens_por_pagina;
        $sqlSelect = "SELECT * FROM anuncios ORDER BY data_publicacao desc, hora_publicacao desc LIMIT $init, $intens_por_pagina";


        $query = $conexao->prepare($sqlSelect);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }

    // PESQUISAR PRODUTO
    function procurar($conexao, $paramentro)
    {
        /* Pegar a quantidade total de objecto no banco */
        $qry = $conexao->prepare('SELECT * FROM anuncios');
        $qry->execute();
        $res = $qry->fetchAll(PDO::FETCH_ASSOC);
        $num_total = count($res);

        /* Definir número intens por gágina*/
        $intens_por_pagina = 100;

        /* Pegar a página actual */
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;

        /* Definir número de páginas */
        $num_paginas = ceil($num_total / $intens_por_pagina);

        $init = $pagina * $intens_por_pagina;
        $sqlSelect = "SELECT * FROM anuncios WHERE titulo like '%$paramentro%' OR localizacao like '%$paramentro%' OR descricao like '%$paramentro%' OR preco like '$paramentro' ORDER BY data_publicacao desc, hora_publicacao desc LIMIT $init, $intens_por_pagina";


        $query = $conexao->prepare($sqlSelect);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }

    // LISTAR ANÚNCIOS POR CATEGORIA
    function anunciosPorCategoria($conexao, $categoria_id)
    {
        /* Pegar a quantidade total de objecto no banco */
        $qry = $conexao->prepare('SELECT * FROM anuncios WHERE categoria_id = ' . $categoria_id);
        $qry->execute();
        $res = $qry->fetchAll(PDO::FETCH_ASSOC);
        $num_total = count($res);

        /* Definir número intens por gágina*/
        $intens_por_pagina = 100;

        /* Pegar a página actual */
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;

        /* Definir número de páginas */
        $num_paginas = ceil($num_total / $intens_por_pagina);

        $init = $pagina * $intens_por_pagina;
        $sqlSelect = "SELECT * FROM anuncios WHERE categoria_id = $categoria_id ORDER BY data_publicacao desc, hora_publicacao desc LIMIT $init, $intens_por_pagina";


        $query = $conexao->prepare($sqlSelect);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }

    /* ÚLTIMAS 20H */
    function ultimas20h($conexao)
    {
        /* Pegar a quantidade total de objecto no banco */
        $qry = $conexao->prepare('SELECT * FROM anuncios');
        $qry->execute();
        $res = $qry->fetchAll(PDO::FETCH_ASSOC);
        $num_total = count($res);

        /* Definir número intens por gágina*/
        $intens_por_pagina = 100;

        /* Pegar a página actual */
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;

        /* Definir número de páginas */
        $num_paginas = ceil($num_total / $intens_por_pagina);

        $hoje = date('Y/m/d');
        $init = $pagina * $intens_por_pagina;
        $sqlSelect = "SELECT * FROM anuncios WHERE data_publicacao >= '$hoje' ORDER BY data_publicacao desc, hora_publicacao desc LIMIT $init, $intens_por_pagina";


        $query = $conexao->prepare($sqlSelect);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }


    // LISTAR FOTOS DO UM DADO ANÚNCIO
    function selecionarFotos($conexao, $anuncio_id)
    {
        $sqlSelect = "SELECT * FROM fotos WHERE anuncio_id = $anuncio_id ORDER BY id";
        $query = $conexao->prepare($sqlSelect);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return  $result;
    }

    /* LISTAR COMENTÁRIOS */
    function listarComentarios($conexao, $anuncio_id)
    {
        /* Pegar a quantidade total de objecto no banco */
        $qry = $conexao->prepare("SELECT * FROM comentarios WHERE anuncio_id = $anuncio_id ORDER BY data");
        $qry->execute();
        $res = $qry->fetchAll(PDO::FETCH_ASSOC);
        $num_total = count($res);

        /* Definir número intens por gágina*/
        $intens_por_pagina = 100;

        /* Pegar a página actual */
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 0;

        /* Definir número de páginas */
        $num_paginas = ceil($num_total / $intens_por_pagina);

        $init = $pagina * $intens_por_pagina;
        $sqlSelect = "SELECT * FROM comentarios WHERE anuncio_id = $anuncio_id ORDER BY data LIMIT $init, $intens_por_pagina";


        $query = $conexao->prepare($sqlSelect);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }



    /* ANÚNCIS INDIVIDUAIS */


    // LISTAR ANÚNCIOS DE UM USUÁRIO
    function anunciosPorUsuario($conexao, $status_id,  $user)
    {
        /* Pegar a quantidade total de objecto no banco */
        $qry = $conexao->prepare('SELECT * FROM anuncios WHERE status_id = ' . $status_id . ' AND usuario_id = ' . $user);
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
        $sqlSelect = "SELECT * FROM anuncios WHERE status_id = $status_id AND usuario_id = $user ORDER BY titulo LIMIT $init, $intens_por_pagina";


        $query = $conexao->prepare($sqlSelect);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);

        return  $result;
    }

    ?>