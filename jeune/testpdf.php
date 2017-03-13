<?php
include('bdd.php');
$id = $_GET["id"];
$e = e;//utf8_decode('é');
$s = ' ';//utf8_decode(' ');


    //Chargement des fichiers et fonctions requises pour la création du pdf

    ob_end_clean();
    header("Content-Type: text/html;charset=UTF-8");
    require_once("fpdf181/WriteHTML.php");
    $pdf = new PDF_HTML();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(10, 5);

try {       //Récupère dans la BDD les expériences validées du jeune


            $reponse1 = $bdd->prepare('SELECT * FROM jeune WHERE id=:tag');
            $reponse1->execute(array(
                        'tag' => $id,
                        ));

                while ($donnee1 = $reponse1->fetch()) {
                    $nom = $donnee1['nom'];
                    $prenom = $donnee1['prenom'];
                    $annee = $donnee1['annee'];
                    $mois = $donnee1['mois'];
                    $jour = $donnee1['jour'];
                    $email = $donnee1['email'];


                    $reponse = $bdd->prepare("SELECT * FROM expe WHERE tag=:tag AND enCours=0");
                    $reponse->execute(array(
                        'tag' => $id,
                    ));

                while ($donnee = $reponse->fetch()) {
                $jesuis = $donnee['jesuis'];
                $ilest = $donnee['ilest'];
                $pdf->WriteHTML("Code Jeune : ".$_GET["id"]."<br>");


                //Ecrit les données récupérées dans un tableau (pas d'incrémentation, cela est voulu, en rajoutant des tab le tableau se disperse).
                        $Table='
<table border=1>
<tbody>
<tr>
<td width="760">'.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.'Jeune</td>
</tr>
<tr>
<td width="220">Nom:</td>
<td width="540">'.$nom.'</td>
</tr>
<tr>
<td width="220">Pr'.$e.'nom:</td>
<td width="540">'.$prenom.'</td>
</tr>
<tr>
<td width="220">Date de naissance</td>
<td width="540">'.$jour.'/'.$mois.'/'.$annee.'</td>
</tr>
<tr>
<td width="220">Email</td>
<td width="540">'.$email.'</td>
</tr>
<tr>
<td width="220">R'.$e.'seau social</td>
<td width="540">'.$donnee["reseau"].'</td>
</tr>
<tr>
<td width="220">Engagement</td>
<td width="540">'.$donnee["engagement"].'</td>
</tr>
<tr>
<td width="220">Dur'.$e.'e</td>
<td width="540">'.$donnee["annee"].' ans(s) '.$donnee["mois"].' mois '.$donnee["jour"].' jour(s)</td>
</tr>
</tbody>
</table>



<br>


<table border=1>
<tbody>
<tr>
<td width="760">'.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.'R'.$e.'f'.$e.'rent</td>
</tr>
<tr>
<td width="220">Nom:</td>
<td width="540">'.$donnee["nomR"].'</td>
</tr>
<tr>
<td width="220">Pr'.$e.'nom:</td>
<td width="540">'.$donnee["prenomR"].'</td>
</tr>
<tr>
<td width="220">Mail</td>
<td width="540">'.$donnee["mailR"].'</td>
</tr>
<tr>
<td width="220">R'.$e.'seau social</td>
<td width="540">'.$donnee["reseauR"].'</td>
</tr>
<tr>
<td width="220">Entreprise</td>
<td width="540">'.$donnee["engagement"].'</td>
</tr>
<tr>
<td width="220">Dur'.$e.'e</td>
<td width="540">'.$donnee["anneeR"].' an(s) '.$donnee["moisR"].' mois '.$donnee["jourR"].' jour(s)</td>
</tr>
<tr>
<td width="760">'.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.''.$s.'Commentaire du R'.$e.'r'.$e.'rent</td>
</tr>
</tbody>
</table>
<br>
';
                    $pdf->WriteHTML($Table);
                    $pdf->WriteHTMLCell(190,($donnee['commentaire']."<br><br><br><br>----------------------------------------------------------------------------------------------------<br><br><br><br>"));

                    }
                }
            } catch (Exception $e) {
                    die('Erreur : '.$e->getMessage());
                }





    $pdf->Output("engagements.pdf","I");
?>
