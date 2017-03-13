<?php session_start();
require 'PHPMailer-master/PHPMailerAutoload.php';
include("bdd.php");
$e = e; //utf8_decode('é');
$c = c; //utf8_decode('ç');

    // Fonction qui génère un code de 10 caractères

	function randomString(){
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randstring = '';
	    for ($i = 0; $i < 10; $i++) {
	        $randstring .= $characters[rand(0, strlen($characters))];
	    }
	    return $randstring;
	}

	try{

       	$codes = $bdd->prepare("SELECT code FROM expe");
      	$codes->execute();

      	$ok = false;

        // Vérification dans la BDD si le code n'existe pas déjà


      	while(!$ok){
	       	$newCode = randomString();
	       	$ok = true;
	       	while ($donnee=$codes->fetch()) {
	       		if($donnee['code'] = $newCode){
	       			$ok = false;
	       		}
	        }
   		}

        // Insertion des informations de la demande du jeune dans la BDD

            $reponse = $bdd->prepare("INSERT INTO expe (tag, reseau, jour, mois, annee, engagement, mailR, jesuis, enCours, code)
                VALUES(:tag, :reseau, :jour, :mois, :annee,:engagement, :mailR, :jeSuis, :enCours, :code)");
            $reponse->execute(array(
                    'tag' => $_POST['id'],
                    'reseau' => $_POST['reseau'],
                    'jour' => $_POST['jour'],
                    'mois' => $_POST['mois'],
                    'annee' => $_POST['annee'],
                    'engagement' => $_POST['engagement'],
                    'jeSuis' => $_POST['jeSuis'],
                    'mailR' => $_POST['mailR'],
                    'enCours' => 1,
                    'code' => $newCode,
                ));


          $envoiemail = $bdd->prepare('SELECT * FROM jeune WHERE id=:id');
          $envoiemail->execute(array(
                      'id' => $_POST["id"],
                      ));

          $donnee = $envoiemail->fetch();
          $mail = new PHPMailer;

          // Envoi du mail au référent



      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com' ;
      $mail->SMTPAuth = true;
      $mail->Username = 'supp.jeune64@gmail.com';
      $mail->Password = 'jeanflomik';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 587;

      $mail->setFrom('supp.jeune64@gmail.com', 'support_jeune6.4');
      $mail->addAddress($_POST['mailR'], '');

      $mail->isHTML(true);

      $mail->Subject = 'Demande de R'.$e.'f'.$e.'rence';
      $mail->Body = "Bonjour, votre entreprise a re".$c."u une demande de r".$e."f".$e."rence envoy".$e."e par ".$donnee["nom"]." ".$donnee["prenom"]." .
               Pour compl".$e."ter son engagement, veuillez cliquer sur ce lien <a href = 'http://127.0.0.1:8008/referent2.php?code=".$newCode."'>http://127.0.0.1:8008/referent2.php?code=".$newCode."</a> ou
               utilisez le code suivant dans l'onglet r".$e."f".$e."rent de notre <a href='http://127.0.0.1:8008/accueil.php'>site</a> : ".$newCode ;


      if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo '';
      }




    }
catch (Exception $e) {
  die('Erreur : '.$e->getMessage());
}


 ?>
