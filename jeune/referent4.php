<?php
include('bdd.php');
require 'PHPMailer-master/PHPMailerAutoload.php';
$e = e; //utf8_decode('é');
$c = e; //utf8_decode('ç');
	try{

		// Ajout des informations entrées par le référent dans la BDD

        $reponse = $bdd->prepare("UPDATE expe SET nomR=:nom, prenomR=:prenom, mailR=:mail, reseauR=:reseau, code='', entreprise=:entreprise, ilest=:ilest, commentaire=:commentaire, anneeR=:anneeR, moisR=:moisR, jourR=:jourR, enCours=:enCours WHERE code=:code ");
        $reponse->execute(array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
								'mail' => $_POST['mail'],
                'reseau' => $_POST['reseau'],
                'entreprise' => $_POST['entreprise'],
                'ilest' => $_POST['ilEst'],
                'jourR' => $_POST['jour'],
                'moisR' => $_POST['mois'],
                'anneeR' => $_POST['annee'],
                'commentaire' => $_POST['commentaire'],
                'enCours' => 0,
                'code' => $_POST['code'],
                ));




        	// Enovoi du mail au jeune pour lui dire qu'un référent a bien accepté sa demande

		$envoiemail = $bdd->prepare('SELECT email FROM jeune WHERE id=:id');
		$envoiemail->execute(array(
								'id' => $_POST["tag"],
								));

		$donnee = $envoiemail->fetch();
		$mail = new PHPMailer;



		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com' ;
		$mail->SMTPAuth = true;
		$mail->Username = 'supp.jeune64@gmail.com';
		$mail->Password = 'jeanflomik';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('supp.jeune64@gmail.com', 'support_jeune6.4');
		$mail->addAddress($donnee['email'], '');

		$mail->isHTML(true);

		$mail->Subject = 'Validation de votre r'.$e.'f'.$e.'rence';
		$mail->Body = "Bonjour, nous vous confirmons la validation de votre engagement par votre r".$e."f".$e."rent , M/Mme ".$_POST["nom"]." ".$_POST["prenom"]." de l'entreprise ".$_POST['entreprise'].". <br> Cordialement, <br> Le site Jeune-6.4." ;


		if(!$mail->send()) {
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
		echo 'Le mail a bien été envoyé';
		}




		}
		catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
		}



        ?>
