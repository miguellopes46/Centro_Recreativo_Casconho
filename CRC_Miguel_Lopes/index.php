<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CR Casconho</title>
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
require 'includes/connection.php';
?>



<?php 
require 'includes/menucrc.php'; 
?>
<!-- Página principal-1-CAROUSEL-->  

<?php
$sqlev = 'SELECT * FROM evento WHERE id = (SELECT MAX(id) FROM evento)';
$sth = $dbh->prepare($sqlev);
$sth->execute();
$obj =$sth->FetchObject()
?>

<div id="carouselp" class="carousel	slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselp" data-slide-to="0" class="active"></li>
    <li data-target="#carouselp" data-slide-to="1"></li>
    <li data-target="#carouselp" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
    	<img src="img/casc1.jpg" class="w-100 d-block img-fluid" alt="">
    </div>
    <div class="carousel-item">
    <img src="img/tree.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-uppercase"><strong>Desejamos-te um Feliz Natal e um grande ano 2021</strong></h5>
      </div>
    </div>
    <div class="carousel-item" data-interval="2000">
     <img src="img/evento<?=$obj->id?>-lg.jpg" class="w-100 d-block img-fluid" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-uppercase"><?=$obj->nome?></h5>
        <p><?=$obj->data?>. Aparece!</p>
      </div>
    </div>
    
  </div>
  <a class="carousel-control-prev" href="#carouselp" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselp" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>


<!-- Página principal 2-Row com icons-->

<div class="container-fluid mb-5 p-4 icons-r w-100 d-none d-md-block">
	<div class="row">
		<div class="col- col-3 news">
			<div class="text-center">
				<a href="noticias.php" title="123"> <i class="btn far fa-newspaper fa-3x "  alt=""></i></a>
			</div>
			<div class="fs-4 text-center">Notícias</div>
		</div>	
		<div class="col- col-3 news">
			<div class="text-center">
				<a href="turismo.php"><i class="btn far fa-map fa-3x"  alt=""></i></a>
			</div>
			<div class="fs-4 text-center">Visitar</div>
		</div>	
		<div class="col- col-3 contact">
			<div class="text-center">
				<a href="contactos.php"><i class="btn far fa-id-card fa-3x"></i></a>
			</div>
			<div class="fs-4 text-center">Contactos Úteis</div>
		</div>	
		<div class="col- col-3 eventos">	
			<div class="text-center">
				<a href="membros.php"><i class="btn fas fa-people-carry fa-3x"></i></a>
			</div>
			<div class="fs-4 text-center ">A Equipa</div>
		</div>
	</div>
</div>



<!-- Página Principal 3-Últimas Notícias-->


<?php
$sql = 'SELECT * FROM noticias ORDER BY data DESC';  //Como ao adicionar nova noticia vai ser a mais recente
$sth = $dbh->prepare($sql);
$sth->execute();
?>

<div class="container mt-5">
	<div id="title-news"><h2><span>Últimas Notícias</span></h2></div>
	<div class="row">

		<?php
			while ($obj =$sth->FetchObject()){
				?>
		<div id ="news-1" class="col-sm-12 col-md-4 opac">	
			<div class="">
				<a href="noticia.php?id=<?= $obj->id?>"><img src="img/<?=$obj->img?>" class="img-fluid" alt=""></a>
			</div>
			<div class="data-news"><?=$obj->data?>/</div>
			<div class="princ-news text-uppercase"><strong><?=$obj->titulo?></strong></div>
			<a href="noticia.php?id=<?= $obj->id?>" class="text-decoration-none"><div class="more">Ver notícia completa<i class="fas fa-chevron-right ml-2"></i></div></a>
		</div>	
		<?php }?>
	
		<div class="text-center"><a href="noticias.php" role="Button"><button type="button" class="btn-lg mb-5 p-2 w-75 text center btn-news">+ Ver Todas as Notícias</button></a>
		</div>
	</div>
</div>



<?php

$sqlev = 'SELECT * FROM evento ORDER BY id DESC';  //Como ao adicionar novo evento vai ser o mais recente
$sth = $dbh->prepare($sqlev);
$sth->execute();
?>

<!-- Página Principal 4-Próximos Eventos-->
<div class="border-top-white p-1 mt-5 " style="background-color:#8c8c8c">	
	<div class="container">
		<div id="title-event"><h2><span>Próximos Eventos</span></h2></div>
		<div class="row p-2 mt-5 text-center" >

			<?php
			while ($obj =$sth->FetchObject()){

				?>
			<div class="col-md-6 col opac">	
				<div class="text-center">
					<img src="img/<?=$obj->img?>" class="img-fluid" alt="">
				</div>
				<div class="data-event text-center"><?=$obj->data?></div>
				<div class="event-princ text-uppercase text-center"><strong>"<?=$obj->nome?>"</strong></div>
				<div class="more-e mb-4"><?=$obj->local?></div>
			</div>
			<?php } ?>
				
		</div>
	</div>
</div>

<!-- Página Principal 5-Enquadramento Geográfico-->
		
<div class="container mt-5">
	<div id="title-news"><h2><span>Enquadramento Geográfico</span></h2></div>
	<div class="row">
		<div id ="news-1" class="col-12 col-lg-6">	
			<div class="text-geo text-center text-lg-left">
        <p>A bela aldeia de Casconho está implantado na margem direita do conhcelho de Soure, onde faz fronteira com o distrito de Coimbra e com o de Leiria. É uma aldeia envelhecida, mas cheia de amor e amizade, onde, quem cá passa, fica apaixonado pela forma amável como são recebidos e a simplicidade da população e sentem-se parte da comunidade desde o momento em que chegam. </p>	
        <p>O Casconho possui vários recursos naturais, inclusivé, um rio natural onde é muito conhecido regionalmente e o mais frequentado por jovens, e não só, do concelho de Soure, mais conhecido por "A Ilha".</p>
        <br>
        <hr>	
        <p><strong>População</strong>: 312 |  <strong>Altitute:</strong> 88 metros |  <strong>Área:</strong> 12,76 km<sup>2</sup></p>
        <p> <strong>Coordenadas</strong>: &nbsp 40.03379887675461, -8.579991117792645
      </div>
		</div>	
		<div id ="news-2" class="col-12 col-lg-6">
			<div class="">
				<a href="https://www.google.com/maps/place/Casconho,+Soure/@40.0330421,-8.5975436,14z/data=!3m1!4b1!4m5!3m4!1s0xd225c2ce789a6fd:0xa00ebc04f80c5c0!8m2!3d40.033044!4d-8.580034" title=""><img src="img/maaaps.png" class="img-fluid rounded" alt=""></a>
			</div>
			<div class="text-center"><a href="https://www.google.com/maps/place/Casconho,+Soure/@40.0330421,-8.5975436,14z/data=!3m1!4b1!4m5!3m4!1s0xd225c2ce789a6fd:0xa00ebc04f80c5c0!8m2!3d40.033044!4d-8.580034" role="Button"><button class="btn my-3 px-5 text center btn-map"><i class="fas fa-map-marker-alt"></i>  &nbsp Como Chegar</button></a>
		</div>
		</div>	
	</div>
</div>

<!-- Footer -->
<?php 
require 'includes/footer.php'; 
?>





<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>