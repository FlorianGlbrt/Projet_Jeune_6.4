<?php
include('bdd.php');
    try {

    	//Récupère et affiche grâce au tag des engagements validés, qui correspond à l'id du jeune (son Code Jeune), tous les engagements validés du jeune


        $reponse = $bdd->prepare("SELECT * FROM expe WHERE tag=:tag AND enCours=0");
        $reponse->execute(array('tag' => $_POST['tag']));



        	while ($donnee = $reponse->fetch()) {
            $jesuis = $donnee['jesuis'];
            $ilest = $donnee['ilest'];
					?>
               <div class="container">
								 <div class="row content rowbulle">
                                     <div class="col-md-6 jeunebulle dimensionextensible">
                                         <div class="col-md-8 dimensionextensible">
                                             <h3 style="color: white;">JEUNE</h3><br><br>

                                             <!-- Affiche les infos du jeune -->

                                                        <?php  echo "<label style='color:white;'>Nom : </label>".$_POST['nom']."<br>";
                                                                echo "<label style='color:white;'>Prénom : </label>".$_POST['prenom']."<br>";
                                                                echo "<label style='color:white;'>Date de naissance : </label>".$_POST['jour']."/".$_POST['mois']."/".$_POST['annee']."<br>";
                                                                echo "<label style='color:white;'>Mail : </label>".$_POST['email']."<br>";
                                                                echo "<label style='color:white;'>Réseau social : </label>".$donnee["reseau"]."<br>";
                                                                echo "<label style='color:white;'>Engagement : </label>".$donnee["engagement"]."<br>";
                                                                echo "<label style='color:white;'>Durée : </label>".$donnee['annee']." an(s) ".$donnee['mois']." mois ".$donnee['jour']." jour(s)";
                                                        ?>
                                         </div>
                                         <div class="col-md-4 dimensionextensible">
								<?php if ($jesuis != "") { ?>

                       <br>
											 <div class="form-group">
											 <div style="background-image: url(/images/fondjesuis.png); background-size: cover; text-align: right; color : white; font-size : 20px;"> Je suis*</div>
											 <div style="background-image: url(/images/fondjeunedr.png); background-size: cover;">
											 <?php }
																		 while ( $donnee['jesuis'] != "") {

																		 //Récupère les savoir êtres du jeune

																			 $temp = substr($donnee['jesuis'], 0,2);
																			 $donnee['jesuis'] = substr($donnee['jesuis'],2);
																			 if ($temp == "01") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> autonome <br>";
																			 }
																			 if ($temp == "02") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> organisé <br>";
																			 }
																			 if ($temp == "03") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> passioné <br>";
																					 }
																			 if ($temp == "04") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> fiable <br>";
																			 }
																			 if ($temp == "05") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> patient <br>";
																			 }
																			 if ($temp == "06") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> réfléchi <br>";
																			 }
																			 if ($temp == "07") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> responsable <br>";
																			 }
																			 if ($temp == "08") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> sociable <br>";
																			 }
																			 if ($temp == "09") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> optimiste <br>";
																			 }
																			 if ($temp == "10") {
																					 echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> à l'écoute <br>";
																			 }
																					 }
												if ($jesuis != "") {  ?>
													 </div>
													 <br>
													 </div>

									 <?php } ?>  </div>
                                                 </div>
                                                  <div class="col-md-6 referentbulle dimensionextensible">
                                         <div class="col-md-8 dimensionextensible">
                                             <h3 style="color: white;">R&EacuteF&EacuteRENT</h3><br><br>

                                             <!-- Affiche les infos du référent -->


                                         <?php  echo "<label style='color:white;'>Nom : </label>".$donnee['nomR']."<br>";
                                                        echo "<label style='color:white;'>Prénom : </label>".$donnee['prenomR']."<br>";
                                                        echo "<label style='color:white;'>Mail : </label>".$donnee['mailR']."<br>";
                                                        echo "<label style='color:white;'>Réseau social : </label>".$donnee['reseauR']."<br>";
                                                        echo "<label style='color:white;'>Entreprise : </label>".$donnee["entreprise"]."<br>";
                                                        echo "<label style='color:white;'>Durée : </label>".$donnee['anneeR']." an(s) ".$donnee['moisR']." mois ".$donnee['jourR']." jour(s)<br>";
                                                        echo "<label style='color:white;'>Commentaire : </label>".$donnee["commentaire"];
                                            ?>
                                         </div>

	                <?php  if ($ilest != "") {  ?>

                      <br>
                      <div class="col-md-4 dimensionextensible">
											<div class="form-group">
											<div style="background-image: url(/images/refjeconf.png); background-size: cover; text-align: right; color : white; font-size : 20px;"> Je confirme sa(son)*</div>
											<div style="background-image: url(/images/fondrefdr.png); background-size: cover;">
											<?php }
														 while ( $donnee['ilest'] != "") {

														 	//Récupère les savoirs êtres mis par le référent

																	$temp = substr($donnee['ilest'], 0,2);
																	$donnee['ilest'] = substr($donnee['ilest'],2);
																	if ($temp == "01") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> ponctualité <br>";
																	}
																	if ($temp == "02") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> confiance <br>";
																	}
																	if ($temp == "03") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> respect <br>";
																			}
																	if ($temp == "04") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> sérieux <br>";
																	}
																	if ($temp == "05") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> honnêteté <br>";
																	}
																	if ($temp == "06") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> tolérance <br>";
																	}
																	if ($temp == "07") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> bienveillance <br>";
																	}
																	if ($temp == "08") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> impartialité <br>";
																	}
																	if ($temp == "09") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> travail <br>";
																	}
																	if ($temp == "10") {
																			echo "<input type = 'checkbox' class = 'box' disabled='disabled' checked/> juste <br>";
																	}
																			}

									if ($ilest != "") {  ?>
											</div>
											<br>
											</div>
									 	</div>

               
                <?php } ?>
                </div>
                                </div>
                                 </div>
                <?php    echo "<br><br><br>";
                }
            }

            catch(Exception $e){
                die('Erreur : '. $e->getMessage());
            }

?>
