<?php
// Informations de connection a la BDD

	$serveur = 'localhost';
        $base = 'bddjeune';
        $login = 'root';
        $motdepasse = '';
        $bdd = new PDO("mysql:host=$serveur;dbname=$base", $login, $motdepasse);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
