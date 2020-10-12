<?php include('header.php'); 
	
	$noticias['result'] = $this->Noticia_model->getLastsNoticias();

	$familias['result'] = $this->Familia_model->getLastsFamilias();
	?>

	<div class="clear"></div>
	
	<!-- Banner -->
	<div class="imagem-banner">
	  <div class="texto-banner">
	    <img class="logo" src="<?= base_url();?>/assets/imagens/icons/logo.png">
	    <p>Preserve sua cidade e ela preservará você!</p>
	  </div>
	</div>
	
	<!-- Fim do Banner -->
	<div class="borda_cate_Index">
		<section class="bordas_index cor_bord"></section>
	    <section class="bordas_index cor_bord1"></section>
		<section class="bordas_index cor_bord"></section>
		<section class="bordas_index cor_bord1"></section>
		<section class="bordas_index cor_bord"></section>
		<section class="bordas_index cor_bord1"></section>
	</div>	

	<div class="clear"></div>

	<div class="info_part" style="width: 100%; height: 42vw;">
			<img id="info_logo" src="<?= base_url();?>/assets/imagens/icons/jacare.png">

			<h2 class="info_titulo"> A cidade inteira em suas mãos</p>
			<p class="info_text"> Cadastre e visualize diversas ocorrências e notícias acerca das mudanças climáticas e geológicas de Joinville. Receba as principais noticias sobre os principais eventos beneficentes de sua região.</p>

	</div>

	<div class="clear"></div>

	<div class="borda_cate_Index">
		<section class="bordas_index cor_bord"></section>
	    <section class="bordas_index cor_bord1"></section>
		<section class="bordas_index cor_bord"></section>
		<section class="bordas_index cor_bord1"></section>
		<section class="bordas_index cor_bord"></section>
		<section class="bordas_index cor_bord1"></section>
	</div>	

	<div class="clear"></div>

	<div class="home_noticias">

	<div class="clear"></div>

		<div class="cards_noticias">

		<div class="clear"></div>

		<h1 id="mapa_title" style="text-align:center; font-size:2vw; color:white; margin-top:1.5vw;">Notícias recentes</h1>
		
		<?php foreach ($noticias['result'] as $data) { ?>

			<a class="card_noticia_link" href="<?php echo site_url('Redirect/noticia')?>/<?= $data->codnoticia ?>">

				<div class="card_noticia" id="first_card_noticia" >

					<?php
						
						$foto = BASEPATH."../assets/imagens/noticias/".$data->titulo_noticia;
						if (file_exists($foto)) {
							?>
 		
							<img class="background_card_noticia" src="<?= base_url();?>/assets/imagens/noticias/<?=$data->titulo_noticia;?>">
						<?php

						}else{
								
							?>

							<img class="background_card_noticia" src="<?= base_url();?>/assets/imagens/usuarios/default.jpg">

							<?php
						}

						?>	

					<h4 class="home_noticia_txt"><?php echo $data->titulo_noticia; ?></h4>

					<p class="home_noticia_link">Confira a notícia completa</p>

				</div>
			</a>

		<?php } ?>	
			
		</div>

	</div>

	<div class="clear"></div>

	<div class="borda_cate_Index">
		<section class="bordas_index cor_bord"></section>
	    <section class="bordas_index cor_bord1"></section>
		<section class="bordas_index cor_bord"></section>
		<section class="bordas_index cor_bord1"></section>
		<section class="bordas_index cor_bord"></section>
		<section class="bordas_index cor_bord1"></section>
	</div>	

	<div class="clear"></div>

	<h1 id="mapa_title" style="margin-top: 8vw; text-align:center; font-size:2vw;">Famílias que necessitam de ajuda:</h1>

		<div class="cards_familias" style="text-align:center; margin-top:9vw;">

		<?php foreach ($familias['result'] as $dado) { ?>

			<a class="card_noticia_link" href="<?php echo site_url('Redirect/familias')?>">

					<?php
						
						$foto = BASEPATH."../assets/imagens/familias/".$dado->nome_fam;
						if (file_exists($foto)) {
							?>
 		
							<img style="width:15vw; height:15vw; border-radius:150em; margin-left:5vw;" src="<?= base_url();?>/assets/imagens/familias/<?=$dado->nome_fam;?>">
						<?php

						}else{
								
							?>

							<img style="width:15vw; height:15vw; border-radius:150em; margin-left:5vw;"  src="<?= base_url();?>/assets/imagens/usuarios/default.jpg" alt="Card image cap">

							<?php
						}

						?>	

			</a>

		<?php } ?>	
			
		</div>

	<?php
		include "footer.php";
	?>