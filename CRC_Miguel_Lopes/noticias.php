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
    <link rel="icon" href="img/logo.png">
</head>
<style>

    

</style> 
<body>
<?php 
require 'includes/menucrc.php'; 
require 'includes/connection.php';

$sql = 'SELECT * FROM noticias ORDER BY data DESC';  //Como ao adicionar novo evento vai ser o mais recente
$sth = $dbh->prepare($sql);
$sth->execute();
?>


<img class="w-100 h-75" src="img/news-headeeeer.jfif">

  
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
    <a style="text-decoration:none;" href="noticia.php?id=<?= $obj->id?>">
      <div class="news-hov">
        <div class="row pt-2">
          <div class="col-md-3">
            <img src="img/<?=$obj->img?>"
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

<?php 
require 'includes/footer.php'; 
?>






<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>