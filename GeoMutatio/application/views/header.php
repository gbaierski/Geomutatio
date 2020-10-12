	<!DOCTYPE html>
	<html lang="zxx" class="no-js">

	<head>

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="utf-8">
		<link rel="shortcut icon" href="<?= base_url();?>/assets/imagens/icons/icon.ico"/>
   
		<title>GeoMutatio</title>

		<!-- JQUERY e JS -->
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script type='text/javascript' src="<?= base_url();?>assets/js/modal.js"></script>	

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 




			<!--CSS ============================================= -->
			
			<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/linearicons.css"/>
			<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/font-awesome.min.css"/>
			<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/owl.carousel.css"/>
			<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/bootstrap.css"/>
			<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/main.css"/>
			<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/style.css"/>
			
			<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>

			
			<!-- Make sure you put this AFTER Leaflet's CSS -->
 			<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>

	</head>

		<body>

			<!-- MENU -->
			<header class="default-header" style="position: fixed;">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						  <a class="navbar-brand" href="<?= base_url();?>">
						  	GeoMutatio
						  </a>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>


						  <!-- ITENS DO MENU -->

						  <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
						    <ul class="navbar-nav">
								<li><a class="link_menu" href="<?= base_url();?>">Home</a></li>
								<li><a class="link_menu" href="<?php echo site_url('Redirect/ocorrencias')?>">Ocorrências</a></li>
								<li><a class="link_menu" href="<?php echo site_url('Redirect/noticias')?>">Notícias</a></li>
								<li><a class="link_menu" href="<?php echo site_url('Redirect/familias')?>">Famílias</a></li>
								<li><a class="link_menu" href="<?php echo site_url('Redirect/sobre')?>">Sobre</a></li>



<?php



//TIRA OS ERROS DO CÓDIGO PRA BANCA

error_reporting(0);
ini_set('display_errors', 0);

if ($this->session->userdata('usuario')) {

	$current_url = current_url();
	if ($current_url == 'http://localhost/GeoMutatio/GeoMutatio/index.php/Redirect/ocorrencias' or $current_url == 'http://localhost/GeoMutatio/GeoMutatio/index.php/Redirect/minhasocorrencias'){
	}else{

	$usuario = $this->session->userdata('usuario');
	
?>
								<!-- Dropdown -->
							    <li class="dropdown">
							      <a class="dropdown-toggle link_menu" href="#" id="navbardrop" data-toggle="dropdown">
										<?php	$usuario = $this->session->userdata('usuario');
													echo $usuario['nome'];
										?>	
							      </a>
							      <div class="dropdown-menu">
							        <a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/profile')?>">Minha conta</a>


	<?php 

	//testa para ver se é o administrador
	if ($usuario['tipuser'] == 1) { 

	?>


							        <a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/tabela_usuarios')?>">Usuarios</a>
							        <a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/tabela_familias')?>">Famílias</a>
							        <a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/tabela_noticias')?>">Notícias</a>
									<a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/tabela_ocorrencias')?>">Ocorrências</a>
									<a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/minhasfamilias')?>">Minhas famílias</a>
							        <a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/minhasnoticias')?>">Minhas notícias</a>
									<a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/minhasocorrencias')?>">Minhas ocorrências</a>
									

	<?php

	//testa para ver se é o autor
	 }elseif ($usuario['tipuser'] == 2) { 

	 ?>
							        <a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/minhasnoticias')?>">Minhas notícias</a>
									<a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/minhasocorrencias')?>">Minhas ocorrências</a>
									<a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/minhasfamilias')?>">Minhas famílias</a>
							        
	<?php

	//se não for nem administrador, nem autor, define como usuario comum 
	 }else{ 

	 ?>

							        <a class="dropdown-item link_menu" href="<?php echo site_url('Redirect/minhasocorrencias')?>">Minhas ocorrências</a>
	<?php } ?>



							        <a class="dropdown-item link_menu" href="<?php echo base_url();?>index.php/Usuario/logout" id="logout">Logout</a>
							        	
							        </form>
							      </div>
							    </li>




<?php


}
	}else{


				$current_url = current_url();

				if ($current_url == 'http://localhost/GeoMutatio/GeoMutatio/index.php/Redirect/ocorrencias'){
					
				}else{
?>


					


								<!-- Aciona/Abre o modal -->
								<li><a class="link_menu" href="<?php echo site_url('Redirect/cadastro')?>" style="font-weight: 500;">Cadastre-se aqui</a></li>
								<button id="botao-login">Faça o Login</button>
								

								<!-- Modal de login -->
								<div id="modal-login" class="modal">

								  <!--Conteúdo do modal login -->
								  <div class="modal-conteudo">

								    <div class="modal-form">
										<p class="titulo-modal">Faça o Login</p>

											<form method="POST" action="<?php echo base_url();?>index.php/Usuario/login">
												
												<input type="text" class="login-form" placeholder="E-mail" name="email">
												<br/>
												
												<input type="password" class="login-form" placeholder="senha" name="senha">
												<br/>
												
												<input type="submit" class="login-submit" name="enviar">
												<br />

												<a href="<?php echo site_url('Redirect/cadastro')?>" class="cadastrar-modal">Ainda não possui uma conta? Cadastre-se</a>

												<div class="clear"></div>

												<a href="" class="cadastrar-modal" style="margin-top:2vw;">Esqueceu sua senha?</a>


											</form>
											
											<span class="fechar"></span>
								    </div>


								  </div>

								</div>
<?php }} ?>

								<script type="text/javascript">
									// seleciona o modal
								var modal = document.getElementById("modal-login");

								// seleciona o botão que abre o modal
								var btn = document.getElementById("botao-login");

								// seleciona o elemento <span> que fecha o modal
								var span = document.getElementsByClassName("fechar")[0];

								// quando o usuário clicar no botão, abre o modal 
								btn.onclick = function() {
								  modal.style.display = "block";
								}

								// quando o usuário clicar em <span> (x), fecha o modal
								// não utilizada por enquanto
								span.onclick = function() {
								  modal.style.display = "none";
								}

								// quando o usuário clicar em qualquer lugar fora da tela, fecha-o
								window.onclick = function(event) {
								  if (event.target == modal) {
									modal.style.display = "none";
								  }
								}

								</script>

				

						    </ul>
						  </div>						
					</div>
				</nav>
			</header>
			<div class="container">
  <?php if($this->session->flashdata("success")): ?>
  <p class="alert alert-success" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("success");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>

  <?php if($this->session->flashdata("danger")): ?>
  <p class="alert alert-danger" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("danger");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>

  <?php if($this->session->flashdata("logout")): ?>
  <p class="alert alert-success" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("logout");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>


   <?php if($this->session->flashdata("senhaDiferente")): ?>
  <p class="alert alert-danger" style="margin-top: 4.5vw ; text-align: center;  "><?= $this->session->flashdata("senhaDiferente");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>

  <?php if($this->session->flashdata("emailIgual")): ?>
  <p class="alert alert-danger" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("emailIgual");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>


  <?php if($this->session->flashdata("cpfIgual")): ?>
  <p class="alert alert-danger" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("cpfIgual");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>


  <?php if($this->session->flashdata("fotoInvalida")): ?>
  <p class="alert alert-danger" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("fotoInvalida");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>

  <?php if($this->session->flashdata("nomeNoticiaInvalido")): ?>
  <p class="alert alert-danger" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("nomeNoticiaInvalido");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>

  <?php if($this->session->flashdata("nomeFamiliaInvalido")): ?>
  <p class="alert alert-danger" style="margin-top: 4.5vw ; text-align: center; "><?= $this->session->flashdata("nomeFamiliaInvalido");?></p>
  <meta HTTP-EQUIV='refresh' CONTENT='1'>
  <?php endif ?>
  </div>

  
			<!-- Fim do Menu -->	
			