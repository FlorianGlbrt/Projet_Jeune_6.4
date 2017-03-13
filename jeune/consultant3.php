<?php
include('bdd.php');
    try {

        //Affiche les différentes personnes ayant le même nom et prénom cherché, et demande de cliquer sur la bonne en fonction de sa date de naissance

        $verify = $bdd->prepare('SELECT EXISTS(SELECT * FROM jeune WHERE nom=:nom AND prenom=:prenom) AS article_exists');
        $verify->execute(array(
                'nom' => $_POST['Nom'],
                'prenom' => $_POST['Prenom'],
            ));
        $verify2 = $verify->fetch();
        if ($verify2['article_exists'] == 1) {
          ?>
          <br>
            <div class="container">
              <div class="row content">
                <div class="text-center">
                  <div class="col-md-3">

                  </div>
                <div class="consultantbulle col-md-6">
                  <?php
                  echo  '<h3>Resultat de votre recherche</h3><br><br>';

            $reponse = $bdd->prepare('SELECT * FROM jeune WHERE nom=:nom AND prenom=:prenom');
            $reponse->execute(array(
                    'nom' => $_POST['Nom'],
                    'prenom' => $_POST['Prenom'],
                    ));
            while ($donnee = $reponse->fetch()) {
                      $nom = $donnee['nom'];
                      $prenom = $donnee['prenom'];
                      $annee = $donnee['annee'];
                      $mois = $donnee['mois'];
                      $jour = $donnee['jour'];

                      $email = $donnee['email'];
                      echo   $donnee['civil'].".  ".$_POST['Nom']."  ".$donnee['prenom']." Né le : ".$donnee['jour']."/".$donnee['mois']."/".$donnee['annee']."<br><br><input type='button' class='btn btn-defaut consultantvalide' value='Valider' onclick=\"engagements2(".$donnee['id'].",'".$nom."','".$prenom."',".$annee.",".$mois.",".$jour.",'".$email."')\" /> ";
                    	echo "<br><br><br>";
            }?>

        </div>
        <div class="col-md-3">

        </div>
        </div>
        </div>
      </div>

    <?php
        }
    } catch (Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
?>
