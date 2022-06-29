<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contactos Úteis</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mansalva&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<link rel="stylesheet" href="css/crc.css">
	<link rel="icon" href="../img/logo.png">
</head>
<style>

	

</style> 
<body>
<?php 
require 'includes/connection.php';
require 'includes/menucrc.php'
?>

<p style="font-size:40px">AQUI ADICIONA-SE CONTACTOS</p>

<?php
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

    $sql= 'INSERT INTO contactos(nome, horas, tlm, email, map, info, website, texto, img) VALUES(:nome, :horas, :tlm, :email, :map, :info, :website, :texto, :imagem)';
    $sth = $dbh -> prepare($sql);
    $sth->execute([':nome' => $nome, ':horas' => $horas,':tlm' => $tlm, ':email' => $email,':map' => $map, ':info' => $info, ':website' => $website, ':texto' => $texto, ':imagem' => $imagem]); 
}//fim do if
?>
<div class="">
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome*</label>
    <textarea class="form-control" id="nome" name="nome" placeholder="Escreva o nome do contacto" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="horas" class="form-label" >Horas*</label>
    <textarea class="form-control" id="horas" name="horas" placeholder="Escreva o seu horário de funcionamento" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="tlm" class="form-label" >Telemóvel*</label>
    <textarea class="form-control" id="tlm" name="tlm" placeholder="Escreva o número de telemóvel do Contacto" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">E-Mail*</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="Escreva o email do contacto" required="true">
  </div>
  <div class="mb-3">
    <label for="map" class="form-label">Morada do Contacto*</label>
    <input type="text" class="form-control" id="map" name="map" placeholder="Escreva a morada respetiva" required="true">
  </div>
  <div class="mb-3">
    <label for="info" class="form-label">Informação Adicional*</label>
    <input type="text" class="form-control" id="info" name="info" placeholder="Escreva informações adicionais" required="true">
  </div>
  <div class="mb-3">
    <label for="website" class="form-label">Website, se existir</label>
    <input type="text" class="form-control" id="website" name="website" placeholder="Escreva o website respetivo, se existir">
  </div>
  <div class="mb-3">
    <label for="texto" class="form-label">Texto sobre o Contacto Útil*</label>
    <input type="text" class="form-control" id="texto" name="texto" placeholder="Escreva o texto sobre o Contacto" required="true">
  </div>
  <div class="mb-3">
    <label for="img" class="form-label">Imagem*</label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Escreva o nome da imagem" required="true">
  </div>
  <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
</div>


<?php
$sql = 'SELECT * FROM contactos';
$sth = $dbh->prepare($sql);
$sth->execute();
?>


<div class="title-contact ml-md-1"><h2><span>Contactos Úteis</span></h2></div>


<!--Página Contactos 1-Associação-->
<?php
      while ($obj=$sth->FetchObject()){
        ?>
<div class="container-fluid">
<div class="subtitle-contact ml-md-4 text-secondary"><h3><span><?=$obj->nome?></span></h3></div>
  <div class="row pt-2">
      <div class=col-md-3>
        <ul class="list-group">
      <li class="list-group-item border-top-0 border-left-0 border-right-0 text-center" ><img src="../img/contactos/<?=$obj->img?>" class="img-fluid rounded" alt=""></li>
          <li class="list-group-item"><i class="far fa-clock"></i> <?=$obj->horas?></li>
          <li class="list-group-item"><i class="fas fa-phone"></i> <?=$obj->tlm?> </li>
          <li class="list-group-item"><i class="fas fa-envelope"></i> <?=$obj->email?> </li>
          <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> <?=$obj->map?></li> 

        </ul>
      </div>
      <div class="col-md-8">
      <div class="texto-contactos">
       <p><?=$obj->texto?></p>
       <br>
        <p> <strong><?=$obj->info?></strong> <a href="<?=$obj->website?>"><?=$obj->website?></a></p> <!--website para href-->
        <br>
        <div class="text-center"><a href="contacto-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">Alterar</button></a></div>
      </div>
    </div>
  </div>  

</div>
<hr  class="mt-md-5">
<?php } ?>


<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>