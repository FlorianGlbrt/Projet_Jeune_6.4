<?php
include("bdd.php");

	try{

		// Récupère la date de naissance et le mail du jeune dans la BDD


       	$codes = $bdd->prepare("SELECT jour, mois, annee, email FROM jeune WHERE id=:id");
      	$codes->execute(array('id' => $_POST['id']));
        $reponse = $codes->fetch();

        echo $reponse['jour'].";".$reponse['mois'].";".$reponse['annee'].";".$reponse['email'];
    }
    catch(Exception $e){
        die('Erreur : '. $e->getMessage());
    }



 ?>