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
?>

  <div class="container mt-5 p-4">
    <div class="title-cargo mb-4">
      <h2><span>Presidência</span></h2>
    </div>
    <div class="row">

      <div class="col-md-10" id="tab-presidencia">
        <div class="card">
          <div class="card-header nav-tab">
            <button class="btn btn-light active" data-tab-target="#presidente">Presidente</button>
            <button class="btn btn-light" data-tab-target="#vice-presidente">Vice-Presidente</button>
            <button class="btn btn-light" data-tab-target="#suplentes">Suplentes</button>

          </div>

          <div class="card-body">
            <div class="tab-content active" id="presidente">

<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 1 AND nome_func = "presidente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Presidente da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
               <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>

            <div class="tab-content" id="vice-presidente">
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 1 AND nome_func = "vice-presidente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Vice-Presidente da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
               <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>

            <div class="tab-content" id="suplentes">
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 1 AND nome_func = "suplente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Suplentes da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
               <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5 p-4">
    <div class="title-cargo mb-4">
      <h2><span>Tesouraria</span></h2>
    </div>
    <div class="row">

      <div class="col-md-10" id="tab-tesouraria">
        <div class="card">
          <div class="card-header nav-tab">
            <button class="btn btn-light active" data-tab-target="#tesouraria-presidente">Presidente</button>
            <button class="btn btn-light" data-tab-target="#tesouraria-vice-presidente">Vice-Presidente</button>
            <button class="btn btn-light" data-tab-target="#tesouraria-suplentes">Suplentes</button>
          </div>

          <div class="card-body">
            <div class="tab-content active" id="tesouraria-presidente">

             
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 2 AND nome_func = "presidente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Presidente da Tesouraria: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
               <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>

            <div class="tab-content" id="tesouraria-vice-presidente">
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 2 AND nome_func = "vice-presidente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Presidente da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
              <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>

            <div class="tab-content" id="tesouraria-suplentes">
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 2 AND nome_func = "suplente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Presidente da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
               <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container mt-5 p-4">
    <div class="title-cargo mb-4">
      <h2><span>Conselho Fiscal</span></h2>
    </div>
    <div class="row">

      <div class="col-md-10" id="tab-conselho-fiscal">
        <div class="card">
          <div class="card-header nav-tab">
            <button class="btn btn-light active" data-tab-target="#conselho-presidente">Presidente</button>
            <button class="btn btn-light" data-tab-target="#conselho-vice-presidente">Vice-Presidente</button>
            <button class="btn btn-light" data-tab-target="#conselho-suplentes">Suplente</button>
          </div>

          <div class="card-body">
            <div class="tab-content active" id="conselho-presidente">
              
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 3 AND nome_func = "presidente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Presidente da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
              <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>

            <div class="tab-content" id="conselho-vice-presidente">
            
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 3 AND nome_func = "vice-presidente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Presidente da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
              <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>

            <div class="tab-content" id="conselho-suplentes">
             
<?php
$sql = 'SELECT * FROM funcao WHERE id_dept = 3 AND nome_func = "suplente"';
$sth = $dbh->prepare($sql);
$sth->execute();
$obj =$sth->FetchObject();
?>
              <img src="../img/memb/<?=$obj->img?>" class="img-fluid float-sm-right mb-3 mb-md-0" alt="">
              <h5 class="card-title">Presidente da Associação: <?=$obj->nome_pessoa?></h5>
              <p class="card-text">Data de Nascimento: <?=$obj->dataN?></p>
              <p class="card-text">Sócio Nº: <?=$obj->socio?></p>
              <p class="card-text">Contacto: <?=$obj->contact?></p>
              <a href="membros-editar.php?id=<?= $obj->id?>"><button class="btn btn-danger">ALTERAR</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="js/bootstrap.bundle.min.js"></script>
  <script>

    const tabPresidencia = new Tab('#tab-presidencia');
    const tabTesouraria = new Tab('#tab-tesouraria');
    const tabConselhoFiscal = new Tab('#tab-conselho-fiscal');
   function Tab (node) {
  if (!node || typeof node !== 'string' || !node.startsWith('#')) return

  const dataTarget = [...document.querySelectorAll(`${node} [data-tab-target]`)]

  dataTarget.forEach(function (button) {
    const { tabTarget } = button.dataset

    button.addEventListener('click', function () {
      const oldButtonActive = document.querySelector(`${node} .btn.active`)
      const oldTabActive = document.querySelector(`${node} .tab-content.active`)
      const newTabActive = document.querySelector(tabTarget)
      
      // toggle button active
      oldButtonActive.classList.remove('active')
      this.classList.add('active')

      // toggle tab content
      oldTabActive.classList.remove('active')
      newTabActive.classList.add('active')
    })
  })
}

  </script>

</body>

</html>
