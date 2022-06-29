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
	<link rel="icon" href="img/logo.png">
</head>
<style>

	

</style> 
<body>
<?php 
require 'includes/menucrc.php'; 
require 'includes/connection.php';
?>
<?php
$sql = 'SELECT * FROM contactos';
$sth = $dbh->prepare($sql);
$sth->execute();
?>


<div class="title-contact ml-md-1"><h2><span>Contactos Úteis</span></h2></div>


<?php
      while ($obj=$sth->FetchObject()){
        ?>
<div class="container">
<div class="subtitle-contact ml-3 text-secondary"><h3><span><?=$obj->nome?></span></h3></div>
  <div class="row pt-2">
      <div class="col-md-12 col-lg-3">
        <ul class="list-group">
      <li class="list-group-item border-top-0 border-left-0 border-right-0 text-center" ><img src="img/contactos/<?=$obj->img?>" class="img-fluid rounded" alt=""></li>
          <li class="list-group-item" ><i class="far fa-clock"></i> <?=$obj->horas?></li>
          <li class="list-group-item"><i class="fas fa-phone"></i> <?=$obj->tlm?> </li>
          <li class="list-group-item"><i class="fas fa-envelope"></i> <?=$obj->email?> </li>
          <li class="list-group-item"><i class="fas fa-map-marker-alt"></i> <?=$obj->map?></li>
        </ul>
      </div>
      <div class="col-md-12 col-lg-8">
      <div class="texto-contact mt-4 mt-lg-0">
       <p><?=$obj->texto?></p>
       <br>
        <p> <strong><?=$obj->info?></strong> <a href="<?=$obj->website?>"><?=$obj->website?></a> <!--website para href-->
      </div>
    </div>
  </div>  

</div>
<hr  class="mt-md-5">
<?php } ?>

<?php 
require 'includes/footer.php'; 
?>






<script src="js/bootstrap.bundle.min.js"></script>


</body>
</html>