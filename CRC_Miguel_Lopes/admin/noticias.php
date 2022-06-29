<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Notícias</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mansalva&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/crc.css">
    <link rel="icon" href="../img/logo.png">
</head>

<body>
<?php 
require 'includes/menucrc.php'; 
require 'includes/connection.php';
?>


<?php

   if(array_key_exists("titulo", $_POST)) {
    $titulo= $_POST['titulo'];
    $subtitulo= $_POST['subtitulo'];
    $intro= $_POST['intro'];
    $data= $_POST['data'];
    $autor= $_POST['autor'];
    $para1= $_POST['para1'];
    $para2= $_POST['para2'];
    $para3= $_POST['para3'];
    $para4= $_POST['para4'];
    $para5= $_POST['para5'];

    $img = $_FILES['imagem']['name'];
    $tmp_diretoria=$_FILES['imagem']['tmp_name'];
    $size=$_FILES['imagem']['size'];
    $diretoria = "../img/";
    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $imagem = rand(1000,1000000).".".$imgExt;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 

    $sql= 'INSERT INTO noticias(titulo, subtitulo, intro, data, autor, para1, para2, para3, para4, para5, img) VALUES(:titulo, :subtitulo, :intro, :data, :autor, :para1, :para2, :para3, :para4, :para5, :imagem)';
    $stmt = $dbh -> prepare($sql);
    $stmt->execute([':titulo' => $titulo,':subtitulo' => $subtitulo, ':intro' => $intro,':data' => $data,':autor' => $autor, ':para1' => $para1, ':para2' => $para2,':para3' => $para3, ':para4' => $para4, ':para5' => $para5 ,':imagem' => $imagem]); 
}
?>


<div class="">
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="titulo" class="form-label">Título*</label>
    <textarea class="form-control" id="titulo" name="titulo" placeholder="Escreva o titulo da notícia" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="subtitulo" class="form-label" >Subtitulo*</label>
    <textarea class="form-control" id="subtitulo" name="subtitulo" placeholder="Escreva o subtítulo da notícia" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="intro" class="form-label" >Introdução*</label>
    <textarea class="form-control" id="intro" name="intro" placeholder="Escreva a introdução (1º parágrafo, por exemplo) da notícia" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Data*</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Escreva a data que foi escrita a notícia" required="true">
  </div>
  <div class="mb-3">
    <label for="autor" class="form-label">Autor*</label>
    <input type="text" class="form-control" id="autor" name="autor" placeholder="Escreva o autor da notícia" required="true">
  </div>
  <div class="mb-3">
    <label for="para1" class="form-label">Parágrafo 1*</label>
    <input type="text" class="form-control" id="para1" name="para1" placeholder="Escreva o 1ºparágrafo" required="true">
  </div>
  <div class="mb-3">
    <label for="para2" class="form-label">Parágrafo 2</label>
    <input type="text" class="form-control" id="para2" name="para2" placeholder="Escreva o 2º parágrafo">
  </div>
  <div class="mb-3">
    <label for="para3" class="form-label">Parágrafo 3</label>
    <input type="text" class="form-control" id="para1" name="para3" placeholder="Escreva o 3ºparágrafo">
  </div>
  <div class="mb-3">
    <label for="para4" class="form-label">Parágrafo 4</label>
    <input type="text" class="form-control" id="para4" name="para4" placeholder="Escreva o 4ºparágrafo">
  </div>
  <div class="mb-3">
    <label for="par5" class="form-label">Parágrafo 5</label>
    <input type="text" class="form-control" id="para5" name="para5" placeholder="Escreva o 5ºparágrafo">
  </div>
  <div class="mb-3">
    <label for="img" class="form-label">Imagem*</label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a imagem correspondente" required="true">
  </div>
  <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
</div>













<?php

$sql = 'SELECT * FROM noticias ORDER BY data DESC';  //Como ao adicionar novo evento vai ser o mais recente
$sth = $dbh->prepare($sql);
$sth->execute();
?>


  
  <div class="container title-contact">
    <div class="row">
      <h2><span>Notícias</span></h2>
    </div>
  </div>

  <!--Página Notícia 1-->
  <?php
      while ($obj =$sth->FetchObject()){
  ?>
  <div class="container">
    <a style="text-decoration:none;" href="noticia-editar.php?id=<?= $obj->id?>">
      <div class="news-hov">
        <div class="row pt-2">
          <div class="col-md-3">
            <img src="../img/<?=$obj->img?>"
              class="border-top-0 border-left-0 border-right-0 text-center img-fluid rounded" alt="">
            <div class="container">
              <div class="row">
                <div class="col-6 d-md-inline d-sm-none text-secondary"><i class="far fa-calendar-alt m-2 "
                    alt=""></i><?=$obj->data?></div>
                <div class="col-6 d-md-inline d-sm-none text-secondary"><i class="fa fa-paint-brush m-2"></i><?=$obj->autor?>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-8 ml-md-5">

            <div class="subtitle-news mt-2 mb-3">
              <h2><span><?=$obj->titulo?></span></h2>
            </div>
            <div class="texto-news">
              <p> <?=$obj->intro?></p>
            </div>

          </div>
        </div>
      </div>
    </a>
  </div>
  <hr class="mt-md-5">
<?php } ?>




<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>