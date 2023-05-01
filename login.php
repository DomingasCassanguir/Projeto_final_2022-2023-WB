<!-- READER (CABEÇALHO) -->
<?php include_once "partials/header.php" ?>


<!-- Header -->
<header class="header shop">

	<?php
	/* NAVBAR (MENU DE NAVEAÇÃO) */
	include_once "partials/navbar.php";
	?>


</header>
<!--/ End Header -->


<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">
		<div class="row">

			<div class="col-lg-4 col-md-6 col- mx-auto mb-5">
				<div class="order-details bg-color">
					<!-- Order Widget -->
					<div class="single-widget text-center">
						<h1><strong>Login</strong></h1>
						<p>Faça login para anunciar</p>
					</div>

					<div class="single-widget get-button">
						<?php if (isset($_GET["msg"])) { ?>
							<p class="alert-danger p-2"> <?php echo $_GET["msg"]; ?> </p> <br>
						<?php } ?>
						<!-- Form -->
						<form class="form " method="POST" action="autenticacao/logar.php">
							<div class="row">

								<div class="col-12">
									<div class="form-group">
										<!-- <label>Email<span>*</span></label> -->
										<input type="email" name="email" placeholder="Email" required="required"
										value="<?php if (isset($_GET["email"])) { echo $_GET["email"]; } ?>">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<!-- <label>Senha<span>*</span></label> -->
										<input type="password" name="senha" placeholder="Senha" required="required">
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<button type="submit" class="btn" style="width: 100%;">Entrar</button>
									</div>
								</div>

								<div class="col-12">
									<div class="form-group">
										<a href="criar-conta.php"><strong style="color: #F7941D;">Criar conta</strong></a>
									</div>
								</div>

							</div>
						</form>
						<!--/ End Form -->
					</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Checkout -->

<!-- FOOTER (RODAPÉ) -->
<?php include_once "partials/footer.php"; ?>

<script>
	var form = document.getElementById("form-criar-conta");
	//var form = document.querySelector("form");
	form.addEventListener("submit", function(evento) {
		if (document.getElementById('senha').value != document.getElementById('senha_confirmar').value) {
			evento.preventDefault()
			alert('As senhas são diferentes, reintroduca nas duas caixas');
			document.getElementById('senha_confirmar').focus();
			return false;
		}

		return true;
	})
</script>

<!-- END (FIM) -->
<?php include_once "partials/end.php"; ?>