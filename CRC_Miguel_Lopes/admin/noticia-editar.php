<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
   <title>EDITAR</title>
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
require'includes/connection.php';
require 'includes/menucrc.php'; 
?> 
<?php
$id = $_GET['id'];
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
    
    //adicionar imagem
    $img = $_FILES['imagem']['name'];
    $tmp_diretoria=$_FILES['imagem']['tmp_name'];
    $size=$_FILES['imagem']['size'];
    $diretoria = "../img/";
    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $imagem = rand(1000,1000000).".".$imgExt; //criar outros nomes aleatórios
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 

    $sql = 'UPDATE noticias SET titulo=:titulo, subtitulo=:subtitulo, intro=:intro, data=:data, autor=:autor, para1=:para1, para2=:para2, para3=:para3, para4=:para4, para5=:para5, img=:imagem WHERE id = :id ';
    $sth = $dbh -> prepare($sql);
    $sth->execute([':titulo' => $titulo,':subtitulo' => $subtitulo, ':intro' => $intro,':data' => $data,':autor' => $autor, ':para1' => $para1, ':para2' => $para2,':para3' => $para3, ':para4' => $para4, ':para5' => $para5 ,':imagem' => $imagem, ':id' => $id]); 
}


$sql = 'SELECT * FROM noticias WHERE id =:id';  /*para os valores atuais estarem dentro dos forms*/
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();
$obj = $sth->FetchObject();
?>
<p>EDITAR NOTÍCIA: <?=$obj->titulo?> </p>

<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?=$obj->id?>">
  <div class="mb-3">
    <label for="titulo" class="form-label" >Título*</label>
    <textarea class="form-control" id="titulo" name="titulo" placeholder="Escreva o título da notícia" required="true"><?=$obj->titulo?></textarea>
  </div>
  <div class="mb-3">
    <label for="subtitulo" class="form-label">Subtítulo*</label>
    <textarea class="form-control" id="subtitulo" name="subtitulo" placeholder="Escreva o subtítulo da notícia" required="true"><?=$obj->subtitulo?></textarea>
  </div>
  <div class="mb-3">
    <label for="texto" class="form-label" >Intro*</label>
    <textarea class="form-control" id="intro" name="intro" placeholder="Escreva introdução da notícia (por exemplo, o 1º parágrafo." required="true"><?=$obj->intro?></textarea>
  </div>
  <div class="mb-3">
    <label for="data" class="form-label">Data*</label>
    <input type="date" class="form-control" id="data" name="data" placeholder="Escreva a data da noticia" required="true" value="<?=$obj->data?>">
  </div>
  <div class="mb-3">
    <label for="autor" class="form-label">Autor*</label>
    <input type="text" class="form-control" id="autor" name="autor" placeholder="Escreva o autor do noticia" required="true"  value="<?=$obj->data?>">
  </div>
  <div class="mb-3">
    <label for="para1" class="form-label">Parágrafo 1*</label>
    <textarea class="form-control" id="para1" name="para1" rows="4" placeholder="Escreva o 1º parágrafo da notícia" required="true"><?=$obj->para1?></textarea>
  </div>
    <div class="mb-3">
      <label for="para2" class="form-label">Parágrafo 2</label>
      <textarea class="form-control" id="para2" name="para2" rows="3" placeholder="Escreva o 2º parágrafo da notícia"><?=$obj->para2?></textarea>
  </div>
  <div class="mb-3">
      <label for="para3" class="form-label">Parágrafo 3</label>
     <textarea class="form-control" id="para3" name="para3" rows="3" placeholder="Escreva o 3º parágrafo da notícia"><?=$obj->para3?></textarea>
  </div>
  <div class="mb-3">
      <label for="para4" class="form-label">Parágrafo 4</label>
     <textarea class="form-control" id="para4" name="para4" rows="3" placeholder="Escreva o 4º parágrafo da notícia"><?=$obj->para4?></textarea>
  </div>
  <div class="mb-3">
    <label for="para5" class="form-label">Parágrafo 5</label>
    <textarea class="form-control" id="para5" name="para5" rows="3" placeholder="Escreva o 5º parágrafo da notícia"><?=$obj->para5?></textarea>
  </div>
    <div class="mb-3">
    <label for="img" class="form-label">Imagem*</label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a imagem correspondente" required="true"><?=$obj->img?>
  </div>
  <button type="submit" class="btn btn-danger">Editar</button>
</form>

<!-- APRESENTAÇÃO DA NOTÍCIA -->

<div class="container mt-4">
    <div>
      <div class="row">
        <div class="col-12 col-lg-10 mt-3 newticia-title">
          <h2><?=$obj->titulo?></h1>
          <p class="mt-2 newticia-subtit"><?=$obj->subtitulo?></p>
        </div>
        <div class="col-12 col-lg-10 rounded d-block">
          <img src="../img/<?=$obj->img?>" class="w-100 img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-10 d-flex">
        <div class="mt-2 new-icon"><i class="far fa-calendar-alt m-2 " alt=""></i><?=$obj->data?></div>
        <div class="mt-2 ml-auto mb-2 d-md-flex new-icon "><i class="fa fa-paint-brush m-2 new-icon"></i><?=$obj->img?>
        </div>
        
      </div>

      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-contactos"><?=$obj->para1?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-contactos"><?=$obj->para2?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-contactos"><?=$obj->para3?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-contactos"><?=$obj->para4?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-contactos"><?=$obj->para5?></p>
      
      
      


    </div>
  </div>






<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>