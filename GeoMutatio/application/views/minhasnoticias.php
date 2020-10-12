 <?php

include('header.php');

$noticia['result'] = $this->Noticia_model->getNoticias();

 $usuario = $this->session->userdata('usuario');

 for ($i=0; $i < sizeof($noticia['result']); $i++) { 
 	
 	$cpf_usuario_noticia[] = $noticia['result'][$i]->cpf;
 	
 }

?>

	<div class="clear"></div>
    <h1 id="mapa_title" style="margin-top: 5vw; margin-left: 45vw; font-size: 2.2vw;">Minhas Notícias</h1>
	<div class="clear"></div>

    <br><br>
	
	<?php 


	$contador = 0;

	for ($i=0; $i < sizeof($noticia['result']); $i++) { 
	

		

		if ($usuario['cpf'] == $cpf_usuario_noticia[$i]) {


			$contador = 1;
		?>



			
			<div class="card_noticia2" style="float:left; width:100vw; margin-top:1vw;">
				<a href="<?php echo site_url('Redirect/noticia')?>/<?= $noticia['result'][$i]->codnoticia ?>">
					<?php
						
						$foto = BASEPATH."../assets/imagens/noticias/".$noticia['result'][$i]->titulo_noticia;
						if (file_exists($foto)) {
							?>
 		
							<img style="width:22vw;height:17em;float: left;" src="<?= base_url();?>/assets/imagens/noticias/<?=$noticia['result'][$i]->titulo_noticia;?>" alt="Card image cap">
						<?php

						}else{
								
							?>

							<img style="width:22vw;height:17em;float: left;" src="<?= base_url();?>/assets/imagens/usuarios/default.jpg" alt="Card image cap">

							<?php
						}

						?>	
					<h2 class="titulo_noticia"> <?php echo $noticia['result'][$i]->titulo_noticia; ?></h5>
				</a>
				<p class="texto_noticia"><?php echo $noticia['result'][$i]->subtitulo_noticia; ?> </p>	
					
				<p class="data_noticia"><?php echo $noticia['result'][$i]->data_noticia; ?></p>	
				<a href="<?php echo site_url('Noticia/editMinhaNoticia');?>/<?php echo $noticia['result'][$i]->codnoticia?>" class="btn btn-success profile_botao" style="margin-left:2vw; cursor:pointer; margin-top:1vw; width:5vw; float:left;">Editar</a>
				<!-- Aciona/Abre o modal -->
				<a href="<?php echo site_url('Noticia/deleteMinhaNoticia');?>/<?= $noticia['result'][$i]->codnoticia ?>" class="btn btnexcluir_conta" id="excluir_botao" style="margin-top:1vw; width:5vw; float:left; cursor:pointer;">Excluir</a>

						
			</div>
			
			<div class="clear"></div>
			<hr style="width: 70vw; margin-left:10vw; margin-top: 3vw;">  
			<div class="clear"></div>
			


	<?php }}

		if (@$contador == 0) {
			echo "Você não possui nenhuma notícia!";
		}
		?>