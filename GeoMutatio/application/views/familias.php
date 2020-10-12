 <?php

include('header.php');

//if ($this->session->userdata('usuario')) {

  //if ($usuario['tipuser'] == 1 OR 2) { 

  $familia['result'] = $this->Familia_model->getFamilias();
  
?>
<h1 style="margin-top: 7%; text-align: center;  font-size: 2.5vw;"> Famílias</h1>
<?php foreach ($familia['result'] as $row) { ?>

	<div class="card" style="width: 20rem; height:41em; margin-left:5%; margin-top:3%; float: left;">


		<?php
						
					$foto = BASEPATH."../assets/imagens/familias/".$row->nome_fam;
					if (file_exists($foto)) {
			?>

						<img src="<?= base_url();?>/assets/imagens/familias/<?=$row->nome_fam;?>" style="widht:20rem; height:19em;" class="card-img-top" >

		<?php

						}else{
							
				
			?>

						<img src="<?= base_url();?>/assets/imagens/familias/familia.jpg" style="widht:20rem; height:19em;" class="card-img-top" >




							<?php
						}

						?>



		<div class="card-body">
			<h5 class="card-title" style="text-align:center;"><?php echo $row->nome_fam; ?></h5>
			<br>
			<p class="card-text"><b style="color:black; font-weight:600;">Necessita de: </b><?php echo $row->recursos_nec; ?></p>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><b style="color:black; font-weight:600;">Composta por: </b><?php echo $row->pessoas_fam; ?></li>
			<li class="list-group-item"><b style="color:black; font-weight:600;">Contato: </b><?php echo $row->telefone_fam; ?></li>
			<li class="list-group-item"><b style="color:black; font-weight:600;">Endereço: </b><?php echo $row->endereco_fam; ?></li>
		</ul>
	</div>

<?php } 	
	if ($this->session->userdata('usuario')) {

		$usuario = $this->session->userdata('usuario');

		if ($usuario['tipuser'] == 1 or $usuario['tipuser'] == 2) { ?>

			<div class="clear"></div>
			<a  style="float: left; margin-top:2%; margin-left:5%;" class="btn btn-success" href="<?php echo site_url('Redirect/cad_familia')?>">Cadastrar familia</a>
		
		<?php 									
		}else{ 	}
		}else{  }	

		?>
		<div class="clear"></div>

		<?php	
			include "footer.php";
		?>	
