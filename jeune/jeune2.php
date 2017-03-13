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

<?php	 $nom = $_SESSION["Nom"];
			$Prenom = $_SESSION["Prenom"];
 ?>

<body>

	<!-- Entête et menu horizontal -->

	<div class="container-fluid top jeune">
    <a href="accueil.php">
      <img class="logo" src="/images/logo.png" width="17%"/>
    </a>
    <div class="right wide">
				<h2>JEUNE</h2>
        <h3>Je donne de la valeur à mon engagement</h3>
				<?php if ($_SESSION['id'] != 0){
				echo "<label id = 'blocknom'>Bonjour, &nbsp".$_SESSION['Prenom']."&nbsp".$_SESSION['Nom']."</label>";
        }else{
        echo "<label id = 'blocknom'>Bienvenue ! </label>";
				}?>
		</div>
  </div>
<div class="fondecran">
	<nav class="navbar navbar-inverse ">
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
		          <div class="dropdown-menu" style="padding: 30px;">
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

	<!-- Récapitulatif des informations de la demande du jeune, demande du mail du référent et confirmation -->

	<div class="container-fluid">
	  <div class="row content">
			<div class="text-center" style="color : #c30476;">Décrivez votre expérience et mettez en avant ce que vous en avez retiré.</div><br>
	    <div class="col-sm-2">

	    </div>
	    <div class="col-sm-8">
				<div class="text-center">
				<form class="form-inline" role="form">
				 <div class="form-group">
				 	<input type="text" id="id" name="id" value="<?php echo $_SESSION['id']; ?>" hidden/>
					 <label class="control-label" for="name">Nom : </label>
						<input type="text" id="Nom" name="Nom" value="<?php echo $_POST['Nom']; ?>" placeholder="Entrer votre Nom" hidden />
						<?php echo $_POST['Nom'];?>
					</div><br>
					<div class="form-group">
						<label class="control-label" for="nickname">Prénom : </label>
						<input type="text" id="Prenom" name="Prenom" value="<?php echo $_POST['Prenom']; ?>" placeholder="Entrer votre Prénom" hidden/>
						<?php echo $_POST['Prenom'];?>
					</div><br>
					 <div class="form-group">
	 					<label class="control-label" for="birth">Date de naissance : </label>
	 					<input type="tel" id="Jour" name="Jour" value="<?php echo $_POST['jour']; ?>" placeholder="JJ" hidden/>
	 					<input type="tel" id="Mois" name="Mois" value="<?php echo $_POST['mois']; ?>" placeholder="MM" hidden/>
	 					<input type="tel" id="Annee" name="Annee" value="<?php echo $_POST['annee']; ?>" placeholder="AAAA" hidden/>
						<?php echo $_POST['jour']."/".$_POST['mois']."/".$_POST['annee'];?>
	 				</div><br>
					 <div class="form-group">
	 					<label class="control-label" for="mail">Email : </label>
	 					<input type="email" id="Mail" name="Mail" value="<?php echo $_POST['Mail'] ?>" placeholder="Entrer votre Email" hidden/>
	 					<?php echo $_POST['Mail'];?>
	 					<div id="mailE"></div>
	 				</div><br>
					<div class="form-group">
						<label class="control-label" for="social">Reseau social : </label>
						<input type="text" id="Reseau" name="Reseau" value="<?php echo $_POST['Reseau'] ?>" placeholder="Entrer votre Réseau social" hidden/>
						<?php echo $_POST['Reseau'];?>
					</div><br>
					<div class="form-group">
						<label class="control-label" for="engagmnt">Engagement : </label>
						<input type="text" id="Engagement" name="Engagement" value="<?php echo $_POST['Engagement']?>" placeholder="Entrer votre Engagement" hidden/>
						<?php  echo $_POST['Engagement']; ?>
					</div><br>
					<div class="form-group">
						<label class="control-label" for="time">Durée : </label>
						<input type="tel" id="anneeE" name="anneeE" value="<?php echo $_POST['anneeE'] ?>" size="4" maxlength="4" placeholder="AAAA" hidden/>
						<input type="tel" id="moisE" name="moisE" value="<?php echo $_POST['moisE'] ?>" size="2" maxlength="2" placeholder="MM" hidden/>
						<input type="tel" id="jourE" name="jourE" value="<?php echo $_POST['jourE'] ?>" size="2" maxlength="2" placeholder="JJ" hidden>
						<?php echo $_POST['anneeE']." ans, ".$_POST['moisE']." mois, ".$_POST['jourE']." jours";?>
					</div><br>
					<div class="form-group">
						<label class="control-label" for="time">Mail du référent :</label>
						<input type="text" class="form-control" id="MailR" name="MailR" placeholder="Entrez le mail du référent"/>
						<div id="mailRE"></div>
					</div>
				</div>
				</div>
	    <div class="col-sm-2">
				<div class="form-group">
				  <!-- partie mes savoir être à mettre sur la droite -->
					<h4 style="color : #c30476; font-weight: bold;">MES SAVOIRS ÊTRE</h4>
					<div style="background-image: url(/images/fondjesuis.png); background-size: cover; text-align: right; color : white; font-size : 20px;"> Je suis*</div>
					<div style="background-image: url(/images/fondjeunedr.png); background-size: cover;">
						<?php $jeSuis = $_POST['jeSuis'];

							while($jeSuis != ""){
								$temp = substr($jeSuis, 0,2);
								$jeSuis = substr($jeSuis, 2);

								if($temp =="01"){
									echo "<input type = 'checkbox' class = 'box' value='01' disabled checked /> autonome <br>";
								}
								if($temp =="02"){
									echo "<input type = 'checkbox' class = 'box' value='02' disabled checked /> organisé<br>";
								}
								if($temp =="03"){
									echo "<input type = 'checkbox' class = 'box' value='03' disabled checked /> passioné<br>";
								}
								if($temp =="04"){
									echo "<input type = 'checkbox' class = 'box' value='04' disabled checked /> fiable<br>";
								}
								if($temp =="05"){
									echo "<input type = 'checkbox' class = 'box' value='05' disabled checked /> patient<br>";
								}
								if($temp =="06"){
									echo "<input type = 'checkbox' class = 'box' value='06' disabled checked /> réfléchi<br>";
								}
								if($temp =="07"){
									echo "<input type = 'checkbox' class = 'box' value='07' disabled checked /> responsable<br>";
								}
								if($temp =="08"){
									echo "<input type = 'checkbox' class = 'box' value='08' disabled checked /> sociable<br>";
								}
								if($temp =="09"){
									echo "<input type = 'checkbox' class = 'box' value='09' disabled checked /> optimiste<br>";
								}
								if($temp =="10"){
									echo "<input type = 'checkbox' class = 'box' value='10' disabled checked /> à l''écoute<br>";
								}
							}

						?>
						<input type="text" id="jeSuis" name="jeSuis" value ="<?php echo $_POST['jeSuis']; ?>" hidden>
						</div>

					<br>
					</div>
					<input class="jeunevalide btn btn-button" type = "button" value="Valider" onclick="demande()">
	    </div>
			</form>
	  </div>
		<br>
		<div id="vide"></div>
	</div>
	<footer class="container-fluid text-center">
	<p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
	Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
	Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
	</footer>
</div>

</body>
</html>
