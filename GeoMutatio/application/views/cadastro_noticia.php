
<?php 

  include('header.php'); 

?>  

<form enctype="multipart/form-data" class="form-horizontal" style="margin-left: 5%; margin-top: 7%;" action="<?php echo site_url('Noticia/createNoticia')?>"  method="POST">
  <fieldset>
    <div id="legend">
      <h2 style="margin-left: 14%;">Cadastro de Notícias<h2>
    </div>
    <div class="container" style="margin-top: 3%;">

      <input type="hidden" name="tipuser" value="0">
      <!-- Titulo da Notícia -->
      <label class="control-label"  for="titulo_noticia">Titulo da Notícia</label>
      <div class="controls">
        <input type="text" id="titulo_noticia" name="titulo_noticia" placeholder="" class="form-control" required>
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Subtítulo da Notícia -->
      <label class="control-label" for="subtitulo_noticia">Subtítulo da Notícia</label>
      <div class="controls">
        <textarea style="height:5em;" id="subtitulo_noticia" name="subtitulo_noticia" placeholder="" class="form-control" rows=7></textarea>
      </div>
    </div>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Descrição da Notícia -->
      <label class="control-label" for="desc_noticia">Descrição da Notícia</label>
      <div class="controls">
        <textarea id="desc_noticia" name="desc_noticia" placeholder="" class="form-control" rows=7></textarea>
      </div>
    </div>

    <div class="container" style="margin-top: 1%;">
      <!-- Data da Notícia -->
      <label class="control-label"  for="data_noticia">Data da Notícia</label>
      <div class="controls">
        <input type="date" id="data_noticia" name="data_noticia" placeholder="" class="form-control" required>
      </div>
    </div>
 
    <div class="container" style="margin-top: 1%;">
      <!-- Imagens da Notícia-->
      <label class="control-label" for="foto_noticia">Imagem da Notícia</label>
      <div class="controls">
        <input type="file" id="foto_noticia" name="foto_noticia" placeholder="" class="form-control">
      </div>
    </div>

    <input type="hidden" id="cpf" name="cpf" value="">
 
    <div class="container" style="margin-top: 1%;">
      <!-- Button -->
      <div class="controls">
        <button class="btn btn-success">Cadastrar</button>
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

  </script>


