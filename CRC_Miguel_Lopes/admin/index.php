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
	<link rel="stylesheet" href="../css/fontawesome.min.css">
	<link rel="stylesheet" href="../css/crc.css">
	<link rel="icon" href="../img/logo.png">
</head>

<body>

<?php
require 'includes/connection.php';
?>


<div class="text-center p-2 my-2"><a href="../index.php"><button class="btn btn-primary p-4">MODO UTILIZADOR</button></a></div>

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
				<a href="interesse.php"><i class="btn far fa-map fa-3x"  alt=""></i></a>
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



<!-- INSERIR EVENTOS-->


<div style="font-size: 50px">INSERIR EVENTOS</div>


<?php
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
    $imagem = rand(1000,1000000).".".$imgExt; //criar outros nomes aleatórios
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 

    $sql= 'INSERT INTO evento(nome, data,local, img) VALUES(:nome, :data, :local, :imagem)';
    $sth = $dbh -> prepare($sql);
    $sth->execute([':nome' => $nome,':data' => $data,':local' => $local,':imagem' => $imagem]); 
}//fim do if

?>
<div class="">
<form method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="nome" class="form-label">Nome do Evento <b>*</b></label>
    <textarea class="form-control" id="nome" name="nome" placeholder="Escreva o nome do evento" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="data" class="form-label" >Data do Evento <b>*</b></label>
    <textarea class="form-control" id="data" name="data" placeholder="Escreva a data do evento" required="true"></textarea>
  </div>
  <div class="mb-3">
    <label for="local" class="form-label">Local <b>*</b></label>
    <input type="text" class="form-control" id="local" name="local" placeholder="Escreva o local do Evento" required="true">
  </div>
  <div class="mb-3">
    <label for="imagem" class="form-label">Imagem do evento <b>*</b></label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a imagem correspondente" required="true">
  </div>
  <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
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
					<img src="../img/<?=$obj->img?>" class="img-fluid" alt="">
				</div>
				<div class="data-event text-center"><?=$obj->data?></div>
				<div class="event-princ text-uppercase text-center"><strong>"<?=$obj->nome?>"</strong></div>
				<div class="more-e mb-4"><?=$obj->local?></div>
				<a href="evento-editar.php?id=<?= $obj->id?>"><button type="submit" class="btn btn-danger">Alterar</button></a>
			</div>
			<?php } ?>
				
		</div>
	</div>
</div>

<script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>