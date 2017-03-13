<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
  <title>Jeune 6.4 - Partenaire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
  <script type="text/javascript" src="jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
  <script type="text/javascript" src="scripts.js"></script>
	<link rel="stylesheet" href="accueil.css" media="screen" title="no title" charset="utf-8">

</head>

  <!-- Vérifie si un utilisateur est connecté -->


<?php   if (isset($_SESSION["Nom"])) {
      $nom = $_SESSION["Nom"];
    }
    if (isset($_SESSION["Prenom"])) {
      $Prenom = $_SESSION["Prenom"];
    }
    if (isset($_SESSION["id"])) {
      $id = $_SESSION["id"];
    }else {$id =0; $_SESSION["id"]=$id;}
 ?>

<body>

  <!-- Entête et menu horizontal -->

  <div class="container-fluid top accueil">
    <a href="accueil.php">
      <img src="images/logo.png" class="logo" width="17%"/>
    </a>
    <div class="right wide">
				<h2>PARTENAIRES</h2>
        <?php
        if(isset($_SESSION['id'])){
          if ($_SESSION['id'] != 0){
            echo "<label id = 'blocknom'>Bonjour, &nbsp".$_SESSION['Prenom']."&nbsp".$_SESSION['Nom']."</label>";
              }
            }else{
              echo "<label id = 'blocknom'>Bienvenue ! </label>";
        }
      ?>
		</div>
  </div>
<div class="fondecran">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="accueil.php"><span class="glyphicon glyphicon-home" style="color: white;"></span></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="moncompte.php">Jeune</a></li>
        <li><a href="referent.php">Référent</a></li>
        <li><a href="consultant.php">Consultant</a></li>
        <li class="active"><a class="active" href="partenaire.php">Partenaire</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">

				<?php
          if(isset($_SESSION['id'])){
            if ($_SESSION['id'] != 0){ ?>
              <li><a href="#" onclick="deco()"><span class="glyphicon glyphicon-log-out"></span> Se deconnecter</a></li>
            <?php
            }else{ ?>
            <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
              <li class="dropdown" id="menuLogin">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a>
                <div class="dropdown-menu" style="padding: 30px;min-width: 300px;">
                  <div style="color:#909090;">
                    CONNECTEZ-VOUS
                  </div> <br>
                  <form class="form-signin">
                  <input class="form-control" type="text" name="username" id="login" placeholder="Identifiant"><div id="eLogin"></div><br>
                  <input class="form-control" type="password" name="password" id="pass" placeholder="Mot de passe"><div id="ePass"></div><br><br>
                  <button class="btn btn-lg btn-primary btn-block" type="button" value="submit" onclick="loginin('moncompte.php')"> Je me connecte</button>
                  </form>
                </div>
                </li>

          <?php ;}
          }else{ ?>
              <li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
              <li class="dropdown" id="menuLogin">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin"><span class="glyphicon glyphicon-log-in"></span> Se connecter</a>
                <div class="dropdown-menu" style="padding: 30px;min-width: 300px;">
                  <div style="color:#909090;">
                    CONNECTEZ-VOUS
                  </div> <br>
                  <form class="form-signin">
                  <input class="form-control" type="text" name="username" id="login" placeholder="Identifiant"><div id="eLogin"></div><br>
                  <input class="form-control" type="password" name="password" id="pass" placeholder="Mot de passe"><div id="ePass"></div><br><br>
                  <button class="btn btn-lg btn-primary btn-block" type="button" value="submit" onclick="loginin('moncompte.php')"> Je me connecte</button>
                  </form>
                </div>
                </li>
          <?php ;} ?>
      </ul>
    </div>
  </div>
</nav>


<!-- Ajout des liens cliquables des partenaires -->

<div class="container text-center">
    <div class="col-md-2">

    </div>
    <div class="col-md-8 text-center">
      JEUNES 6.4 est un dispositif issu de la charte de l'engagement pour la <br>
      jeunesse signée en 2013 par des partenaires institutionnels...<br><br>
      <ul class="row gallery">
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="http://www.gouvernement.fr/"><img class="img-responsive" src="images/1.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="http://www.aquitaine.fr/"><img class="img-responsive" src="images/2.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="http://www.conseil-general.com/departements/conseils-generaux/conseil-general-pyrenees-atlantiques-departement-64.htm"><img class="img-responsive" src="images/3.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="http://www.msa.fr/lfr"><img class="img-responsive" src="images/4.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="http://www.univ-pau.fr/fr/index.html"><img class="img-responsive" src="images/5.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="http://www.caf.fr/ma-caf/caf-bearn-et-soule/actualites"><img class="img-responsive" src="images/6.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="https://www.caf.fr/ma-caf/caf-du-pays-basque-et-du-seignanx/points-d-accueil/caf-du-pays-basque-et-du-seignanx"><img class="img-responsive" src="images/7.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href="http://www.ameli.fr/#"><img class="img-responsive" src="images/8.png"/></a></li>
        <li class="col-lg-3 col-md-2 col-sm-3 col-xs-4 col-xxs-12"><a href=""><img class="img-responsive" src="images/9.png"/></a></li>
      </ul>
      ...qui ont décidé de mettre en commun leurs actions pour les jeunes <br>
      des pyrénées-Atlantiques.<br><br>
    </div>
    <div class="col-md-2">

    </div>
</div>

<footer class="container-fluid text-center">
  <p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
</footer>

</div>
</body>
</html>
