<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>A visitar</title>
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
require 'includes/connection.php';?>
<?php 
require 'includes/menucrc.php'; 
?>

<div class="title-interesse ml-md-1"><h2><span>Pontos de interesse</span></h2></div>

<?php
$sql = 'SELECT * FROM interesse';
$sth = $dbh->prepare($sql);
$sth->execute();
while($obj = $sth->FetchObject()){
?>

<div class="container mt-5">
  <div class="subtitle-interesse ml-md-4 text-center text-secondary"><h3><span><?=$obj->nome?></span></div>

  <div class="row pt-2" >
    
    <div class="col-12 col-lg-3">
          <img src="img/interesse/<?=$obj->img?>" class="img-interesse img-fluid rounded" alt="<?=$obj->alt?>" onclick="clickImagem(this)" data-texto="<?= $obj->texto ?>">
    </div>
      <div class="col-12 col-lg-8 ml-3 mt-3 mt-lg-0 text-center text-lg-left texto-contact">
      <p><?=$obj->texto?></p>
    </div>
  </div>  
</div>

<hr  class="mt-md-5">
<?php 
}
?>
<!--Página PInteresse 1 - A "Ilha"-->
<!--Modal-->
<div id="ModalInteresse" class="modal">
  <span class="fechar">&times;</span>
  <img class="modal-content" id="img01">
  <div id="legenda" style="font-size: 1.8rem; color:white"></div>
</div>


<?php 
require 'includes/footer.php'; 
?>

<script src="js/bootstrap.bundle.min.js"></script>
<script>
  

//Modal - Pontos de Interesse
var modal = document.getElementById("ModalInteresse");

//Inserir imagem dentro do modal
var imagem = document.getElementById("imgInteresse");
var modalImg = document.getElementById("img01");
var legendaText = document.getElementById("legenda");

function clickImagem(elem){
  modal.style.display = "block";
  modalImg.src = elem.src;
  legendaText.innerHTML = elem.alt;
  console.log(elem.dataset.texto);
}

// fechar
var span = document.querySelector(".fechar");

// Fechar a imagem
span.onclick = function() { 
  modal.style.display = "none";
}



</script>
</body>
</html>