<?php

include('header.php');

$familia['result'] = $this->Familia_model->getFamilias();

 $usuario = $this->session->userdata('usuario');

 for ($i=0; $i < sizeof($familia['result']); $i++) { 
 	
 	$cpf_usuario_familia[] = $familia['result'][$i]->cpf;
 	
 }

?>

	<div class="clear"></div>
    <h1 id="mapa_title" style="margin-top: 5vw; margin-left: 40vw; font-size: 2.2vw;">Minhas Famílias</h1>
	<div class="clear"></div>

    <br><br>
	
	<?php 


	$contador = 0;

	for ($i=0; $i < sizeof($familia['result']); $i++) { 
	

		

		if ($usuario['cpf'] == $cpf_usuario_familia[$i]) {


			$contador = 1;
		?>

		<div class="card" style="width: 20rem; height:44em; margin-left:5vw; margin-top:3vw; float: left;">
		<?php
						
					$foto = BASEPATH."../assets/imagens/familias/".$familias['result'][$i]->nome_fam;
					if (file_exists($foto)) {
			?>

						<img src="<?= base_url();?>/assets/imagens/familias/<?=$familia['result'][$i]->nome_fam;?>" style="width:20rem; height:19em;" class="card-img-top" >

		<?php

						}else{
							
				
			?>

						<img src="<?= base_url();?>/assets/imagens//usuarios/default.jpg" style="width:20rem; height:19em;" class="card-img-top" >




							<?php
						}

						?>



		<div class="card-body" style="float:left; height: 10vw;">
			<h5 class="card-title" style="text-align:center;"><?php echo $familia['result'][$i]->nome_fam; ?></h5>
			<br>
			<p class="card-text"><b style="color:black; font-weight:600;">Necessita de: </b><?php echo $familia['result'][$i]->recursos_nec; ?></p>
		</div>
		<ul class="list-group list-group-flush">
			<li class="list-group-item"><b style="color:black; font-weight:600;">Composta por: </b><?php echo $familia['result'][$i]->pessoas_fam; ?></li>
			<li class="list-group-item"><b style="color:black; font-weight:600;">Contato: </b><?php echo $familia['result'][$i]->telefone_fam; ?></li>
			<li class="list-group-item"><b style="color:black; font-weight:600;">Endereço: </b><?php echo $familia['result'][$i]->endereco_fam; ?></li>
		</ul>	
			<table style="height: 24vw; margin-top: 3vw;">
				<th><a href="<?php echo site_url('Familia/editMinhaFamilia');?>/<?php echo $familia['result'][$i]->id_familia?>" class="btn btn-success profile_botao" style="margin-left:2vw; cursor:pointer; width:7vw; ">Editar</a>
				<!-- Aciona/Abre o modal -->
				<th><a href="<?php echo site_url('Familia/deleteMinhaFamilia');?>/<?= $familia['result'][$i]->id_familia ?>" class="btn btnexcluir_conta" id="excluir_botao" style="margin-left:2vw; margin-right:0vw; float:left; width:7vw;cursor:pointer; ">Excluir</a>
			</table>
									
		</ul>
	</div>					
				
			</div>
						
	<?php }}

		if (@$contador == 0) {
			echo "<p style='margin-left:40.5vw;'>Você não possui nenhuma família cadastrada!</p>";
		}
		?>