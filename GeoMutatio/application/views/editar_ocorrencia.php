
<?php include('header.php'); 


?>

<form class="form-horizontal" style="margin-left: 5%; margin-top: 7%;" action="<?php echo site_url('Ocorrencia/updateOcorrencia')?>/<?php echo $row->id_ocorrencia;?>"  method="POST">
  <fieldset>
    <div id="legend">
      <h2 style="margin-left: 14%;">Editar Ocorrência<h2>
    </div>
    <div class="container" style="margin-top: 3%;">

      <input type="hidden" name="tipuser" value="0">
      <!-- Titulo da Notícia -->
      <label class="control-label"  for="titulo_noticia">Código da Ocorrência</label>
      <div class="controls">
        <input type="number" maxlength="2" id="titulo_noticia" name="titulo_noticia" value="<?php echo $row->id_ocorrencia; ?>" placeholder="" class="form-control">
      </div>
    </div>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Descrição da Notícia -->
      <label class="control-label" for="desc_noticia">Tipo de Ocorrência</label>
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
      <label class="control-label"  for="data_noticia">Data da Ocorrência</label>
      <div class="controls">
        <input type="date" id="data_noticia" name="data_noticia" value="<?php echo $row->data_ocorrencia; ?>" placeholder="" class="form-control">
      </div>
    </div>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Imagens da Notícia-->
      <label class="control-label" for="foto_noticia">Local</label>
      <div class="controls">
        <input type="text" id="foto_noticia" name="foto_noticia" value="<?php echo $row->local; ?>" placeholder="" class="form-control">
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Imagens da Notícia-->
      <label class="control-label" for="foto_noticia">Cadastrada por:</label>
      <div class="controls">
        <input type="text" onkeydown="javascript: fMasc( this, mCPF );" id="foto_noticia" name="foto_noticia" value="<?php echo $row->cpf; ?>" placeholder="" class="form-control">
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

