<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Membros</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Roboto:wght@400;700;900&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mansalva&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/crc.css">

  <link rel="icon" href="img/logo.png">
</head>

<body>
<!-- Menu inicial-->

<?php 
require 'includes/menucrc.php'; 
require 'includes/connection.php';

$id = $_GET['id'];
 
   if(array_key_exists("id_dept", $_POST)) {

    $id_dept= $_POST['id_dept'];
    $nome_func= $_POST['nome_func'];
    $nome_pessoa= $_POST['nome_pessoa'];
    $dataN= $_POST['dataN'];
    $socio= $_POST['socio'];
    $contact= $_POST['contact'];
    //adicionar imagem
    $img = $_FILES['imagem']['name'];
    $tmp_diretoria=$_FILES['imagem']['tmp_name'];
    $size=$_FILES['imagem']['size'];
    $diretoria = "../img/memb/";
    $imgExt = strtolower(pathinfo($img,PATHINFO_EXTENSION));
    $imagem = rand(1000,1000000).".".$imgExt;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretoria.$imagem); 

    $sql= 'UPDATE funcao SET id_dept=:id_dept, nome_func=:nome_func, nome_pessoa=:nome_pessoa, dataN =:dataN, socio=:socio, contact=:contact, img=:imagem WHERE id=:id';
    $sth = $dbh -> prepare($sql);
    $sth->execute([':id_dept' => $id_dept,'nome_func' => $nome_func,':nome_pessoa' => $nome_pessoa,':dataN' => $dataN, ':socio' => $socio, ':contact' => $contact, ':imagem' => $imagem, ':id' => $id]); 
}


$sql = 'SELECT * FROM funcao WHERE id =:id';  /*para os valores atuais estarem dentro dos forms*/
$sth = $dbh->prepare($sql);
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->execute();
$obj = $sth->FetchObject();
?>


<h2>Editar o membro <?=$obj->nome_pessoa?></h2>

<form method="POST" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?=$obj->id?>">
  <div class="mb-3">
    <label for="dept" class="form-label" >ID do Departamento</label>
    <textarea class="form-control" id="id_dept" name="id_dept" required="true" readonly="true"><?=$obj->id_dept?></textarea>
  </div>
  <div class="mb-3">
    <label for="nome_func" class="form-label">Nome da Função</label>
    <textarea class="form-control" id="nome_func" name="nome_func" required="true" readonly="true"><?=$obj->nome_func?></textarea>
  </div>
  <div class="mb-3">
    <label for="nome" class="form-label" >Nome da Pessoa*</label>
    <textarea class="form-control" id="nome_pessoa" name="nome_pessoa" placeholder="Escreva o nome completo do indivíduo" required="true"><?=$obj->nome_pessoa?></textarea>
  </div>
  <div class="mb-3">
    <label for="data" class="form-label">Data*</label>
    <input type="date" class="form-control" id="dataN" name="dataN" placeholder="Escreva a data de nascimento do indivíduo" required="true" value="<?=$obj->dataN?>">
  </div>
  <div class="mb-3">
    <label for="socio" class="form-label">Número de Sócio*</label>
    <input type="text" class="form-control" id="socio" name="socio" placeholder="Digite o número de sócio da pessoa em questão" required="true"  value="<?=$obj->socio?>">
  </div>
  <div class="mb-3">
    <label for="contact" class="form-label">Contacto*</label>
    <textarea class="form-control" id="contact" name="contact" placeholder="Escreva o contacto do membro" required="true"><?=$obj->contact?></textarea>
  </div>
    <div class="mb-3">
    <label for="imagem" class="form-label">Imagem <b>*</b></label>
    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Selecione a Imagem" required="true">
  </div>
  <button type="submit" class="btn btn-danger">Editar</button>
</form>
<div class="container">
    <div class="row pt-2">
       <div class="col-md-3">
            <img style="margin-bottom:100px;" src="../img/memb/<?=$obj->img?>"
              class="border-top-0 border-left-0 border-right-0 text-center img-fluid rounded" alt="">
          </div>
               <div class=" col-md-9 texto-news">
              <p><span>Função: </span><span style="text-transform: uppercase;" ><?=$obj->nome_func?></span></p>
              <p>Nome: <?=$obj->nome_pessoa?></p>
              <p>Data de Nascimento: <?=$obj->dataN?></p>
              <p>Contacto: <?=$obj->contact?></p>
              <p>Sócio Nº: <?=$obj->socio?></p>
          </div>
      </div>
  </div>

 <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>