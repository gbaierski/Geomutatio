<?php

include('header.php');

if ($this->session->userdata('usuario')) {

  $usuario = $this->session->userdata('usuario');

  if ($usuario['tipuser'] == 1 OR 2) { 

    $familia['result'] = $this->Familia_model->getFamilias();
  
?>

<h1 style="margin-top: 7%; text-align: center"> Tabela de Famílias Cadastradas</h1>
<br>
<a  style="margin-left: 5%;" class="btn btn-success" href="<?php echo site_url('Redirect/cad_familia')?>">Cadastrar familia</a>


<table class="table table-borderless" style="width: 70%; margin-left: 15%; margin-top: 3%;">
  <thead>
    <tr>
      <th scope="col">ID família</th>
      <th scope="col">Nome</th>
      <th scope="col">Pessoas da Família</th>
      <th scope="col">Recursos Necessitados</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereço</th>
      <th scope="col">Cadastrada por</th>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($familia['result'] as $row) { ?>

    	<tr>
    	    <th scope="row"><?php echo $row->id_familia; ?></th>
    	    <td><?php echo $row->nome_fam; ?></td>
          <td><?php echo $row->pessoas_fam; ?></td>
          <td><?php echo $row->recursos_nec; ?></td>
          <td><?php echo $row->telefone_fam; ?></td>
          <td><?php echo $row->endereco_fam; ?></td>
          <td><?php echo $row->cpf; ?> </td>

    	    <td> <a href="<?php echo site_url('Familia/editFamilia');?>/<?php echo $row->id_familia;?>">Editar</a></td>
          <td> <a href="<?php echo site_url('Familia/deleteFamilia');?>/<?php echo $row->id_familia;?>" id="deletar_botao" style="cursor:pointer; color:#007bff;" >Deletar</a></td>
          <!-- Modal de login -->
          

             
    	</tr>

    <?php } ?>	

  </tbody>
</table>


<?php
  }else{
    redirect('/');
  }
}else{
  redirect('/');
}
?>