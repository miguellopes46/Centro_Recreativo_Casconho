<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
   <title>EDITAR PONTO DE INTERESSE</title>
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
$id = $_GET['id'];
 
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
    $imagem = rand(1000,1000000).".".$imgExt;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 

    $sql= 'UPDATE interesse SET nome=:nome, alt=:alt, texto=:texto, img=:imagem WHERE id=:id';
    $sth = $dbh -> prepare($sql);
    $sth->execute([':nome' => $nome,':alt' => $alt,':texto' => $texto,':imagem' => $imagem, ':id' => $id]); 
}




$sql = 'SELECT * FROM interesse WHERE id =:id';  /*para os valores atuais estarem dentro dos forms*/
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();
$obj = $sth->FetchObject();
?>

<p>EDITAR O PONTO DE INTERESSE COM O NOME: <?=$obj->nome?></p>






<div class="mb-5">
<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?=$obj->id?>">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome do Ponto de Interesse*</label>
    <textarea class="form-control" id="nome" name="nome" placeholder="Escreva o nome do Ponto de interesse" required="true"> <?=$obj->nome?></textarea>
  </div>
  <div class="mb-3">
    <label for="data" class="form-label" >Legenda da Fotografia*</label>
    <textarea class="form-control" id="alt" name="alt" placeholder="Escreva legenda da foto" required="true"> <?=$obj->alt?></textarea>
  </div>
  <div class="mb-3">
    <label for="imagem" class="form-label">Imagem <b>*</b></label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a Imagem" required="true">
  </div>
  <div class="mb-3">
    <label for="local" class="form-label">Texto*</label>
    <textarea class="form-control" id="texto" name="texto" placeholder="Escreva o texto que caracterize o ponto de interesse" required="true"> <?=$obj->texto?></textarea>
  </div>
  
  <button type="submit" class="btn btn-danger">Alterar</button>
</form>
</div>


<div class="container">
        <div class="row pt-2">
          <div class="col-md-3">
            <img style="margin-bottom:100px;" src="../img/interesse/<?=$obj->img?>"
              class="border-top-0 border-left-0 border-right-0 text-center img-fluid rounded" alt="">
          </div>
          <div class="col-md-8 ml-md-5">

            <div class="subtitle-news mt-2 mb-3">
              <h2><?=$obj->nome?></h2>
            </div>
            <div class="texto-news">
              <p>  <?=$obj->alt?></p>
              <p> <?=$obj->texto?></p>
            </div>
          </div>
      </div>
  </div>


  <script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>