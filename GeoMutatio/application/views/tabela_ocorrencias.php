<?php

include('header.php');

if ($this->session->userdata('usuario')) {

  $usuario = $this->session->userdata('usuario');

  if ($usuario['tipuser'] == 1) { 

    $ocorrencia['result'] = $this->Ocorrencia_model->getOcorrencias();
  
?>

<h1 style="margin-top: 7%; text-align: center"> Tabela de Ocorrências Cadastradas</h1>
<br>
<a  style="margin-left: 5%;" class="btn btn-success" href="<?php echo site_url('Redirect/ocorrencias')?>">Cadastrar Ocorrência</a>


<table class="table table-borderless" style="width: 70%; margin-left: 15%; margin-top: 3%;">
  <thead>
    <tr>
      <th scope="col">Código da Ocorrência</th>
      <th scope="col">Tipo de Ocorrência</th>
      <th scope="col">Data da Ocorrência</th>
      <th scope="col">Local </th>
      <th scope="col">Cadastrada por:</th>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($ocorrencia['result'] as $row) { ?>

    	<tr>
    	    <th scope="row"><?php echo $row->id_ocorrencia; ?></th>
    	    <td><?php echo $row->tipo_ocorrencia; ?></td>
          <td class="ellipsis"><?php echo $row->data_ocorrencia; ?></td>
    	    <td class="ellipsis"><?php echo $row->local; ?></td>
          <td><?php echo $row->cpf; ?></td>

          <td> <a href="<?php echo site_url('Ocorrencia/editOcorrencia');?>/<?php echo $row->id_ocorrencia;?>">Editar</a></td>
          <td> <a href="<?php echo site_url('Ocorrencia/deleteOcorrencia');?>/<?php echo $row->id_ocorrencia;?>" id="deletar_botao" style="cursor:pointer; color:#007bff;" >Deletar</a></td>
    	   

              
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