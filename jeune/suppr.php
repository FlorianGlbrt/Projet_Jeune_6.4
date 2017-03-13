  <?php
 include('bdd.php');


//Supprime l'engagement dans la BDD

try{

 $reponse = $bdd->prepare('DELETE FROM expe WHERE id='.$_POST["id"]);
 $reponse->execute();

} catch(Exception $e) {die ('Erreur :'. $e->getMessage());}
?> 
