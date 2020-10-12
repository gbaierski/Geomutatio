<?php

include('header.php');

$noticia['result'] = $this->Noticia_model->getNoticias();

?>
    <div class="clear"></div>
    <h1 id="mapa_title" style="margin-top: 5vw; margin-left: 45vw; font-size: 2.5vw;">Notícias</h1>
	<div class="clear"></div>

    <br><br>
	
	<?php foreach ($noticia['result'] as $row) { ?>

			
			<div class="card_noticia2" style="float:left; width:100vw; margin-top:1vw; font-size: 1vw;">
				<a href="<?php echo site_url('Redirect/noticia')?>/<?= $row->codnoticia ?>">

					<?php
						
						$foto = BASEPATH."../assets/imagens/noticias/".$row->titulo_noticia;
						if (file_exists($foto)) {
							?>

							<img style="width:22vw;height:17vw; float:left;" src="<?= base_url();?>/assets/imagens/noticias/<?=$row->titulo_noticia;?>" alt="Card image cap">
						<?php

						}else{
							
						
							?>

							<img style="width:22vw;height:17vw; float:left;" src="<?= base_url();?>/assets/imagens/usuarios/default.jpg" alt="Card image cap">

							<?php
						}

						?>

					<h2 class="titulo_noticia" > <?php echo $row->titulo_noticia; ?></h2>
				</a>

				<p class="texto_noticia"><?php echo $row->subtitulo_noticia; ?> </p>	
							
				<p class="data_noticia"><?php echo $row->data_noticia; ?></p>				
			</div>
			
			<div class="clear"></div>
			<hr style="width: 70vw; margin-left:10vw; margin-top: 3vw;">  
			<div class="clear"></div>
			


	<?php }	
	if ($this->session->userdata('usuario')) {

		$usuario = $this->session->userdata('usuario');

		if ($usuario['tipuser'] == 1 or $usuario['tipuser'] == 2) { ?>

			<a  style="margin-top: 5vw; float: left; margin-left:10vw;" class="btn btn-success" href="<?php echo site_url('Redirect/cad_noticia')?>">Cadastrar noticia</a>
		
		<?php 									
		}else{ 	}
		}else{  }

		
  include "footer.php";
?> 
