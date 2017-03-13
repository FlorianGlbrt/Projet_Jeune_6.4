 // Fonction permettant de vérifier si le jeune ne rentre pas plus de 4 savoir-être et création du code permettant de stocker les savoirs-être dans la base de donnée


function check(elmt) {

	var x = 0;
	var tab = document.getElementsByClassName('box');
	var text = document.getElementById("jeSuis");
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


	document.getElementById("jeSuis").value = text2;

}



// Récupère la date de naissance et l'adresse mail du jeune par ajax
function remplis(id){
	var reg=new RegExp("[ ,;]+", "g");

	var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				var reponse = xhr.responseText;

				var tab = reponse.split(reg);

				document.getElementById("jour").setAttribute("value",tab[0]);
				document.getElementById("mois").setAttribute("value", tab[1]);
				document.getElementById("annee").setAttribute("value", tab[2]);
				document.getElementById("Mail").setAttribute("value", tab[3]);

				
			}
		}

		xhr.open("POST","getInfo.php", true);

		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xhr.send("id="+id);
	
	
}


// Envoi des informations de la demande du jeune par ajax afin de les entrer dans la BDD


function demande(){

	var id = document.getElementById("id").value;
	var reseau = document.getElementById("Reseau").value;
	var engagement = document.getElementById("Engagement").value;
	var jourD = document.getElementById("jourE").value;
	var moisD = document.getElementById("moisE").value;
	var anneeD = document.getElementById("anneeE").value;
	var mailR = document.getElementById("MailR").value;
	var mailErr = document.getElementById("mailRE");
	var jeSuis = document.getElementById("jeSuis").value;
	var continuer = true;

	if(!verifMail(mailR)){
		mailErr.innerHTML="Entrez une adresse e-mail valide";
		continuer = false;
	}else{
		mailRE.innerHTML = "";
	}


	if(continuer){


		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				var reponse = xhr.responseText;
				document.getElementById("vide").innerHTML = reponse;
			}
		}

		xhr.open("POST","jeune3.php", true);

		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xhr.send("id="+parseInt(id)+"&reseau="+reseau+"&engagement="+engagement+"&jour="+parseInt(jourD)+"&mois="+parseInt(moisD)+"&annee="+parseInt(anneeD)+"&jeSuis="+jeSuis+"&mailR="+mailR);
		alert('Le mail a bien été envoyé');
		window.location = "accueil.php";
	}
}

// Fonction permettant de vérifier les informations entrées par le jeune


function valid(){

	var nom = document.getElementById("Nom").value;
	var nomE = document.getElementById("nomEd");
	var prenom = document.getElementById("Prenom").value;
	var prenomE = document.getElementById("prenomEd");
	var annee = document.getElementById("annee").value;
	var mois = document.getElementById("mois").value;
	var jour = document.getElementById("jour").value;
	var mail = document.getElementById("Mail").value;
	var mailE = document.getElementById("mailEd");
	var reseau = document.getElementById("Reseau").value;
	var engagement = document.getElementById("Engagement").value;
	var engagementE = document.getElementById("engagementEd");
	var jourD = document.getElementById("jourE").value;
	var moisD = document.getElementById("moisE").value;
	var anneeD = document.getElementById("anneeE").value;
	var duree = document.getElementById("dureeE");
	var jeSuis = document.getElementById("jeSuis");
	var continuer = true;



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
	if(engagement.length < 1){
		engagementE.innerHTML="Veuillez entrer votre engagement";
		return false;
	}else{
		engagementE.innerHTML="";
	}
	if ((jourD!=null) && (moisD!=null) && (anneeD!=null)){
		if ((parseInt(jourD) < 0)||(parseInt(moisD) < 0)||(parseInt(anneeD) < 0) ){
			duree.innerHTML="Veuillez entrer une durée valide";
			return false;
		}else{
			duree.innerHTML="";
		}
	}else{
		duree.innerHTML="";
	}
	if (continuer){
		document.getElementById("Nom").removeAttribute("disabled");
		document.getElementById("Prenom").removeAttribute("disabled");
		document.getElementById("jour").removeAttribute("disabled");
		document.getElementById("mois").removeAttribute("disabled");
		document.getElementById("annee").removeAttribute("disabled");
		document.getElementById("Mail").removeAttribute("disabled");
		return true;
	}
}


