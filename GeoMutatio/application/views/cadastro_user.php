<?php include('header.php'); ?>


  <form enctype="multipart/form-data" class="form-horizontal" style="margin-left: 5%; margin-top: 7%;" action="<?php echo site_url('Usuario/createUsuario')?>"  method="POST">

  <fieldset>

    <div id="legend">
      <h2 style="margin-left: 14%; font-size: 2.5vw;">Cadastro<h2>
    </div>



    <div class="container" style="margin-top: 3%;">

      <input type="hidden" name="tipuser" value="0">

      <!-- Username -->
      <label class="control-label"  for="nome">Nome<p style="color: red; float: right;">*</p></label>
      <div class="controls">
        <input type="text" id="nome" name="nome" placeholder="" class="form-control" required oninvalid="this.setCustomValidity('Insira seu nome, não queremos anônimos!')"
    oninput="this.setCustomValidity('')">
      </div>

    </div>
 
    <div class="container" style="margin-top: 1%;">

      <!-- CPF-->
      <label class="control-label"  for="cpf">CPF<p style="color: red; float: right;">*</p></label>
      <div class="controls">
        <input type="text" id="cpf" name="cpf" placeholder="" onkeydown="javascript: fMasc( this, mCPF );" class="form-control" maxlength="14" required oninvalid="this.setCustomValidity('O CPF é muito importante ¬¬')"
    oninput="this.setCustomValidity('')">
      </div>

    </div>


 
    <div class="container" style="margin-top: 1%;">

      <!-- Password-->
      <label class="control-label" for="senha">Senha <p style="color: red; float: right;">*</p></label>
      <div class="controls">
        <input type="password" id="senha" name="senha" placeholder="" class="form-control" required oninvalid="this.setCustomValidity('Não quer ficar desprotegido, certo?')"
    oninput="this.setCustomValidity('')">
      </div>

    </div>


    <div class="container" style="margin-top: 1%;">

      <!-- Password-->
      <label class="control-label" for="confirma_senha">Confirme sua senha <p style="color: red; float: right;">*</p></label>
      <div class="controls">
        <input type="password" id="confirma_senha" name="confirma_senha" placeholder="" class="form-control" required oninvalid="this.setCustomValidity('Não quer ficar desprotegido, certo?')"
    oninput="this.setCustomValidity('')">
      </div>

    </div>

    

     <div class="container" style="margin-top: 1%;">

      <!-- E-mail -->
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="form-control" required>
      </div>

    </div>



    <div class="container" style="margin-top: 1%;">

      <!-- Data de Nascimento -->
      <label class="control-label"  for="datanasc">Data de Nascimento</label>
      <div class="controls">
        <input type="date" id="datanasc" name="datanasc" placeholder="" class="form-control">
      </div>

    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Foto de Perfil -->
      <label class="control-label"  for="foto_perfil">Insira uma foto de perfil</label>
      <div class="controls">
        <input type="file" id="foto_perfil" name="foto_perfil" placeholder="" class="form-control">
      </div>
    </div>


    <br>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Cadastrar</button>
      </div>
    </div>
  </fieldset>
</form>

<script type="text/javascript">
  
  var senha = document.getElementById("senha").value;
  var confirma_senha = document.getElementById("confirma_senha").value;

  if (senha == confirma_senha) {

    <?$this->session->set_flashdata("cadastro_success", "Cadastrado com sucesso!");?>

  }else{

  }

  
</script>


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
