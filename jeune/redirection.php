<?php session_start()?>

<!DOCTYPE html>
<html>
<head>
  <title>Jeune 6.4 - Accueil</title>
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
      <img class="logo" src="images/logo.png" width="17%"/>
    </a>
    <div class="right wide">
				<h2>ACCUEIL</h2>
        <h3>Pour faire de l'engagement une valeur</h3>
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
        <a class="navbar-brand active" href="accueil.php"><span class="glyphicon glyphicon-home" style="color: white;"></span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="moncompte.php">Jeune</a></li>
          <li><a href="referent.php">Référent</a></li>
          <li><a href="consultant.php">Consultant</a></li>
          <li><a href="partenaire.php">Partenaire</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
  					<li><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Centre de la page, demande les identifiants du jeune pour pouvoir accéder à la page moncompte-->

  <div class="container">
    <div class="row content">
      <div class="text-center">
        Vous n'êtes pas connecté(e), veuillez vous identifier afin de pouvoir accéder à votre compte jeune.</div><br>
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
          <div class="text-center">
              <form class="form-inline">
                <div class="form-group">
                  <label class="control-label" for="identifiant">Identifiant</label><br>
                  <input type="text" class="form-control" name="username" id="login" placeholder="Identifiant"><div id="eLogin"></div>
                </div>
                 <br>
                <div class="form-group">
                  <label class="control-label" for="password">Mot de passe</label><br>
                  <input type="password" class="form-control" name="password" id="pass" placeholder="Mot de passe"><div id="ePass"></div>
                </div><br><br>
                <button class="btn btn-lg btn-primary" type="button" value="submit" onclick="loginin('moncompte.php')"> Je me connecte</button>
              </form><br>
              ou vous
              <a href="inscription.php"><span class="glyphicon glyphicon-user"></span> inscrire</a>
              </div>
        </div>
        <div class="col-md-2">

        </div>
      </div>
  </div>
  <br><br>
  <footer class="container-fluid text-center">
    <p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
  Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
  Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
  </footer>
  </div>
  <div id="vide">

  </div>
</body>
</html>
