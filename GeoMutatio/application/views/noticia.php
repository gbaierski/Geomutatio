<?php

    include('header.php');

    $usuarios['result'] = $this->Usuario_model->getUsuarios();

    foreach($usuarios['result'] as $usuario){

        if($usuario->cpf == $row->cpf){

            $autor_noticia = $usuario->nome;
            
        }else{

        }
    } 

    $noticiasrelacionadas['result'] = $this->Noticia_model->getNoticiasRelacionada($row->codnoticia);
    
?>

    <div class="clear"></div>

    <div class="parede"></div>
    <div class="parede2"></div>

    <h1 class="titulo_noticia2"> <?php echo $row->titulo_noticia; ?> </h1> 

    <h1 class="subtitulo_noticia"> <?php echo $row->subtitulo_noticia; ?> </h1> 

    <div class="data_from">    

        <p class="autor_noticia"> Por <?php echo $autor_noticia; ?> </p> 

        <p class="data_noticia2"> <?php echo $row->data_noticia; ?></p> 
        
    </div>

    <hr style="width: 48vw; margin-left:26vw; margin-top: 3vw;">  

    <?php 
        $foto = BASEPATH."../assets/imagens/noticias/".$row->titulo_noticia;
        if (file_exists($foto)) {
	?>

        <img class="img_noticia" src="<?= base_url();?>/assets/imagens/noticias/<?=$row->titulo_noticia;?>">

    <?php 

    }else{                                                     
        ?>
            <img class="img_noticia" src="<?= base_url();?>/assets/imagens/usuarios/default.jpg">
        <?php
    }
    ?>

    <div class="parede3"></div>
    <div class="parede4"></div>

    <h1 class="desc_noticia"> <?php echo nl2br($row->desc_noticia); ?> </h1>

    <br>

    <h2 class="vejatambem"> VEJA TAMBÉM </h2>

    <?php foreach ($noticiasrelacionadas['result'] as $data) { ?>

    <a class="card_noticia_link" href="<?php echo site_url('Redirect/noticia')?>/<?= $data->codnoticia ?>">

        <div class="card_noticia" id="first_card_noticia" style="margin-left:10vw; margin-top:3em; height: 20vw;">

            <?php 
                $foto = BASEPATH."../assets/imagens/noticias/".$data->titulo_noticia;
                if (file_exists($foto)) {
            ?>

                <img src="<?= base_url();?>/assets/imagens/noticias/<?=$data->titulo_noticia;?>" class="background_card_noticia" style="height: 14vw;">
            <?php        
                }else{                                                     
            ?>
                <img class="background_card_noticia" style="height: 14vw;" src="<?= base_url();?>/assets/imagens/usuarios/default.jpg">
            <?php
                }
            ?>

            <h4 class="home_noticia_txt"><?php echo $data->titulo_noticia; ?></h4>

        </div>
    </a>

    <?php } ?>
        <div class="clear"></div>
    <?php    
        include "footer.php"
    ?>	
