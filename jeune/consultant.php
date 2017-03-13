<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Jeune 6.4 - Consultant</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="consultant.js"></script>
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

	<div class="container-fluid consultant top">
    <a href="accueil.php">
      <img src="images/logo.png" class="logo" width="17%"/>
    </a>
    <div class="right wide">
				<h2>CONSULTANT</h2>
        <h3>Je donne de la valeur à ton engagement</h3>

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
        <li class="consultantactive"><a href="consultant.php">Consultant</a></li>
        <li><a href="partenaire.php">Partenaire</a></li>
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

<!-- Bloc demandant les informations pour pouvoir afficher les engagements du jeune -->

<div class="container">
	<div class="row content">
		<div class="text-center" style="color : #009fe3;">Recherchez les diffrérents engagements d'une jeune grâce à son nom ou a son Code Jeune.</div><br>
		<div class="col-md-2">

		</div>
		<div class="col-md-3">
			<form class="form-group">
				Nom <br><input type="text" size="10" class="form-control" size="2" id="Nom" name="Nom"/><br>
				Prénom <br><input type="text" size ="10" class="form-control" id="Prenom" name="Prenom"/><br>
			</form>
			<input class="consultantvalide btn btn-defaut" type="button" value="Rechercher" onclick="engagements()" ><br>
		</div>
		<div class="col-md-2 text-center">
			<h3>ou</h3>
		</div>
		<div class="col-md-3">
			<form class="form-group">
				Code Jeune <br> <input type="text" class="form-control" id="tag" name="tag"/><br>
			</form>
			<input class="consultantvalide btn btn-defaut" type="button" value="Rechercher avec code Jeune" onclick="engagementstag()" >
			</div>
			<div class="col-md-2">

			</div>
	</div>



<br><br>
<div id="engagement"></div>
</div>
<br><br><br>

<footer class="container-fluid text-center">
	<p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
</footer>
</body>
</html>
