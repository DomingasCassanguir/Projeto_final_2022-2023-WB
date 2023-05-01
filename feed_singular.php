<!-- Start Blog Single -->
<section class="blog-single section">
    <div class="container">
        <div class="row">

            <?php foreach ($result as $item) { ?>
                <div class="col-lg-8 col-12 mx-auto sombra-feed mt-5">
                    <div class="blog-single-main">
                        <div class="row">

                            <div class="col-12">

                                <div class="product-gallery">
                                    <?php
                                    $resultFotos = selecionarFotos($conexao, $item["id"]);
                                    $foto = isset($resultFotos[0]) ? $resultFotos[0] : null;
                                    $autor =  Util\Util::find("usuarios", $item["usuario_id"], $conexao);
                                    ?>

                                    <div class="blog-meta">
                                        <div class="blog-detail  mb-2">
                                            <h2 class="blog-title nome-user" style="margin-top: 8px;">
                                                <img class="foto-perfil" src="images/usuarios/<?php echo $autor["foto"]; ?>" alt="#">
                                                <a href="minha_conta.php?user_id=<?php echo $item["usuario_id"] ?>">
                                                    <?php echo $autor["nome"] ?>
                                                </a>
                                                <div class="" style="margin: -25px 0 0 90px;">
                                                    <span class="author">
                                                        <a><i class="fa fa-calendar"></i>
                                                            <?php
                                                            $data = strtotime($item["data_publicacao"] . " " . $item["hora_publicacao"]);

                                                            echo date('d/m/Y - H:i', $data);
                                                            ?>
                                                        </a>
                                                        <a><i class="ti-location-pin"></i><?php echo $item["localizacao"] ?></a>
                                                        <a href="https://wa.me/244<?php echo $autor["telefone"] ?>?text=Olá"><i class="fa fa-phone"></i>+244 <?php echo $autor["telefone"] ?></a>
                                                    </span>
                                                </div>
                                        </div>
                                        </h2>
                                    </div>



                                    <!-- CARROSSEL DE FOTOS -->
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        
                                        <div class="carousel-inner">
    
                                        <?php foreach ($resultFotos as $fotos) { ?>

    
                                            <div class="carousel-item">
                                            <img src="images/anuncios/<?php echo $fotos["foto"]; ?>"   width="800" height="500">
                                            </div>
                                                           
                                            <?php } ?>

                                            <div class="carousel-item active">
                                            <img src="images/compra.jpg"  width="800"  height="500">
                                            </div>

    
                                            
                                        </div>
    
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Próximo</span>
                                        </a>
                                        </div>
                                    <!-- FIM CARROSSEL DE FOTOS -->
                                </div>


                                <div class="blog-detail">
                                    <div class="blog-meta">
                                        <div class="row">
                                            <div class="col-8">
                                                <h2 class="blog-title" style="margin-top: 8px;"><?php echo $item["titulo"]; ?></h2>
                                            </div>
                                            <div class="col-4 mr-auto text-right">
                                                <h2 class="blog-preco"> Preco: <?php echo $item["preco"] . " kz"; ?></h2>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- DESCRIÇÃO DO PRODUTO -->
                                    <div class="content">
                                        <p><?php echo $item["descricao"]; ?></p>
                                    </div>
                                    <!-- FIM DESCRIÇÃO DO PRODUTO -->
                                </div>

                            </div>

                            <div class="col-12">
                                <div class="comments" id="anuncio<?php echo $item["id"]; ?>">
                                    <h3 class="comment-title">Comentários</h3>

                                    <!-- Comment Form -->
                                    <form class="form" id="comentar-form" action="comentario/insert.php" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea name="comentario" id="comentario" placeholder="Escreva um comentário"></textarea>
                                                    <input type="hidden" name="anuncio_id" value="<?php echo $item["id"]; ?>">
                                                    <input type="hidden" name="usuario_id" value="<?php echo $user["id"]; ?>">
                                                    <button type="submit" class="btn">Comentar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- End Comment Form -->


                                    <?php
                                    $cometarios = listarComentarios($conexao, $item["id"]);

                                    foreach ($cometarios as $coment) {
                                        $autorComent =  Util\Util::find("usuarios", $coment["usuario_id"], $conexao);
                                    ?>
                                        <!-- Single Comment -->
                                        <div class="single-comment">
                                            <img src="images/usuarios/<?php echo $autorComent["foto"]; ?>" alt="#">
                                            <div class="content">
                                                <h4 style="font-weight: 550;">
                                                    <a href="minha_conta.php?user_id=<?php echo $coment["usuario_id"] ?>">
                                                        <?php echo $autorComent["nome"] ?>
                                                    </a>

                                                    <span>As <?php $data = strtotime($coment["data"] . " " . $coment["hora"]);
                                                                echo date('H:i, d/m/Y', $data);
                                                                ?></span>
                                                </h4>
                                                <p><?php echo $coment["comentario"]; ?></p>
                                                <div class="button">
                                                    <!-- <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Responder</a> -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Single Comment -->
                                    <?php } ?>

                                    <!-- Single Comment -->
                                    <!-- <div class="single-comment left">
            <img src="https://via.placeholder.com/80x80" alt="#">
            <div class="content">
                <h4>john deo <span>Feb 28, 2018 at 8:59 pm</span></h4>
                <p>Enthusiastically leverage existing premium quality vectors with enterprise-wide innovation collaboration Phosfluorescently leverage others enterprisee Phosfluorescently leverage.</p>
                <div class="button">
                    <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                </div>
            </div>
        </div> -->
                                    <!-- End Single Comment -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!--/ End Blog Single -->