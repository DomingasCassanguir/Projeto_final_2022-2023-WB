<!-- READER (CABEÇALHO) -->
<?php include_once "partials/header.php" ?>


<!-- Header -->
<header class="header shop">

	<?php
	/* NAVBAR (MENU DE NAVEAÇÃO) */
	include_once "partials/navbar2.php";
	?>


</header>
<!--/ End Header -->


<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-12 mx-auto mt-5 px-5 sombra">
				<div class="checkout-form">
					<h2>Novo Anúncio</h2>
					<p>Preencha o formulário para anunciar</p>
					<!-- Form -->
					<form class="form" method="post" action="anuncio/insert.php" enctype="multipart/form-data">
						<div class=" row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Categoria<span>*</span></label>
									<select name="categoria_id">
										<?php foreach ($result as $item) { ?>
											<option value="<?php echo $item["id"]; ?>"><?php echo $item["categoria"]; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>titulo<span>*</span></label>
									<input type="text" name="titulo" placeholder="O que está anunciar?" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Preço<span>*</span></label>
									<input type="number" name="preco" placeholder="" required="required">
								</div>
							</div>

							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Localização<span>*</span></label>
									<input type="text" name="localizacao" placeholder="" required="required">
								</div>
							</div>


							<div class="col-12">
								<div class="form-group message">
									<label>Descrição<span>*</span></label>
									<textarea name="descricao" rows="4" placeholder=""></textarea>
								</div>
							</div>



							<div class="col-12">
								<div class="form-group">
									<label>Adicionar foto<span>*</span></label>
									<input type="file" name="fotos[]" multiple placeholder="">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>Adicionar foto<span>*</span></label>
									<input type="file" name="fotos[]" multiple placeholder="">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>Adicionar foto<span>*</span></label>
									<input type="file" name="fotos[]" multiple placeholder="">
								</div>
							</div>
							

							<input type="hidden" name="usuario_id" value="<?php echo $user["id"] ?>">

							<div class="col-12">
								<div class="form-group button">
									<button type="submit" class="btn " name="enviar-formulario">Criar anúncio</button>
								</div>
							</div>

						</div>
					</form>
					<!--/ End Form -->
				</div>
			</div>

		</div>
	</div>
</section>
<!--/ End Checkout -->

<?php
/* FOOTER (RODAPÉ) */
include_once "partials/footer.php";
/* END (FIM) */
include_once "partials/end.php";
?>