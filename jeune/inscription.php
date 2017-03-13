<?php session_start()?>

<!DOCTYPE html>
<html>
<head>
	<title>Jeune 6.4 - Inscription</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="font-awesome.min.css">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.1/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
  <script type="text/javascript" src="scripts.js"></script>
	<link rel="stylesheet" href="accueil.css" media="screen" title="no title" charset="utf-8">

</head>
<body>

	<!-- Entête et menu horizontal -->

	<div class="container-fluid top accueil">
		<a href="accueil.php">
			<img src="images/logo.png" class="logo" width="17%"/>
		</a>
		<div class="right wide">
				<h2>INSCRIPTION</h2>
		</div>
	</div>
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
				<li><a class="active" href="partenaire.php">Partenaire</a></li>
			</ul>
		</div>
	</div>
	</nav>

	<!-- Formulaire d'inscription -->

	<div class="container">
		<div class="row main">
			<div class="main-login main-center">
				<form class="form-horizontal" id ="lll">
					<div class="col-md-4">

					</div>
					<div class="col-md-4">
					<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Civilité</label>
							<div class="cols-sm-10">
								<div class="input-group">
									Monsieur : <input type="radio" value="M" name ="civ" class="civ" checked> &nbsp  Madame : <input type="radio" value="Mme" name="civ" class="civ">
								</div>
							</div>
					</div>
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Nom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input class="form-control" type="text" id="Nom" name="Nom" placeholder="Entrez votre nom" />
								</div>
								<div id="eNom"></div>
							</div>
					</div>
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Prénom</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input class="form-control" type="text" id="Prenom" name="Prenom" placeholder="Entrez votre prénom"/>
								</div>
								<div id="ePrenom"></div>
							</div>
					</div>
					<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Date de naissance</label>
							<div class="cols-sm-10"><br>
								<div class="input-group">
									<select id="annee" name="annee" onchange="changejour()">
										<?php for ($i = 2016; $i > 1899; --$i) {
						    echo "<option value='$i'> $i </option>";
						}  ?>
									</select>
									<select id="mois" name="mois" onchange="changejour()">
										<option value="1">Janvier</option>
										<option value="2">Fevrier</option>
										<option value="3">Mars</option>
										<option value="4">Avril</option>
										<option value="5">Mai</option>
										<option value="6">Juin</option>
										<option value="7">Juillet</option>
										<option value="8">Août</option>
										<option value="9">Septembre</option>
										<option value="10">Octobre</option>
										<option value="11">Novembre</option>
										<option value="12">Décembre</option>
									</select>
									<select id="jour" name="jour">
										<?php
						                    for ($i = 1; $i < 32; ++$i) {
						                        echo "<option value='$i'> $i </option>";
						                    }
						                 ?>
									</select>
								</div>
							</div>
					</div>
					<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input class="form-control" type="email" id="Mail" name="Mail" placeholder="Entrez votre identifiant"/>
								</div>
								<div id="eEmail"></div>
							</div>
						</div>
					<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Identifiant</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input class="form-control" type="text" name="login" id="loginI" placeholder="Entrez votre identifiant">
								</div>
								<div id="eLoginI"></div>
							</div>
					</div>
					<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Mot de passe</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input class="form-control" type="password" name="pass" id="passI" placeholder="Entrez votre mot de passe">
								</div>
								<div id="ePassI"></div>
							</div>
					</div><br>
					<div class="form-group ">
							<button type="button" class="btn btn-primary btn-lg btn-block login-button" onclick="inscr()">S'inscrire</button>
						</div>
						</div>

				</form>
			</div>
		</div>

	<br><br>
	<footer class="container-fluid text-center">
	  <p>JEUNES 6.4 est un dispositif de valorisation de l’engagement des jeunes en Pyrénées-<br>
	Atlantiques soutenu par l’Etat, le Conseil général, le conseil régional, les CAF Béarn-Soule et <br>
	Pays Basque, la MSA, l’université de Pau et des pays de l’Adour, la CPAM.</p>
	</footer>
	</div>
	<br><br>
	<div id="vide">

	</div>

</body>
</html>
