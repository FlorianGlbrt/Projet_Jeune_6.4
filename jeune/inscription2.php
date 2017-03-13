<?php
include("bdd.php");
require 'PHPMailer-master/PHPMailerAutoload.php';
$e = e; //utf8_decode('é');
$c = c; //utf8_decode('ç');

    try{

      // Vérification dans la BDD si le login et le mail entré n'existent pas déjà

        $verify = $bdd->prepare('SELECT EXISTS(SELECT * FROM jeune WHERE login=:login) AS article_exists');
        $verify->execute(array('login' => $_POST['login']));
        $verify2 = $verify->fetch();

        if ($verify2['article_exists'] != 0) {
            echo '0';
        } else {
            $verifyE = $bdd->prepare('SELECT EXISTS(SELECT * FROM jeune WHERE email=:mail) AS article_exists');
            $verifyE->execute(array('mail' => $_POST['mail']));
            $verifyE2 = $verifyE->fetch();

        if($verifyE2['article_exists']!=0){
            echo "1";
        }else{
          $mail = new PHPMailer;


            // Envoi du mail au jeune et ajout des informations du jeune dans la BDD


          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com' ;
          $mail->SMTPAuth = true;
          $mail->Username = 'supp.jeune64@gmail.com';
          $mail->Password = 'jeanflomik';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;

          $mail->setFrom('supp.jeune64@gmail.com', 'support_jeune6.4');
          $mail->addAddress($_POST['mail'], '');

          $mail->isHTML(true);

          $mail->Subject = "Confirmation d'inscription M/Mme ".$_POST["nom"]." ".$_POST["prenom"];
          $mail->Body = "Bonjour, vous avez bien ".$e."t".$e." inscrit sur notre site Jeune-6.4 <br>
          Votre login : ".$_POST["login"]."<br>
          Votre mot de passe : ".$_POST["pass"]."<br><br> Cordialement, <br> L'".$e."quipe Jeune-6.4" ;


          if(!$mail->send()) {
          echo 'Message could not be sent.';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
          echo '';
          }



            $reponse = $bdd->prepare("INSERT INTO jeune(login, pass, nom, prenom, jour, mois, annee, email, civil)
                VALUES(:login, :pass, :nom, :prenom, :jour, :mois, :annee, :email, :civil)");
            $reponse->execute(array(

                    'login' => $_POST['login'],
                    'pass' => $_POST['pass'],
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'jour' => $_POST['jour'],
                    'mois' => $_POST['mois'],
                    'annee' => $_POST['annee'],
                    'email' => $_POST['mail'],
                    'civil' => $_POST['civ'],

                ));

            echo "ok";

        }

    }




    }
    catch(Exception $e){
        die('Erreur : '. $e->getMessage());
    }

    ?>
