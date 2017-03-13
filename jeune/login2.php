<?php session_start();
include("bdd.php");


	try{

        // Vérificaiton si le login entré correspond bien au mot de passe associé

    	$reponse = $bdd->prepare("SELECT pass FROM jeune WHERE login=:login");
    	$reponse->execute(array('login' => $_POST['login']));
 	  	$donnee = $reponse->fetch();

    	if($_POST['pass'] == $donnee['pass']){
    		echo "ok";

            // Récupérations des informations du jeune pour les variables de session

    	$reponse2 = $bdd->prepare("SELECT nom, prenom, id FROM jeune WHERE login=:login");
    	$reponse2->execute(array('login' => $_POST['login']));
    	$donnee2 = $reponse2->fetch();

    	$_SESSION['Nom'] = $donnee2['nom'];
    	$_SESSION['Prenom'] = $donnee2['prenom'];
    	$_SESSION['id'] = $donnee2['id'];








    	}else{
    		echo "non";
    	}


    }
	catch(Exception $e){
		die('Erreur : '. $e->getMessage());
	}

?>
