
<?php include('header.php'); 


?>

<form class="form-horizontal" style="margin-left: 5%; margin-top: 7%;" action="<?php echo site_url('Ocorrencia/updateOcorrencia')?>/<?php echo $row->id_ocorrencia;?>"  method="POST">
  <fieldset>
    <div id="legend">
      <h2 style="margin-left: 14%;">Editar Ocorrência<h2>
    </div>
    <div class="container" style="margin-top: 3%;">
 
    <div class="container" style="margin-top: 1%;">
      <!-- Descrição da Notícia -->
      <label class="control-label" for="tipo_ocorrencia">Tipo de Ocorrência</label>
      <div class="controls">
         <select name="tipo_ocorrencia"> 
          <option value="buraco">Buraco</option> 
          <option value="alagamento">Alagamento</option> 
          <option value="arvore">Árvore Caída</option> 
          <option value="deslizamento">Deslizamento de Terra</option> 
        </select>
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Data da Notícia -->
      <label class="control-label"  for="data_ocorrencia">Data da Ocorrência</label>
      <div class="controls">
        <input type="date" id="data_ocorrencia" name="data_ocorrencia" value="<?php echo $row->data_ocorrencia; ?>" placeholder="" class="form-control">
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

