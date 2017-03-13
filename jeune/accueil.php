<?php session_start();?>

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


<!-- Corps, informations sur jeune -->

		<div class="container">
		  <div class="row content">
		    <div class="col-sm-4">
		      <h2>De quoi s’agit-il ?</h2>
		      <p>
			D’une opportunité : celle qu’un engagement quel qu’il soit puisse être
			considérer à sa juste valeur !
			Toute expérience est source d’enrichissement et doit d’être reconnu
			largement.
			Elle révèle un potentiel, l’expression d’un savoir-être à concrétiser.
		      </p>
		    </div>
		    <div class="col-sm-4">
		      <h2>A qui s’adresse-t’il ?</h2>
		      <p>
			A vous, jeunes entre 16 et 30 ans, qui vous êtes investis spontanément
			dans une association ou dans tout type d’action formelle ou informelle, et
			qui avez partagé de votre temps, de votre énergie, pour apporter un
			soutien, une aide, une compétence.
		      </p>
		      <p>
			A vous, responsables de structures ou référents d’un jour, qui avez
			croisé la route de ces jeunes et avez bénéficié même ponctuellement de
			cette implication citoyenne !
			C’est l’occasion de vous engager à votre tour pour ces jeunes en confirmant
			leur richesse pour en avoir été un temps les témoins mais aussi les
			bénéficiaires !
		      </p><br>
		    </div><br><br>
		    <div class="col-sm-4">
		      <h2> </h2>
		      <p>
			A vous, employeurs, recruteurs en ressources humaines, repré-
			sentants d’organismes de formation, qui recevez ces jeunes, pour un
			emploi, un stage, un cursus de qualification, pour qui le savoir-être constitue
			le premier fondement de toute capacité humaine.
		      </p><br>
		      <p>
			Cet engagement est une ressource à valoriser au fil d'un
			parcours en 3 étapes :
		      </p>
		    </div>
		  </div>
		  <div style="text-align: center;">
		      <img src="images/1etape.png"/> &nbsp
		      <img src="images/2etape.png"/> &nbsp
		      <img src="images/3etape.png"/> &nbsp
		</div>
		</div>
		<br><br>
		<footer class="container-fluid text-center">
		  <p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
		Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
		Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
		</footer>
		</div>
		</body>
		</html>
