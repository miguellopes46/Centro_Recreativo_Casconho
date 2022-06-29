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


<?php 
 

   if(array_key_exists("nome", $_POST)) {
    $nome= $_POST['nome'];
    $alt= $_POST['alt'];
    $texto= $_POST['texto'];
    
    //adicionar imagem
    $img = $_FILES['imagem']['name'];
    $tmp_diretoria=$_FILES['imagem']['tmp_name'];
    $size=$_FILES['imagem']['size'];
    $diretoria = "../img/interesse/"; 
    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $imagem = rand(1000,1000000).".".$imgExt; //criar outros nomes aleatórios
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 

    $sql= 'INSERT INTO interesse(nome, alt,img, texto) VALUES(:nome, :alt, :imagem, :texto)';
    $stmt = $dbh -> prepare($sql);
    $stmt->execute([':nome' => $nome,':alt' => $alt,':imagem' => $imagem, ':texto' => $texto]); 
}

?>

<div class="">
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome do Ponto de Interesse<b>*</b></label>
    <textarea class="form-control" id="nome" name="nome" placeholder="Escreva o nome por qual é conhecido a atração turística" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="alt" class="form-label" >Legenda da Imagem da Atração <b>*</b></label>
    <textarea class="form-control" id="alt" name="alt" placeholder="Escreva a legenda da imagem" required="true"></textarea>
  </div>

  <div class="mb-3">
    <label for="imagem" class="form-label">Imagem <b>*</b></label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a Imagem" required="true">
  </div>
  <div class="mb-3">
    <label for="texto" class="form-label"> Descrição do Ponto de Interesse <b>*</b></label>
    <input type="text" class="form-control" id="texto" name="texto" placeholder="Escreva uma descrição que caracterize a atração turística" required="true">
  </div>
  <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
</div>




<div class="title-interesse ml-md-1"><h2><span>Pontos de interesse</span></h2></div>

<?php
$sql = 'SELECT * FROM interesse';
$sth = $dbh->prepare($sql);
$sth->execute();
while($obj = $sth->FetchObject()){
?>

<!--Página PInteresse 1 - A Praia da Nora-->
<div class="container mt-5">
  <div class="subtitle-interesse ml-md-4 text-center text-secondary"><h3><span><?=$obj->nome?></span> <a href="interesse-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">Alterar</button></a></div>

  <div class="row pt-2" >
    
    <div class="col-md-3 text-center">
          <img src="../img/interesse/<?=$obj->img?>" class="img-interesse img-fluid rounded" alt="<?=$obj->alt?>">
          <p><?=$obj->alt?></p>
    </div>
      <div class="col-md-8 texto-contactos text-center">
        
      <p><?=$obj->texto?></p>
    </div>
  </div>  
</div>

<hr  class="mt-md-5">
<?php 
} // while dos resultados
?>


<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>