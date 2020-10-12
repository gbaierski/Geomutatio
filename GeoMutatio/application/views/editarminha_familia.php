
<?php include('header.php'); ?>

<form class="form-horizontal" style="margin-left: 5%; margin-top: 7%;" action="<?php echo site_url('Familia/updateFamilia')?>/<?php echo $row->id_familia;?>"  method="POST">
  <fieldset>
    <div id="legend">
       <h2 style="margin-left: 14%;">Editar Família<h2>
    </div>
    <div class="container" style="margin-top: 1%;">
      <!-- Nome -->
      <label class="control-label"  for="nome_fam">Nome</label>
      <div class="controls">
        <input type="text" id="nome_fam" name="nome_fam" value="<?php echo $row->nome_fam; ?>" placeholder="" class="form-control" required>
      </div>
    </div>
 

    <div class="container" style="margin-top: 1%;">
      <!-- Pessoas -->
      <label class="control-label"  for="pessoas_fam">Pessoas da Família (separe por vírgula)</label>
      <div class="controls">
        <input type="text" id="pessoas_fam" name="pessoas_fam" value="<?php echo $row->pessoas_fam; ?>" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Quantidade de pessoas -->
      <label class="control-label" for="qtd_pessoas">Recursos Necessitados</label>
      <div class="controls">
        <input type="text" id="recursos_nec" name="recursos_nec" value="<?php echo $row->recursos_nec; ?>" placeholder="" class="form-control" required>
      </div>
    </div>
    <br>

     <div class="container" style="margin-top: 1%;">
      <!-- Telefone para contato -->
      <label class="control-label"  for="telefone_fam">Telefone para contato</label>
      <div class="controls">
        <input type="text" maxlength="14" onkeydown="javascript: fMasc( this, mTel );" id="telefone_fam" name="telefone_fam" value="<?php echo $row->telefone_fam; ?>" placeholder="" class="form-control" required>
      </div>
    </div>

     

    <div class="container" style="margin-top: 1%;">
      <!-- Pessoas -->
      <label class="control-label"  for="endereco_fam">Endereço da família</label>
      <div class="controls">
        <input type="text" id="endereco_fam" name="endereco_fam" value="<?php echo $row->endereco_fam; ?>" placeholder="" class="form-control" required>
      </div>
    </div>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Editar</button>
      </div>
    </div>
  </fieldset>
</form>

<?php

    $usuario = $this->session->userdata('usuario');
    
    $cpf = $usuario['cpf'];

?> 
  <script>

    var cpf = "<?php echo $cpf;?>"
    document.getElementById("cpf").value = cpf;


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

