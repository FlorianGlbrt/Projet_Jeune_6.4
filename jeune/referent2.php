<?php session_start();
include("bdd.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jeune 6.4 - Référent</title>
	<meta charset="utf-8"/>
	<script type="text/javascript" src="referent.js"></script>
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


    // Vérification si le code existe dans la BDD

	try {

		$verify = $bdd->prepare('SELECT EXISTS(SELECT * FROM expe WHERE code=:code) AS article_exists');
		$verify->execute(array(
					'code' => $_GET['code'],
					));
	   $verify2= $verify-> fetch();
	   if ($verify2['article_exists'] != 0) {
	   }
	   else { ?><script type="text/javascript">alert("Le code rentré est non valide."); window.location='referent.php';  </script> <?php }

 	}catch (Exception $e) {
				  die('Erreur : '.$e->getMessage());
	}
?>



<body>

	<!-- Entête et menu horizontal -->

	<div class="container-fluid top referent">
		<a href="accueil.php">
			<img src="images/logo.png" class="logo" width="17%"/>
		</a>
		<div class="right wide">
			<h2>REFERENT</h2>
			<h3>Je confirme la valeur de ton engagement</h3>

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
					<li class="referentactive"><a href="referent.php">Référent</a></li>
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

	<!-- Récupération des informations de la demande pour les afficher au référent -->

	<div class="container-fluid">
		<div class="row content">
			<?php
			if ($_GET["code"] != ""){ ?>


			<div class ="container-fluid">
				  <?php
					try {




						$reponse = $bdd->prepare("SELECT * FROM expe WHERE code=:code AND enCours=1");
						$reponse->execute(array(
							'code' => $_GET["code"],
						));



						while ($donnee = $reponse->fetch()) {
							$mailR = $donnee["mailR"];
							$id = $donnee["tag"];
							$reponse1 = $bdd->prepare('SELECT * FROM jeune WHERE id=:tag');
							$reponse1->execute(array(
									'tag' => $donnee['tag'],
									));

							while ($donnee1 = $reponse1->fetch()) {
								$nom = $donnee1['nom'];
								$prenom = $donnee1['prenom'];
								$annee = $donnee1['annee'];
								$mois = $donnee1['mois'];
								$jour = $donnee1['jour'];
								$email = $donnee1['email'];




							$jesuis = $donnee['jesuis'];
							 ?>
				<div class="container">
					<div class="row content rowbulle">
						<div class="col-md-3">

						</div>
						<div class="col-md-6 jeunebulle">
							<div class="col-md-8">
								<h3 style="color: white;">JEUNE</h3><br><br>
								<?php  echo "<label style='color:white;'>Nom : </label>".$nom."<br>";
									echo "<label style='color:white;'>Prénom : </label>".$prenom."<br>";
									echo "<label style='color:white;'>Date de naissance : </label>".$annee."/".$mois."/".$jour."<br>";
									echo "<label style='color:white;'>Mail : </label>".$email."<br>";
									echo "<label style='color:white;'>Réseau social : </label>".$donnee['reseau']."<br>";
									echo "<label style='color:white;'>Engagement : </label>".$donnee["engagement"]."<br>";
									echo "<label style='color:white;'>Durée : </label>".$donnee['annee']." an(s) ".$donnee['mois']." mois ".$donnee['jour']." jour(s)";

								?>
							</div>
							<div class="col-md-4">
								<?php if ($jesuis != "") { ?>

								<br>
								<div class="form-group">
									<div style="background-image: url(images/fondjesuis.png); background-size: cover; text-align: right; color : white; font-size : 20px;"> Je suis*</div>
										<div style="background-image: url(images/fondjeunedr.png); background-size: cover;">
						  					<?php }
													while ( $donnee['jesuis'] != "") {
														$temp = substr($donnee['jesuis'], 0,2);
														$donnee['jesuis'] = substr($donnee['jesuis'],2);
														if ($temp == "01") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> autonome <br>";
														}
														if ($temp == "02") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> organisé <br>";
														}
														if ($temp == "03") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> passioné <br>";
														}
														if ($temp == "04") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> fiable <br>";
														}
														if ($temp == "05") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> patient <br>";
														}
														if ($temp == "06") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> réfléchi <br>";
														}
														if ($temp == "07") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> responsable <br>";
														}
														if ($temp == "08") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> sociable <br>";
														}
														if ($temp == "09") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> optimiste <br>";
														}
														if ($temp == "10") {
															echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> à l'écoute <br>";
														}
													}
									   				if ($jesuis != "") {  ?>
							 			</div>
							  			<br>
							  		</div>
				  					<?php } ?>
					  			</div>
							</div>
							<div class="col-md-3">

							</div>
								 <?php
										echo "<br><br><br>";
									}
								}
							  	}catch (Exception $e) {
									die('Erreur : '.$e->getMessage());
								}
								?>
  						</div>
						</div>
							<?php } ?>
							<br>
							<div class="container-fluid">
								<div class="row content">


									<!-- Formulaire pour le référent -->

									
						<form class="form-inline" role="form" action="referent3.php" method="post" onsubmit="return validR();">
							<div class="text-center" style="color : #13a538;">Confirmez cette expérience et ce que vous avez pu constater au contact de ce jeune.</div><br>
								<div class="col-sm-2 sidenav">
									<div class = "form-group"> <!-- Block à gauche-->
										<label for="comment">Commentaires sur le jeune :</label>
										<textarea type="text" style="width:100%" class="form-control noresize" value="" id="commentaire" name="commentaire" rows="10" placeholder="5000 caractères maximum"></textarea>
									</div>
								</div>
								<div class="col-sm-8">
							  		<div class="text-center">
										<div class="form-group">
											<input type="text" id="code" name="code" value="<?php echo $_GET['code']; ?>" hidden />
										 	<label class="control-label" for="name">Nom</label><br>
										 	<input type="text" class="form-control" id="Nom" name="Nom" value="" placeholder="Entrer votre Nom"/>
										  	<div id="nomE"></div>
										</div><br>
										<div class="form-group">
											<label class="control-label" for="nickname">Prénom</label><br>
											<input type="text" class="form-control" id="Prenom" name="Prenom" value="" placeholder="Entrer votre Prénom"/>
											<div id="prenomE"></div>
										</div><br>
										<div class="form-group">
											<label class="control-label" for="mail">Email</label><br>
											<input type="email" class="form-control" id="Mail" name="Mail" value="<?php echo $mailR ; ?>" placeholder="Entrer votre Email"/>
											<div id="mailE"></div>
										</div><br>
										<div class="form-group">
											<label class="control-label" for="social">Reseau social</label><br>
											<input type="text" class="form-control" id="Reseau" name="Reseau" placeholder="Entrer votre Réseau social"/>
										</div><br>
										<div class="form-group">
											<label class="control-label" for="engagmnt">Entreprise</label><br>
											<input type="text" class="form-control" id="Entreprise" name="Entreprise" placeholder="Entrer votre Présentation"/>
											<div id="entrepriseE"></div>
										</div><br>

										<label class="control-label" for="time">Durée : </label><br>
										<div class="form-group">
											<input type="tel" class="form-control" id="jourE" name="jourE" size="2" maxlength="2" placeholder="Jours"/>/
											<input type="tel" class="form-control" id="moisE" name="moisE" size="2" maxlength="2" placeholder="Mois"/>/
											<input type="tel" class="form-control" id="anneeE" name="anneeE" size="4" maxlength="4" placeholder="Années"/>
										</div>
							  		</div><br>
							 	</div>
								<div class="col-sm-2 sidenav">
							  		<div class="form-group"> <!-- partie ses savoir être -->
										<h4 style="color : #13a538; font-weight: bold;">SES SAVOIRS ÊTRE</h4>
										<div style="background-image: url(images/refjeconf.png); background-size: cover; text-align: right; color : white; font-size : 20px;"> Je confirme sa(son)*</div>
											<div style="background-image: url(images/fondrefdr.png); background-size: cover;">
												<input type = "checkbox" class = "boxR" value="01" onclick="check(this)" /> ponctualité <br>
												<input type = "checkbox" class = "boxR" value="02" onclick="check(this)" /> confiance<br>
												<input type = "checkbox" class = "boxR" value="03" onclick="check(this)" /> respect<br>
												<input type = "checkbox" class = "boxR" value="04" onclick="check(this)" /> sérieux<br>
												<input type = "checkbox" class = "boxR" value="05" onclick="check(this)" /> honnêteté<br>
												<input type = "checkbox" class = "boxR" value="06" onclick="check(this)" /> tolérance<br>
												<input type = "checkbox" class = "boxR" value="07" onclick="check(this)" /> bienveillance<br>
												<input type = "checkbox" class = "boxR" value="08" onclick="check(this)" /> impartialité<br>
												<input type = "checkbox" class = "boxR" value="09" onclick="check(this)" /> travail<br>
												<input type = "checkbox" class = "boxR" value="10" onclick="check(this)" /> juste<br>
												<input type="text" id="ilEst" name="ilEst" hidden/>
											</div>
											<br>
											<div style="color : #13a538;">*4 choix maximum</div><br>
											<input class="referentvalide btn btn-defaut" type="submit" value="Valider">
									  		</div>
										</div>
						  			</div>
									</div>
						  			<br><br>
								</div>
							</div>
							<input type="text" value="<?php echo $id ; ?>" id="id" name="id" hidden>
						</form>
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
