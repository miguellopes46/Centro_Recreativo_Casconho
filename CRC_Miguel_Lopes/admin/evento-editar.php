<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
   <title>EDITAR EVENTO</title>
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
    $data= $_POST['data'];
    $local= $_POST['local'];
    //adicionar imagem
    $img = $_FILES['imagem']['name'];
    $tmp_diretoria=$_FILES['imagem']['tmp_name'];
    $size=$_FILES['imagem']['size'];
    $diretoria = "../img/";
    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $imagem = rand(1000,1000000).".".$imgExt;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 

    $sql= 'UPDATE evento SET nome=:nome, data=:data, local=:local, img=:imagem WHERE id=:id';
    $sth = $dbh -> prepare($sql);
    $sth->execute([':nome' => $nome,':data' => $data,':local' => $local,':imagem' => $imagem, ':id' => $id]); 
}

?>


<h2>EDITAR EVENTO</h2>

<?php


$sql = 'SELECT * FROM evento WHERE id =:id';  /*para os valores atuais estarem dentro dos forms*/
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();
$obj = $sth->FetchObject();
?>

<div class="container">
  <div class="row">
    <div class="col-6 mb-5">
      <form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <input type="hidden" name="id" value="<?=$obj->id?>">
    <label for="nome" class="form-label">Nome do Evento <b>*</b></label>
    <textarea class="form-control" id="nome" name="nome" placeholder="Escreva o nome do evento" required="true"><?=$obj->nome?></textarea>
  </div>
  <div class="mb-3">
    <label for="data" class="form-label" >Data do Evento <b>*</b></label>
    <textarea class="form-control" id="data" name="data" placeholder="Escreva a data do evento" required="true"><?=$obj->data?></textarea>
  </div>
  <div class="mb-3">
    <label for="local" class="form-label">Local <b>*</b></label>
    <textarea class="form-control" id="local" name="local" placeholder="Escreva o local do Evento" required="true"> <?=$obj->local?></textarea>
  </div>
  <div class="mb-3">
    <label for="imagem" class="form-label"> Imagem do evento <b>*</b></label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a imagem correspondente" required="true">
  </div>
  <button type="submit" class="btn btn-danger">Alterar</button>
</form>
      </div>




<!-- Página Principal 4-Próximos Eventos-->
      <div class="col-6">
        <div class="text-center">
          <img src="../img/<?=$obj->img?>" class="img-fluid" alt="">
        </div>
        <div class="text-center"><?=$obj->data?></div>
        <div class="text-uppercase text-center"><strong>"<?=$obj->nome?>"</strong></div>
        <div class="text-center"><?=$obj->local?></div>
      </div>


<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>
