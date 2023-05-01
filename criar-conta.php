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

			<div class="col-lg-6 col-12 mx-auto px-4">
				<div class="checkout-form">

					<?php if (isset($_GET["msg_registro"])) { ?>
						<p class="alert-success p-2" style="color: #087420;">
							<?php echo $_GET["msg_registro"]; ?>. 
							Faça agora <a href="login.php"><strong style="color: #08bb20; text-decoration: underline;">LOGIN</strong></a> para anunciar
						</p>
					<?php } else { ?>
						<br>
					<br>
					<br>
						<h2>Não tem uma conta?</h2>
						<p>Cria uma agora mesmo e comece a anunciar</p>
					<?php } ?>

					<!-- Form -->
					<form class="form" id="form-criar-conta" action="usuario/insert.php" method="POST" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Nome<span>*</span></label>
									<input type="text" name="nome" placeholder="" required="required">
								</div>
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Endereço<span>*</span></label>
									<input type="text" name="endereco" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Telefone<span>*</span></label>
									<input type="text" name="telefone" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Email<span>*</span></label>
									<input type="email" name="email" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Senha<span>*</span></label>
									<input type="password" name="senha" id="senha" placeholder="" required="required" minlength="8" maxlength="8">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Confirmar senha<span id="msgbox">*</span></label>
									<input type="password" name="senha_confirmar" id="senha_confirmar" required="required" minlength="8" maxlength="8">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<button type="submit" class="btn" name="enviar-formulario" style="width: 100%;">Criar conta</button>
								</div>
							</div>
						</div>
					</form>
		
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<br>
					<!--/ End Form -->
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