<?php
include('header.php');
?>
    <div class="clear"></div>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
        <h1 id="mapa_title" style="margin-top: 5%; margin-left: 38%;">Minhas Ocorrências</h1>
    <div class="clear"></div>

    <h5 style="margin-left:80%; margin-top:-1%;"> Filtrar por: </h5>
    <form method="post">
        <select name="filtro_ocorrencia" style="float:left; margin-left:80%; height:2em;">
            <option value="sem">Sem filtro</option> 
            <option value="buraco">Buraco</option> 
            <option value="alagamento">Alagamento</option>
            <option value="deslizamento">Deslizamento de terra</option>
            <option value="arvore">Árvore caída</option>
        </select>
        <input type="submit" style="cursor:pointer; margin-left:0.1%; font-size: 1rem; color: #fff;background-color: #28a745; border-color: #28a745; display: inline-block; border: 1px solid transparent; padding: .13rem .45rem; border-radius:.15rem;" value="Filtrar">
    </form>
        
    </head> 
    <body>

    <div id="mapid"  style="height: 63.5em; margin-top:0.5%;" onmouseover="getLocation()" ></div>

    <script>
        // Declara a variável que recebe o mapa e define a latitude e longitude iniciais
        var mymap = L.map('mapid').setView([-26.3017, -48.84457], 13);

        //Linka o layout do mapa com o mapbox através de um código de acesso
        L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	maxZoom: 18,
	id: 'mapbox.streets',
	accessToken: 'pk.eyJ1IjoiZ2VvbXV0YXRpbyIsImEiOiJjazEwcTl2bnEwMTY0M2xub2Ywc3poNXZyIn0.XWV7EofCREuGA9f9aiXVew'
}).addTo(mymap);


    var popup = L.popup();


    //Função que mostra o Select para os usuários logados
    function onMapClick(e) {

        var latlng = e.latlng.toString();

    	popup
    		.setLatLng(e.latlng)
    		.setContent(//'Você clicou nas coordenadas: ' + e.latlng.toString() + 
            '<br><form method="POST" action="<?php echo site_url("Ocorrencia/createOcorrenciaM")?>"> <input type="hidden" id="local_ocorrencia" name="local" value=""> <input type="hidden" id="cpf" name="cpf" value=""> <input type="hidden" id="data_ocorrencia" name="data_ocorrencia" value=""> <select name="tipo_ocorrencia"> <option value="buraco">Buraco</option> <option value="alagamento">Alagamento</option> <option value="arvore">Árvore Caída</option> <option value="deslizamento">Deslizamento de Terra</option> </select><br> <input type="submit" value="Cadastrar ocorrência" /></form>')
    		.openOn(mymap);

            var latlng = e.latlng.toString();
            document.getElementById("local_ocorrencia").value = latlng;

<?php

    date_default_timezone_set('America/Sao_Paulo');
    $date = date('Y-m-d');

    $usuario = $this->session->userdata('usuario');
    
    $cpf = $usuario['cpf'];

?>

    var data_ocorrencia = "<?php echo $date;?>"
    document.getElementById("data_ocorrencia").value = data_ocorrencia;


    var cpf = "<?php echo $cpf;?>"
    document.getElementById("cpf").value = cpf;

    }



    //Função para o click no mapa de usuários não logados
    function onMapClickSL(e) {

        var latlng = e.latlng.toString();

        popup
            .setLatLng(e.latlng)
            .setContent('Você precisa estar logado para cadastrar uma ocorrência!')
            .openOn(mymap);

            var latlng = e.latlng.toString();
            document.getElementById("local_ocorrencia").value = latlng;

    }
<?php
    
    //Valida se existe algum usuário logado
    if ($this->session->userdata('usuario')) {

?>  


mymap.on('click', onMapClick);



<?php
        }else{ 
?>
            mymap.on('click', onMapClickSL);
<?php
        }  
?>


    </script>


    <?php


    //Início do filtro
     
    $ocorrenciasArray = $this->Ocorrencia_model->getOcorrencias();
    // $count = count($ocorrenciasArray);

    //FILTRO AQUI
    $filtro = 'tudo';
   
    $filtro_usuario = $this->input->post('filtro_ocorrencia');

    if ($filtro_usuario == 'buraco') {
        $filtro = 'buraco';
    }elseif($filtro_usuario == 'alagamento'){
        $filtro = 'alagamento';
    }elseif($filtro_usuario == 'deslizamento'){
        $filtro = 'deslizamento';
    }elseif($filtro_usuario == 'arvore'){
        $filtro = 'arvore';
    }else{
        $filtro = 'tudo';
    }

        foreach ($ocorrenciasArray as $ocorrencia) {

        $id_ocorrencia = $ocorrencia->id_ocorrencia;

        $tipo_ocorrencia = $ocorrencia->tipo_ocorrencia;

        $usuario = $ocorrencia->cpf;

        if ($filtro == $tipo_ocorrencia and $usuario == $this->session->userdata('usuario')['cpf'] ) {

          
            
        


             $local = explode(',', $ocorrencia->local); 
             $nome_ocorrencia = $ocorrencia->nome_ocorrencia;
             $tipo_ocorrencia = $ocorrencia->tipo_ocorrencia;
             $data_ocorrencia = $ocorrencia->data_ocorrencia;
             $imagem_ocorrencia = $ocorrencia->imagem_ocorrencia;

            ?>

            <script type="text/javascript">
                var local1 = "<?php echo $local[0];?>"
                var local2 = "<?php echo $local[1];?>"
                var tipo_ocorrencia = "<?php echo $tipo_ocorrencia;?>"
                var data_ocorrencia = "<?php echo $data_ocorrencia;?>"
                var imagem_ocorrencia = "<?php echo $imagem_ocorrencia;?>"
                var nome_ocorrencia = "<?php echo $nome_ocorrencia;?>"



                var icone = L.icon({
                    iconUrl: '<?= base_url();?>/assets/imagens/ocorrencias/'+ imagem_ocorrencia,

                    iconSize:     [38, 95], // size of the icon
                    iconAnchor:   [20, 94], // point of the icon which will correspond to marker's location
                    popupAnchor:  [0, -30] // point from which the popup should open relative to the iconAnchor
                });



                //Verifica se o usuário está logado para o sistema de likes

                <?php if ($this->session->userdata('usuario')) { ?>

                var marker = L.marker([local1, local2],{icon: icone}).addTo(mymap); marker.bindPopup("<b style='color:#54b07b;'><?php echo $nome_ocorrencia;?></b><br>" + "<b style='color: #8e8e8e; font-size:10px;'><img style='width:2em;'  src='<?= base_url();?>/assets/imagens/icons/date.png'><?php echo $data_ocorrencia;?></b><br> <img style='width:1.5em; margin-left:17%;'  src='<?= base_url();?>/assets/imagens/setas/setavermelha.png'><img onclick='upVote()'style='width:1.5em; margin-left:15%;'  src='<?= base_url();?>/assets/imagens/setas/setaverde.png'>").openPopup();


               <?php }else{ ?>

                var marker = L.marker([local1, local2],{icon: icone}).addTo(mymap); marker.bindPopup("<b style='color:#54b07b;'><?php echo $nome_ocorrencia;?></b><br>" + "<b style='color: #8e8e8e; font-size:10px;'><img style='width:2em;'  src='<?= base_url();?>/assets/imagens/icons/date.png'><?php echo $data_ocorrencia;?></b><br>").openPopup();


            <?php } ?>

            </script>
<?php
            }

            if ($filtro == 'tudo' and $usuario == $this->session->userdata('usuario')['cpf'] ) {
                

             $local = explode(',', $ocorrencia->local); 
             $nome_ocorrencia = $ocorrencia->nome_ocorrencia;
             $tipo_ocorrencia = $ocorrencia->tipo_ocorrencia;
             $data_ocorrencia = $ocorrencia->data_ocorrencia;
             $imagem_ocorrencia = $ocorrencia->imagem_ocorrencia;

            ?>

            <script type="text/javascript">
                var local1 = "<?php echo $local[0];?>"
                var local2 = "<?php echo $local[1];?>"
                var tipo_ocorrencia = "<?php echo $tipo_ocorrencia;?>"
                var data_ocorrencia = "<?php echo $data_ocorrencia;?>"
                var imagem_ocorrencia = "<?php echo $imagem_ocorrencia;?>"
                var nome_ocorrencia = "<?php echo $nome_ocorrencia;?>"



                var icone = L.icon({
                    iconUrl: '<?= base_url();?>/assets/imagens/ocorrencias/'+ imagem_ocorrencia,

                    iconSize:     [38, 95], // size of the icon
                    iconAnchor:   [20, 94], // point of the icon which will correspond to marker's location
                    popupAnchor:  [0, -30] // point from which the popup should open relative to the iconAnchor
                });




                //Verifica se o usuário está logado para o sistema de likes

                <?php if ($this->session->userdata('usuario')) { ?>

                var marker = L.marker([local1, local2],{icon: icone}).addTo(mymap); marker.bindPopup("<b style='color:#54b07b;'><?php echo $nome_ocorrencia;?></b><br>" + "<b style='color: #8e8e8e; font-size:10px;'><img style='width:2em;'  src='<?= base_url();?>/assets/imagens/icons/date.png'><?php echo $data_ocorrencia;?></b><br><a href='<?='../Ocorrencia/editMinhaOcorrencia/'.$id_ocorrencia;?>/'><img style='width:1.5em;float:left;' src='<?= base_url();?>/assets/imagens/icons/edit.png'></a><a href='<?='../Ocorrencia/deleteOcorrencia/'.$id_ocorrencia;?>/'><img style='float:right; width:1.5em;' src='<?= base_url();?>/assets/imagens/icons/lixeira.png'></a>").openPopup();


               <?php }else{ ?>

                var marker = L.marker([local1, local2],{icon: icone}).addTo(mymap); marker.bindPopup("<b style='color:#54b07b;'><?php echo $nome_ocorrencia;?></b><br>" + "<b style='color: #8e8e8e; font-size:10px;'><img style='width:2em;'  src='<?= base_url();?>/assets/imagens/icons/date.png'><?php echo $data_ocorrencia;?></b><br>").openPopup();


            <?php } ?>

            </script>

<?php     
            }
       }

      

    ?>


<p id="demo"></p>


    <script>

        function upVote(){

            alert('colocar função aqui');
        }





















var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}


$i = 0;


function showPosition(position) {
  
  if ($i < 1) { 

  var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap); marker.bindPopup("Você está aqui!").openPopup();

    $i++;
    }

}

</script>


    
        
    </body>
</html>