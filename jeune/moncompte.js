//Utilise Ajax pour envoyer l'id de l'engagement du jeune à supprimer dans le page suppr.php

function supprimer(id) {
	var xhr = new XMLHttpRequest();
	xhr.open("POST","suppr.php", true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("id="+id);


	window.location="moncompte.php";
}


//Utilise Ajax pour envoyer l'id du jeune dans la page testpdf.php
function pdf(id){
	window.location ="testpdf.php?id="+id;

}




//Vérifie si l'utilisateur est connecté, si non, il est renvoyé sur redirection.php
function verifconnect(id) {
	if (id == 0) {window.location="redirection.php";}
}
