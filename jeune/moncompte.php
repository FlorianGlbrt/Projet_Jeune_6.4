<?php session_start();
include("bdd.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Jeune 6.4 - Mon compte</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="consultant.js"></script>
	<script type="text/javascript" src="moncompte.js"></script>
	<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="scripts.js"></script>
	<link rel="stylesheet" href="accueil.css" media="screen" title="no title" charset="utf-8">

	<script type="text/javascript"> function jeune() {window.location = "jeune.php"}</script>

</head>


	<!-- Vérifie si un utilisateur est connecté -->

<?php 	if (isset($_SESSION["Nom"])) {
			$nom = $_SESSION["Nom"];
		}
		if (isset($_SESSION["Prenom"])) {
			$Prenom = $_SESSION["Prenom"];
		}
		if (isset($_SESSION["id"])) {
			$id =$_SESSION["id"];
		}else {$id =0; $_SESSION["id"] =$id;}

 ?>

<body onload="verifconnect(<?php echo $id; ?>)">

	<!-- Entête et menu horizontal -->
	
	<div class="container-fluid top jeune">
    <a href="accueil.php">
      <img src="images/logo.png" class="logo" width="17%"/>
    </a>
    <div class="right wide">
				<h2>Mon compte</h2>
        <h3>Je donne de la valeur à ton engagement</h3>
				<?php if ($_SESSION['id'] != 0){
        echo "<label id = 'blocknom'>Bonjour, &nbsp".$_SESSION['Prenom']."&nbsp".$_SESSION['Nom']."</label>";
        }else{
        echo "<label id = 'blocknom'>Bienvenue ! </label>";
				}?>
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
				<?php if ($_SESSION['id'] == 0){ ?>
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
				<?php ;}else{ ?>
					<li><a href="#" onclick="deco()"><span class="glyphicon glyphicon-log-out"></span> Se deconnecter</a></li>
				<?php ;} ?>
      </ul>
    </div>
  </div>
</nav>
		
		<!-- Affiche 2 boutons , Celui pour ajouter un engagement et celui pour télécharger ses engagements. On a ensuite écrit le Code Jeune du jeune  -->


	<div class="container-fluid text-center">
		<div class="col-md-4">
			<input class="jeunevalide btn btn-button" type="button" value="Ajouter un engagement" onclick="jeune()" />
		</div>
		<div class="col-md-4">
			<input class="jeunevalide btn btn-button" type="button" value="Télécharger mes engagements (PDF)" onclick="pdf('<?php echo $id; ?>')" />
		</div>
		<div class="col-md-4">
			<label class="jeunevalide btn btn-button"> Votre Code Jeune : <?php echo $id ; ?> </label>
		</div>
	</div>



	<div class ="container">

			<!-- Affichage de tous les engagements validés du jeune après recherche dans la BDD --> 

			<div class="text-center"> <h3> Vos engagements validés </h3> </div>
    	<?php
    		try {

	        $reponse1 = $bdd->prepare('SELECT * FROM jeune WHERE id=:tag');
	        $reponse1->execute(array(
	                    'tag' => $id,
	                    ));

	            while ($donnee1 = $reponse1->fetch()) {
	                $nom = $donnee1['nom'];
	                $prenom = $donnee1['prenom'];
	                $annee = $donnee1['annee'];
	                $mois = $donnee1['mois'];
	                $jour = $donnee1['jour'];
	                $email = $donnee1['email'];


	                $reponse = $bdd->prepare("SELECT * FROM expe WHERE tag=:tag AND enCours=0");
	                $reponse->execute(array(
	                    'tag' => $id
	                ));

	            while ($donnee = $reponse->fetch()) {
	            $jesuis = $donnee['jesuis'];
	            $ilest = $donnee['ilest'];
	               ?>
									 <div class="container">
									 	<div class="row content rowbulle">
									 	<div class="col-md-6 jeunebulle dimensionextensible">
												<div class="col-md-8 dimensionextensible">
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
												<div class="col-md-4 dimensionextensible">
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
												<div class="col-md-6 referentbulle dimensionextensible">
												<div class="col-md-8 dimensionextensible">
											 	<h3 style="color: white;">R&EacuteF&EacuteRENT</h3><br><br>
					                 <?php  echo "<label style='color:white;'>Nom : </label>".$donnee['nomR']."<br>";
					                        echo "<label style='color:white;'>Prénom : </label>".$donnee['prenomR']."<br>";
					                        echo "<label style='color:white;'>Mail : </label>".$donnee['mailR']."<br>";
					                        echo "<label style='color:white;'>Réseau social : </label>".$donnee['reseauR']."<br>";
					                        echo "<label style='color:white;'>Entreprise : </label>".$donnee["entreprise"]."<br>";
					                        echo "<label style='color:white;'>Durée : </label>".$donnee['anneeR']." an(s) ".$donnee['moisR']." mois ".$donnee['jourR']." jour(s)<br>";
					                        echo "<label style='color:white;'>Commentaire : </label>".$donnee["commentaire"];
					                  	?>
					                  	</div>
					                  	<?php

					                  	if ($ilest != "") {  ?>



												<div class="col-md-4 dimensionextensible">
	                       						 <br>
													<div class="form-group">
	                        <div style="background-image: url(images/refjeconf.png); background-size: cover; text-align: right; color : white; font-size : 20px;"> Je confirme sa(son)*</div>
	                        <div style="background-image: url(images/fondrefdr.png); background-size: cover;">
	                        <?php }
	                               while ( $donnee['ilest'] != "") {
	                                    $temp = substr($donnee['ilest'], 0,2);
	                                    $donnee['ilest'] = substr($donnee['ilest'],2);
	                                    if ($temp == "01") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> ponctualité <br>";
	                                    }
	                                    if ($temp == "02") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> confiance <br>";
	                                    }
	                                    if ($temp == "03") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> respect <br>";
	                                        }
	                                    if ($temp == "04") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> sérieux <br>";
	                                    }
	                                    if ($temp == "05") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> honnêteté <br>";
	                                    }
	                                    if ($temp == "06") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> tolérance <br>";
	                                    }
	                                    if ($temp == "07") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> bienveillance <br>";
	                                    }
	                                    if ($temp == "08") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> impartialité <br>";
	                                    }
	                                    if ($temp == "09") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> travail <br>";
	                                    }
	                                    if ($temp == "10") {
	                                        echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> juste <br>";
	                                    }
	                                        }

	                    if ($ilest != "") {  ?>
	                        </div>
	                        <br>
	                        </div>
	              			</div>
	                        </div>
	                <?php } ?>
	                		</div>
							</div>
							<br>
							<div class="text-center">  <!-- Bouton pour supprimer cet engagement -->
								<input class="jeunevalide btn btn-button" type="button" value="Supprimer cet engagement" onclick= "supprimer(<?php echo $donnee['id'];?>)" />
							</div>
							<?php
	                    echo "<br><br><br>";
	                }
	            }


	            	//Affichage de tous les engagements en attente du jeune après recherche dans la BDD

		$reponse = $bdd->prepare("SELECT * FROM expe WHERE tag=:tag AND enCours=1");
	                $reponse->execute(array(
	                    'tag' => $id
	                ));

									?> <div class="text-center"> <h3> Vos engagements en attente </h3> </div> <?php
						 while ($donnee = $reponse->fetch()) {
								    $jesuis = $donnee['jesuis'];
								    $ilest = $donnee['ilest'];
								       ?>
									 <div class="container">
									 	<div class="row content rowbulle">
									 	<div class="col-md-6 jeunebulle dimensionextensible">
												<div class="col-md-8 dimensionextensible">
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
												<div class="col-md-4 dimensionextensible">
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



					<br>
					<div class="text-center"> <!-- Bouton pour supprimer cet engagement-->
								<input class="jeunevalide btn btn-button" type="button" value="Supprimer cet engagement" onclick= "supprimer(<?php echo $donnee['id'];?>)" />
							</div>
		<?php


	        }
		} catch (Exception $e) {
	                die('Erreur : '.$e->getMessage());
	            }
      	?>
	</div>



</div>




<footer class="container-fluid text-center">
	<p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
</footer>
</body>
</html>
