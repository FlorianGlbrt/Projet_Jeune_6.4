<?php

session_start();

// Réinitialise les variables de session quand on se déconnecte

$_SESSION["id"] = 0;
$_SESSION["Prenom"] = "";
$_SESSION["Nom"] = "";

?>
