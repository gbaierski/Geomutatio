<?php include('header.php'); 

$session = $this->session->userdata('usuario');

?>

<form class="form-horizontal" style="margin-left: 5%; margin-top: 7%;" action="<?php echo site_url('Usuario/updateUsuario')?>/<?php echo $row->cpf;?>"  method="POST">
  <fieldset>
    <div id="legend">
       <h2 style="margin-left: 14%;">Editar Usuário<h2>
    </div>
    <div class="container" style="margin-top: 1%;">
      <!-- Username -->
      <label class="control-label"  for="nome">Nome</label>
      <div class="controls">
        <input type="text" id="nome" name="nome" value="<?php echo $row->nome; ?>" placeholder="" class="form-control" required>
      </div>
    </div>
 
    <div class="container" style="margin-top: 1%;">
      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" value="<?php echo $row->email; ?>" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Username -->
      <label class="control-label"  for="cpf">CPF</label>
      <div class="controls">
        <input type="text" id="cpf" name="cpf" placeholder="" value="<?php echo ($this->Usuario_model->valida_cpf($row->cpf)); ?>" onkeydown="javascript: fMasc( this, mCPF );" class="form-control" maxlength="14" required>
      </div>
    </div>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Password-->
      <label class="control-label" for="senha">Senha</label>
      <div class="controls">
        <input type="password" id="senha" name="senha" value="<?php echo $row->senha; ?>" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Password -->
      <label class="control-label"  for="datanasc">Data de Nascimento</label>
      <div class="controls">
        <input type="date" id="datanasc" name="datanasc" value="<?php echo $row->datanasc; ?>" placeholder="" class="form-control">
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Foto de Perfil -->
      <label class="control-label"  for="foto_perfil">Insira uma foto de perfil</label>
      <div class="controls">
        <input type="file" id="foto_perfil" name="foto_perfil" placeholder="" class="form-control">
      </div>
    </div>

    <?php

      if ($session['tipuser'] == 1) {
    ?>
       <div class="container" style="margin-top: 1%;">
      <!-- Password -->
      <label class="control-label"  for="tipuser">Tipo de Usuário</label>
      <div class="controls">
        <input type="num" maxlength="1" id="tipuser" name="tipuser" value="<?php echo $row->tipuser; ?>" placeholder="" class="form-control">
      </div>
    </div>
      
    <?php
      }

    ?>

    
    <br>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Editar</button>
      </div>
    </div>
  </fieldset>
</form>



<script type="text/javascript">
      function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
      }
      function fMascEx() {
        obj.value=masc(obj.value)
      }
      function mTel(tel) {
        tel=tel.replace(/\D/g,"")
        tel=tel.replace(/^(\d)/,"($1")
        tel=tel.replace(/(.{3})(\d)/,"$1)$2")
        if(tel.length == 9) {
          tel=tel.replace(/(.{1})$/,"-$1")
        } else if (tel.length == 10) {
          tel=tel.replace(/(.{2})$/,"-$1")
        } else if (tel.length == 11) {
          tel=tel.replace(/(.{3})$/,"-$1")
        } else if (tel.length == 12) {
          tel=tel.replace(/(.{4})$/,"-$1")
        } else if (tel.length > 12) {
          tel=tel.replace(/(.{4})$/,"-$1")
        }
        return tel;
      }
      function mCNPJ(cnpj){
        cnpj=cnpj.replace(/\D/g,"")
        cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
        cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
        cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
        cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
        return cnpj
      }
      function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
      }
      function mCEP(cep){
        cep=cep.replace(/\D/g,"")
        cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
        cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
        return cep
      }
      function mNum(num){
        num=num.replace(/\D/g,"")
        return num
      }
    </script>
