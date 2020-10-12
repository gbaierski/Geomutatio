<?php

include('header.php');

if ($this->session->userdata('usuario')) {

  $usuario = $this->session->userdata('usuario');

  if ($usuario['tipuser'] == 1) { 

    $usuario['result'] = $this->Usuario_model->getUsuarios();
  
?>

<h1 style="margin-top: 7%; text-align: center;"> Tabela de Usuários Cadastrados</h1>


<table class="table table-borderless" style="width: 70%; margin-left: 15%; margin-top: 3%;">
  <thead>
    <tr>
      <th scope="col">CPF</th>
      <th scope="col">Nome</th>
      <th scope="col">E-mail</th>
      <th scope="col">Senha</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">Tipo de Usuário</th>
    </tr>
  </thead>
  <tbody>

  	<?php foreach ($usuario['result'] as $row) { 

      $cpf = $this->Usuario_model->valida_cpf($row->cpf);
     // $tipuser = $this->Usuario_model->valida_tipUser_num($row->tipuser);
     // $email = $this->Usuario_model->converte_email($row->email);


      $countSenha = strlen($row->senha);

      $senhaCrip = '';

      for ($i=0; $i < $countSenha; $i++) { 
        $senhaCrip[$i] = '*';
      }
      ?>


    	<tr>
    	    <th scope="row"><?php echo $cpf; ?></th>
    	    <td><?php echo $row->nome; ?></td>
    	    <td><?php echo $row->email; ?></td>
    	    <td><?php print_r($senhaCrip); ?></td>
    	    <td><?php echo $row->datanasc; ?></td>
          <td><?php echo $row->tipuser; ?></td>
    	    <td> <a href="<?php echo site_url('Usuario/editUsuario');?>/<?php echo $row->cpf;?>">Editar</a></td>
          <td> <a href="<?php echo site_url('Usuario/deleteUsuario');?>/<?php echo $cpf;?>" id="deletar_botao" style="cursor:pointer; color:#007bff;" >Deletar</a></td>
          

              
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

//print_r($usuario);
?>