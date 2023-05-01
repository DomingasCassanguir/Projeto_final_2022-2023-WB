<!-- READER (CABEÇALHO) -->
<?php include_once "partials/header.php" ?>


<!-- Header -->
<header class="header shop">

	<?php
	/* NAVBAR (MENU DE NAVEAÇÃO) */
	include_once "partials/navbar.php";

	/* FILTRO */
	include_once "partials/filtro.php";

	/* MENU DO USUÁRIO */

	?>
 <!-- menu de categorias-->
 <?php include_once "partials/menu.php"?> 
	<!--BOAS VINDAS -->
	<?php include_once "partials/Alteracao_1.php" ?>
	

</header>
<!--/ End Header -->



<?php
/* Carregar produtos */
include_once "anuncio/select.php";

/* Feed de anúncios */
include_once "feed.php";
?>