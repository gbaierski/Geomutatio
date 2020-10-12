<?php

include('header.php');

if ($this->session->userdata('usuario')) {

  $usuario = $this->session->userdata('usuario');

  if ($usuario['tipuser'] == 1 OR 2) { 

    $noticia['result'] = $this->Noticia_model->getNoticias();
  
?>

<h1 style="margin-top: 7%; text-align: center"> Tabela de notícias Cadastradas</h1>
<br>
<a  style="margin-left: 5%;" class="btn btn-success" href="<?php echo site_url('Redirect/cad_noticia')?>">Cadastrar noticia</a>


<table class="table table-borderless" style="width: 70%; margin-left: 15%; margin-top: 3%;">
  <thead>
    <tr>
      <th scope="col">Código da Noticia</th>
      <th scope="col">Titulo da Notícia</th>
      <th scope="col">Subtítulo da Notícia</th>
      <th scope="col">Descrição da Noticia</th>
      <th scope="col">Data da Notícia</th>
      <th scope="col">Foto da Notícia</th>
      <th scope="col">Publicado por:</th>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($noticia['result'] as $row) { ?>

    	<tr>
    	    <th scope="row"><?php echo $row->codnoticia; ?></th>
    	    <td><?php echo $row->titulo_noticia; ?></td>
          <td class="ellipsis"><?php echo $row->subtitulo_noticia; ?></td>
    	    <td class="ellipsis"><?php echo $row->desc_noticia; ?></td>
          <td><?php echo $row->data_noticia; ?></td>
          <td><?php echo strlen($row->foto_noticia); ?></td>
          <td><?php echo $row->cpf; ?> </td>

    	    <td> <a href="<?php echo site_url('Noticia/editNoticia');?>/<?php echo $row->codnoticia;?>">Editar</a></td>
    	    <td> <a href="<?php echo site_url('Noticia/deleteNoticia');?>/<?php echo $row->codnoticia;?>" id="deletar_botao" style="cursor:pointer; color:#007bff;" >Deletar</a></td>
          
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