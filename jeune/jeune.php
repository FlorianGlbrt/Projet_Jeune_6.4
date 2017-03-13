<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Jeune 6.4 - Jeune</title>
	<meta charset="utf-8"/>
	<script type="text/javascript" src="jeune.js"></script>
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


<body onload="remplis(<?php echo $id ?>)">

	<!-- Entête et menu horizontal -->

	<div class="container-fluid top jeune">
    <a href="accueil.php">
      <img class="logo" src="images/logo.png" width="17%"/>
    </a>
    <div class="right wide">
				<h2>JEUNE</h2>
        <h3>Je donne de la valeur à mon engagement</h3>
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
	        <li class="jeuneactive"><a href="moncompte.php">Jeune</a></li>
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
						}
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

	<!-- Formulaire de demande de référence pour le jeune -->

	<div class="container-fluid">
	  <div class="row content">
			<div class="text-center" style="color : #c30476;">Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</div><br>
	    <div class="col-sm-2">

	    </div>
	    <div class="col-sm-8">
				<div class="text-center">

				<form class="form-inline" role="form" onsubmit="return valid();" action="jeune2.php" method="POST">

				 <div class="form-group">
				 	<input type="text" id="id" name="id" value="<?php echo $_SESSION['id']; ?>" hidden/>
					 <label class="control-label" for="name">Nom</label><br>
					 	<input type="text" class="form-control" id="Nom" name="Nom" value="<?php echo $_SESSION['Nom']; ?>" placeholder="Entrer votre Nom" disabled/>
						<div id="nomEd"></div>
					</div><br>
					<div class="form-group">
						<label class="control-label" for="nickname">Prénom</label><br>
						<input type="text" class="form-control" id="Prenom" name="Prenom" value="<?php echo $_SESSION['Prenom']; ?>" placeholder="Entrer votre Prénom" disabled/>
						<div id="prenomEd"></div>
					</div><br>
					 <div class="form-group">
	 					<label class="control-label" for="birth">Date de naissance</label><br>
	 					<input type="text" class="form-control" id="jour" name="jour" size="2" maxlength="2" value="" disabled>
	 					<input type="text" class="form-control" id="mois" name="mois" size="2" maxlength="2" value="" disabled>
	 					<input type="text" class="form-control" id="annee" name="annee" size="4" maxlength="4" value="" disabled>

	 				</div><br>
					 <div class="form-group">
	 					<label class="control-label" for="mail">Email</label><br>
						<input type="email" class="form-control" id="Mail" name="Mail" placeholder="Entrer votre Email" disabled/>
	 					<div id="mailEd"></div>
	 				</div><br>
					<div class="form-group">
						<label class="control-label" for="social">Reseau social</label><br>
						<input type="text" class="form-control" id="Reseau" name="Reseau" placeholder="Entrer votre Réseau social"/>
						<div id="reseauEd"></div>
					</div><br>
					<div class="form-group">
						<label class="control-label" for="engagmnt">Engagement</label><br>
						<input type="text" class="form-control" id="Engagement" name="Engagement" placeholder="Entrer votre Engagement"/>
						<div id="engagementEd"></div>
					</div><br>
					<div class="form-group">
						<label class="control-label" for="time">Durée</label><br>
						<div class="form-group">
							<input type="tel" class="form-control" id="jourE" name="jourE" size="2" maxlength="2" placeholder="Jours"/>/
							<input type="tel" class="form-control" id="moisE" name="moisE" size="2" maxlength="2" placeholder="Mois"/>/
							<input type="tel" class="form-control" id="anneeE" name="anneeE" size="4" maxlength="4" placeholder="Années"/>

						</div>
						<div id="dureeE"></div>

					</div>
				</div>
				</div>
	    <div class="col-sm-2">
				<div class="form-group"> <!-- partie mes savoir être à mettre sur la droite -->
					<h4 style="color : #c30476; font-weight: bold;">MES SAVOIRS ÊTRE</h4>
					<div style="background-image: url(images/fondjesuis.png); background-size: cover; text-align: right; color : white; font-size : 20px;"> Je suis*</div>
					<div style="background-image: url(images/fondjeunedr.png); background-size: cover;">
						<input type = "checkbox" class = "box" value="01" onclick="check(this)" /> autonome<br>
						<input type = "checkbox" class = "box" value="02" onclick="check(this)" /> organisé<br>
						<input type = "checkbox" class = "box" value="03" onclick="check(this)" /> passioné<br>
						<input type = "checkbox" class = "box" value="04" onclick="check(this)" /> fiable<br>
						<input type = "checkbox" class = "box" value="05" onclick="check(this)" /> patient<br>
						<input type = "checkbox" class = "box" value="06" onclick="check(this)" /> réfléchi<br>
						<input type = "checkbox" class = "box" value="07" onclick="check(this)" /> responsable<br>
						<input type = "checkbox" class = "box" value="08" onclick="check(this)" /> sociable<br>
						<input type = "checkbox" class = "box" value="09" onclick="check(this)" /> optimiste<br>
						<input type = "checkbox" class = "box" value="10" onclick="check(this)" /> à l'écoute<br>
					</div>
					<br>
					<div style="color : #c30476;">*4 choix maximum</div><br>
					<input type="text" id="jeSuis" name="jeSuis" hidden>
					<input class="jeunevalide btn btn-button" type="submit" value="Valider" >
				</div>
	    </div>
			</form>

		<br>
	</div>
	<footer class="container-fluid text-center">
	<p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
	Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
	Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
	</footer>
</div>

</body>
</html>
