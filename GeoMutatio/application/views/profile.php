<?php 

	include('header.php'); 

	$usuario = $this->session->userdata('usuario');
	extract($usuario);
?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
		</head>


		<body id="profile_background">
			<div class="profile_section">

					<div class="clear"></div>

				<h2 id="profile_title">Minha Conta: </h2>

					<div class="clear"></div>


						<?php
						
						$foto = BASEPATH."../assets/imagens/usuarios/".$cpf;
						if (file_exists($foto)) {
							?>

							<img id="profile_photo" src="<?= base_url();?>/assets/imagens/usuarios/<?=$cpf?>">
						<?php

						}else{
							
						
							?>

							<img id="profile_photo" src="<?= base_url();?>/assets/imagens/usuarios/default.jpg">

							<?php
						}

						?>
						
						
				<div class="informacoes_perfil">
					
						<h5 class="info_title">Nome:</h5>
						<div class="clear"></div>
						<p class="info_profile"> <?php echo $nome; ?></p>

						<h5 class="info_title">E-mail:</h5>
						<div class="clear"></div>
						<p class="info_profile"> <?php echo $email; ?></p>
				</div>

				<div class="informacoes_perfil">

						<h5 class="info_title">CPF: </h5>
						<div class="clear"></div>
						<p class="info_profile"><?php echo ($this->Usuario_model->valida_cpf($cpf)); ?></p>

						<h5 class="info_title">Data de Nascimento:</h5>
						<div class="clear"></div>
						<p class="info_profile"><?php echo $datanasc; ?></p>
				</div>
						
				
				

				<div class="clear"></div>

				<p id="tipuser_profile"> <?= $this->Usuario_model->valida_tipUser_num($tipuser)?></p>

				<!-- Aciona/Abre o modal -->
				<button id="excluir_botao">Excluir Conta</button>

				<!-- Modal de login -->
				<div id="excluir_modal" class="modal">

					<!--Conteúdo do modal login -->
					<div class="modal-conteudo">

						<div class="modal-form" style="height:10em">
							<p class="titulo-modal">Deseja mesmo excluir sua conta?</p>

							<a href="<?php echo site_url('Usuario/deleteUsuarioLogout');?>/<?php echo $cpf;?>" class="btn btnexcluir_conta">Excluir conta</a>

							<a href="<?php echo base_url();?>index.php/Usuario/profile" class="btn btncancelar">Cancelar</a>	
									
							<span class="fechar"></span>
						</div>

					</div>

				</div>

					<script type="text/javascript">
									// seleciona o modal
								var modal = document.getElementById("excluir_modal");

								// seleciona o botão que abre o modal
								var btn = document.getElementById("excluir_botao");

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

				<a href="<?php echo base_url();?>index.php/Usuario/logout" class="btn btn-warning profile_botao" style="color: white">Sair da Conta</a>

				<a href="<?php echo site_url('Usuario/editUsuario');?>/<?php echo $cpf;?>" class="btn btn-success profile_botao">Editar Perfil</a>

				
			</div>

		</body>
	</html>