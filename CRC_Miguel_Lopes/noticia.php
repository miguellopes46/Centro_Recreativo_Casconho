<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php
    require 'includes/connection.php';

$id_noticia = $_GET['id'];

    if(isset($_GET['id'])) $id = $_GET['id'];
    

$sql = 'SELECT * FROM noticias 
WHERE id =:id';
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();
$obj = $sth->FetchObject();
?>


  <title><?=$obj->titulo?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mansalva&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/crc.css">
    <link rel="icon" href="img/logo.png">
</head>

<body>
<?php 
require 'includes/menucrc.php'; 
?>

<div class="container mt-4">
    <div>
      <div class="row">
        <div class="col-12 col-lg-10 mt-3 newticia-title">
          <h2><?=$obj->titulo?></h2>
          <p class="mt-2 newticia-subtit"><?=$obj->subtitulo?></p>
        </div>
        <div class="col-12 col-lg-10 rounded d-block">
          <img src="img/<?=$obj->img?>" class="w-100 img-fluid" alt="">
        </div>
      </div>
    </div>
</div>

<div class="container">
    <div class="row">
      <div class="col-12 col-lg-10 d-flex">
        <div class="mt-2 new-icon"><i class="far fa-calendar-alt m-2 " alt=""></i><?=$obj->data?></div>
        <div class="mt-2 ml-auto mb-2 d-md-flex new-icon "><i class="fa fa-paint-brush m-2 new-icon"></i><?=$obj->autor?>
        </div>
        
      </div>

      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-news"><?=$obj->para1?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-news"><?=$obj->para2?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-news"><?=$obj->para3?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-news"><?=$obj->para4?></p>
      <p class="col-12 col-lg-10 mt-3 mt-lg-4 texto-news"><?=$obj->para5?></p>

    </div>
</div>

<div class="title-interesse ml-md-1"><h2><span>Comentários</span></h2></div>
<?php

if(isset($_POST['nome']) && empty($_POST['nome']) == false && empty($_POST['texto']) == false) {
    $nome = $_POST['nome'];
    $texto = $_POST['texto'];


    $sql = $dbh->prepare("INSERT INTO comments (id_post, nome, texto,data) VALUES ($id_noticia, :nome, :texto, CURRENT_TIMESTAMP)");
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':texto', $texto);
    $sql->execute();

?>
      <div class="alert alert-success" role="alert">
      Comentário adicionado com sucesso.</div>

<?php } ?>

<div class="container-fluid">
  <div class="row">
     <div class="col-12 col-md-8 text-center text-md-left ml-md-5">
      <form action="" method="POST">
        <p><label class="subtitle-interesse">Nome</label><br><input type="text" name=nome id="nome" placeholder="Nome" class="form form-control"></p>
        <p><label>Comentário</label><textarea name="texto" id="texto" rows="3"placeholder="Digite o seu comentário..." class="form form-control" ></textarea></p>
        <div class="text-center text-md-right"> 
            <p class="panel-body"><input type="submit" value="COMENTAR" class="btn btn-primary rounded-4 px-3 py-2"></p>
        </div>
      </form>
    </div>
  </div>
</div>
 <hr>


 <?php 

  $sql= 'SELECT * FROM comments WHERE id_post = :id_post ORDER BY data DESC';
  $sth = $dbh->prepare($sql);
  $sth->bindValue(':id_post', $id_noticia, PDO::PARAM_INT);
  $sth->execute();
  //$list = $sth->FetchObject();



       while ($list=$sth->FetchObject()){
  ?>
  <div class="container-fluid">
        <div class="row pt-2">
          <div class="col-10 ml-md-5">
            <div class="mt-2"> 
              <div class="subtitle-interesse" style="font-size: 1.3rem"> Por: <?=$list->nome?></div>
              <div class="" style="color: #63C5DA"><i class="fas fa-clock mr-2" ></i> Às <?=$list->data?></div>
            </div>
            <div class="" style="font-size:1.2rem">
              <p class="mt-4"> <?=$list->texto?></p>
            </div>
          </div>
        </div>
  </div>
  <hr class="mt-md-5">
<?php } ?>

<?php 
require 'includes/footer.php'; 
?>

<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>