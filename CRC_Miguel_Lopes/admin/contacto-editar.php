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
 if(array_key_exists("nome", $_POST)) {
    $nome= $_POST['nome'];
    $horas= $_POST['horas'];
    $tlm= $_POST['tlm'];
    $email= $_POST['email'];
    $map= $_POST['map'];
    $info= $_POST['info'];
    $website= $_POST['website'];
    $texto= $_POST['texto'];
    
    $img = $_FILES['imagem']['name'];
    $tmp_diretoria=$_FILES['imagem']['tmp_name'];
    $size=$_FILES['imagem']['size'];
    $diretoria = "../img/contactos/"; 
    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $imagem = rand(1000,1000000).".".$imgExt; 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 
 
    $sql= 'UPDATE contactos SET nome =:nome, horas=:horas, tlm=:tlm, email =:email, map = :map, info=:info, website =:website, texto=:texto, img=:imagem WHERE id =:id';
    $sth = $dbh -> prepare($sql);
    $sth->execute([':nome' => $nome, ':horas' => $horas,':tlm' => $tlm,  ':email' => $email,':map' => $map, ':info' => $info, ':website' => $website, ':texto' => $texto, ':imagem' => $imagem, ':id' => $id ]); 
}//fim do if


$sql = 'SELECT * FROM contactos WHERE id =:id';  /*para os valores atuais estarem dentro dos forms*/
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();
$obj = $sth->FetchObject();
?>


<div class="p-4" style="font-size: 29px">EDITAR CONTACTO: <?=$obj->nome?></div>


<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?=$obj->id?>">
  <div class="mb-3">
    <label for="nome" class="form-label" >Nome do contacto*</label>
    <textarea class="form-control" id="nome" name="nome" placeholder="Escreva o nome do Contacto Útil " required="true"><?=$obj->nome?></textarea>
  </div>
  <div class="mb-3">
    <label for="horas" class="form-label">Horário*</label>
    <textarea class="form-control" id="horas" name="horas" placeholder="Escreva o horário que o contacto poderá ser contactado/está aberto" required="true"><?=$obj->horas?></textarea>
  </div>
  <div class="mb-3">
    <label for="tlm" class="form-label" >Telemóvel*</label>
    <textarea class="form-control" id="tlm" name="tlm" placeholder="Introduza o número de telefone do contacto." required="true"><?=$obj->tlm?></textarea>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email*</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Escreva o email." required="true" value="<?=$obj->email?>">
  </div>
  <div class="mb-3">
    <label for="map" class="form-label">map*</label>
    <input type="text" class="form-control" id="map" name="map" placeholder="Introduza a localização do contacto" required="true"  value="<?=$obj->map?>">
  </div>
  <div class="mb-3">
    <label for="info" class="form-label">Informação adicional</label>
    <textarea class="form-control" id="info" name="info" placeholder="Diga uma informação adicional sobre o contacto" required="true"><?=$obj->info?></textarea>
  </div>
    <div class="mb-3">
      <label for="web" class="form-label">Website</label>
      <textarea class="form-control" id="website" name="website"  placeholder="Escreva o website, se não existir deixe em branco"><<?=$obj->website?></textarea>
  </div>
  <div class="mb-3">
      <label for="texto" class="form-label">Texto</label>
     <textarea class="form-control" id="texto" name="texto" rows="3" placeholder="Faça uma descrição do contacto"><?=$obj->texto?></textarea>
  </div>
      <div class="mb-3">
    <label for="img" class="form-label">Imagem*</label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a imagem correspondente" required="true"><?=$obj->img?>
  </div>
  <button type="submit" class="btn btn-danger">Editar</button>
</form>


<!-- PREVIEW DO CONTACTO -->
<div class="p-4" style="font-size: 29px">PREVIEW DO CONTACTO</div>
  
<div class="container-fluid">
<div class="subtitle-contact ml-md-4 text-secondary"><h3><span><?=$obj->nome?></span></h3></div>
  <div class="row pt-2">
      <div class=col-md-3>
        <ul class="list-group">
      <li class="list-group-item border-top-0 border-left-0 border-right-0 text-center" ><img src="../img/contactos/<?=$obj->img?>" class="img-fluid rounded" alt=""></li>
          <li class="list-group-item"><i class="far fa-clock"></i> <?=$obj->horas?></li>
          <li class="list-group-item"><i class="fas fa-phone"></i> <?=$obj->tlm?> </li>
          <li class="list-group-item"><i class="fas fa-envelope"></i> <?=$obj->email?> </li>
          <li class="list-group-item"><i class="fas fa-map-marker-alt"></i><?=$obj->map?></li> 

        </ul>
      </div>
      <div class="col-md-8">
      <div class="texto-contactos">
       <p><?=$obj->texto?></p>
       <br>
        <p> <strong><?=$obj->info?></strong> <a href="<?=$obj->website?>"><?=$obj->website?></a></p> <!--website para href-->
      </div>
    </div>
  </div>  

</div>

<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>