 // Fonction permettant de vérifier si le référent ne rentre pas plus de 4 savoir-être et création du code permettant de stocker les savoirs-être dans la base de donnée


function check(elmt) {

	var x = 0;
	var tab = document.getElementsByClassName('boxR');
	var text = document.getElementById("ilEst");
	var text2 = "";
	for (var i = tab.length - 1; i >= 0; i--) {
		if (tab[i].checked) {
			x++ ;
		}
	}
	if (x>4) {
		alert('vous ne devez pas rentrer plus de 4 choix');elmt.checked = false;
	}
	for (var i = tab.length - 1; i >= 0; i--) {
		if (tab[i].checked) {
			text2 = text2+tab[i].value;
		}
	}


	document.getElementById("ilEst").value = text2;

}


// Fonction permettant de vérifier les informations entrées par le référent

function validR(){

	var nom = document.getElementById("Nom").value;
	var nomE = document.getElementById("nomE");
	var prenom = document.getElementById("Prenom").value;
	var prenomE = document.getElementById("prenomE");
	var mail = document.getElementById("Mail").value;
	var mailE = document.getElementById("mailE");
	var reseau = document.getElementById("Reseau").value;
	var entreprise = document.getElementById("Entreprise").value;
	var entrepriseE = document.getElementById("entrepriseE");
	var jourD = document.getElementById("jourE").value;
	var moisD = document.getElementById("moisE").value;
	var anneeD = document.getElementById("anneeE").value;
	var duree = document.getElementById("dureeE");
	var ilEst = document.getElementById("ilEst").value;
	var test = document.getElementById("commentaire").value;


	if (nom.length < 1){
		nomE.innerHTML = "Veuillez entrer votre nom";
		return false;
	}else{
		nomE.innerHTML = "";
	}
	if (prenom.length < 1){
		prenomE.innerHTML = "Veuillez entrer votre prenom";
		return false;
	}else{
		prenomE.innerHTML = "";
	}
	if(!verifMail(mail)){
		mailE.innerHTML="Entrez une adresse e-mail valide";
		return false;
	}else{
		mailE.innerHTML = "";
	}
	if(entreprise.length < 1){
		entrepriseE.innerHTML="Veuillez entrer votre engagement";
		return false;
	}else{
		entrepriseE.innerHTML="";
	}
	if ((jourD!=null) && (moisD!=null) && (anneeD!=null)){
		if ((parseInt(jourD) < 0)||(parseInt(moisD) < 0)||(parseInt(anneeD) < 0)){
			duree.innerHTML="Veuillez entrer une durée valide";
			return false;
		}else{
			duree.innerHTML="";
		}
	}else{
		duree.innerHTML="Veuillez entrer une durée valide";
		return false;
	}


	return true;


}

// Envoi des informations du référent par ajax afin de les entrer dans la BDD

function confirm(){

	var code = document.getElementById("code").value;
	var nom = document.getElementById("Nom").value;
	var prenom = document.getElementById("Prenom").value;
	var mail = document.getElementById("Mail").value;
	var reseau = document.getElementById("Reseau").value;
	var entreprise = document.getElementById("Entreprise").value;
	var jourD = document.getElementById("jourE").value;
	var moisD = document.getElementById("moisE").value;
	var anneeD = document.getElementById("anneeE").value;
	var ilEst = document.getElementById("ilEst").value;
	var commentaire = document.getElementById("Commentaire").value;
	var tag = document.getElementById('id').value;


	var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				var reponse = xhr.responseText;
				document.getElementById("vide").innerHTML = reponse;
			}
		}

		xhr.open("POST","referent4.php", true);

		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xhr.send("tag="+tag+"&code="+code+"&mail="+mail+"&nom="+nom+"&prenom="+prenom+"&reseau="+reseau+"&entreprise="+entreprise+"&jour="+parseInt(jourD)+"&mois="+parseInt(moisD)+"&annee="+parseInt(anneeD)+"&ilEst="+ilEst+"&commentaire="+commentaire);

	alert('Votre référence a bel et bien été enregistré, merci!');
	window.location = "accueil.php";



}
