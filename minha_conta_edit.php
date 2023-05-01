<!-- READER (CABEÇALHO) -->
<?php include_once "partials/header.php" ?>


<?php
/* Carregar produtos */
include_once "anuncio/select.php";
include_once "util/Util.php";

if (isset($_GET["user_id"])) {
	$perfil = Util\Util::find("usuarios", $_GET["user_id"], $conexao);
} else {
	$perfil = Util\Util::find("usuarios", $user["id"], $conexao);
}
$result = anunciosPorUsuario($conexao, 1, $perfil["id"]);
?>


<!-- Header -->
<header class="header shop">

	<?php
	/* NAVBAR (MENU DE NAVEAÇÃO) */
	include_once "partials/navbar2.php";

	/* FILTRO */
	include_once "partials/filtro.php";

	/* MENU DO USUÁRIO */
	
	?>

</header>
<!--/ End Header -->


<!-- Slider Area -->
<section class="hero-slider">
	<!-- Single Slider -->
	<div class="single-slider">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-lg-9 offset-lg-3 col-12">
					<div class="text-inner">
						<div class="row">
							<div class="col-lg-9 col-12">
								<div class="hero-text">

									<!-- Start Checkout -->
									<section class="shop checkout section">
										<div class="container">
											<div class="row">
												<div class="px-5 sombra" style="margin-top: -30px;">
													<div class="checkout-form">
														<h2>Editar perfil</h2> <br>
														<!-- Form -->
														<form class="form" method="post" action="usuario/update.php" enctype="multipart/form-data">
															<div class=" row">


																<div class="col-12">
																	<div class="form-group">
																		<label>Nome<span>*</span></label>
																		<input type="text" name="nome" placeholder="" required="required" value="<?php echo $perfil["nome"] ?>">
																	</div>
																</div>

																<div class="col-lg-6 col-md-6 col-12">
																	<div class="form-group">
																		<label>Endereço<span>*</span></label>
																		<input type="text" name="endereco" placeholder="" required="required" value="<?php echo $perfil["endereco"] ?>">
																	</div>
																</div>
																<div class="col-lg-6 col-md-6 col-12">
																	<div class="form-group">
																		<label>Telefone<span>*</span></label>
																		<input type="text" name="telefone" placeholder="" required="required" value="<?php echo $perfil["telefone"] ?>">
																	</div>
																</div>

																<div class="col-12">
																	<div class="form-group">
																		<label>Carregar foto<span></span></label>
																		<input type="file" name="foto">
																	</div>
																</div>

																<input type="hidden" name="id" value="<?php echo $perfil["id"] ?>">
																<input type="hidden" name="email" value="<?php echo $perfil["email"] ?>">
																<input type="hidden" name="foto_actual" value="<?php echo $perfil["foto"] ?>">

																<div class="col-12">
																	<div class="form-group">
																		<button type="submit" class="btn-dark" name="enviar-formulario" 

																		style="color:white;padding: 10px;width: 100%;" >Editar</button>
																		
																	</div>
																</div>

															</div >
														</form>
														<!--/ End Form -->
													</div>
												</div>

											</div>
										</div>
									</section>
									<!--/ End Checkout -->

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--/ End Single Slider -->
</section>
<!--/ End Slider Area -->

<br>
<br>
<br>
<br>
<br>

<?php
/* FOOTER (RODAPÉ) */
include_once "partials/footer.php";
/* END (FIM) */
include_once "partials/end.php";
?>