// Change le nombre de jours pouvant être selectionnés en fonction du mois et de l'année

function changejour() {

	var a= document.getElementById('annee').value;
	var m= document.getElementById('mois').value;
	var j= document.getElementById('jour');

		if ((a % 4 === 0) && (a % 100 !== 0) && (m == 2)) {
			j.length =28;
			for (var i = 28; i<=29; i++){
   				var opt = document.createElement('option');
    			opt.value = i;
    			opt.innerHTML = i;
    			j.appendChild(opt);
			}
		}
		else if (m==2) {
			j.length =28;
		}
		else if (m==1 || m==3 || m==5 || m==7 || m==8 || m==10 || m==12) {
			j.length =28;
			for (var i = 28; i<=31; i++){
   				var opt = document.createElement('option');
    			opt.value = i;
    			opt.innerHTML = i;
    			j.appendChild(opt);
			}
		}
		else {
			j.length =28;
			for (var i = 28; i<=30; i++){
   				var opt = document.createElement('option');
    			opt.value = i;
    			opt.innerHTML = i;
    			j.appendChild(opt);
			}
		}
}


// Vérifie si l'adresse entrée est bien une adresse mail

function verifMail(a){
	valide1 = false;
	
	for(var j=1;j<(a.length);j++){
		if(a.charAt(j)=='@'){
			if(j<(a.length-4)){
				for(var k=j;k<(a.length-2);k++){
					if(a.charAt(k)=='.') valide1=true;
				}
			}
		}
	}
	return valide1;
}





function inscr(){

// Récupération des données pour l'inscription 

	var login = document.getElementById("loginI").value;
	var pass = document.getElementById("passI").value;
	var nom = document.getElementById("Nom").value;
	var civi = document.getElementsByClassName("civ");
	var prenom = document.getElementById("Prenom").value;
	var annee = document.getElementById("annee").value;
	var mois = document.getElementById("mois").value;
	var jour = document.getElementById("jour").value;
	var email = document.getElementById("Mail").value;
	var vide = document.getElementById("vide");
	var eL = document.getElementById("eLoginI");
	var eP = document.getElementById("ePassI");
	var ePr = document.getElementById("ePrenom");
	var eN = document.getElementById("eNom");
	var eE = document.getElementById("eEmail");
	var civ;
	for (var i=0;i<civi.length;i++){
		if (civi[i].checked){
			civ = civi[i].value;
		}
	}


	var continuer = true;


	// Vérification de la validité des informations entrées

	if (login.length < 5){
		eL.innerHTML = "Le login doit comporter au minimum 5 caractères";
		continuer = false;
	}else{
		eL.innerHTML = "";
	}
	if (pass.length < 8){
		eP.innerHTML = "Le mot de passe doit comporter au minimum 8 caractères";
		continuer = false;
	}else{
		eP.innerHTML = "";
	}


	if (nom.length < 1){
		eN.innerHTML = "Le nom doit comporter au minimum 1 caractère";
		continuer = false;
	}else{
		eN.innerHTML = "";
	}

	if(prenom.length < 1){
		ePr.innerHTML = "Le prénom doit comporter au minimum 1 caractère";
		continuer = false;
	}else{
		ePr.innerHTML = "";
	}


	if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))){
		eE.innerHTML = "Entrez une adresse email valide";
		continuer = false;
	}else{
		eE.innerHTML="";
	}

	if(continuer){

		// Envoi par ajax des informations entrées


		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				var reponse = xhr.responseText;

				if (reponse=="0"){
					eL.innerHTML = "Ce login est déjà utilisé, veuillez en choisir un autre";
				}else if (reponse=="1"){
					eE.innerHTML = "Cette adresse est déjà utilisée, veuillez en choisir une autre";
				}else{
					location.href="accueil.php";
				}
			}
		};

		xhr.open("POST","inscription2.php", true);

		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

		xhr.send("login="+login+"&pass="+pass+"&nom="+nom+"&prenom="+prenom+"&annee="+annee+"&mois="+mois+"&jour="+jour+"&mail="+email+"&civ="+civ);
	}
}

function loginin(str){

	// Récupération des informations de connection entrées
	var login=document.getElementById("login").value;
	var pass=document.getElementById("pass").value;
	var vide = document.getElementById("vide");

	var eLl = document.getElementById("eLogin");
	var ePl = document.getElementById("ePass");
	var continuer = true;

	if (login.length < 5){
		eLl.innerHTML = "Le login doit comporter au minimum 5 caractères";
		continuer = false;
	}else{
		eLl.innerHTML = "";
	}
	if (pass.length < 8){
		ePl.innerHTML = "Le mot de passe doit  comporter au minimum 8 caractères";
		continuer = false;
	}else{
		ePl.innerHTML = "";
	}

	// Envoi par ajax pour traiter les informations

	if (continuer){
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				var reponse = xhr.responseText;
				location.href=str;
			}
		}
	xhr.open("POST","login2.php", true);

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.send("login="+login+"&pass="+pass);
	}

}

function deco(){

	// Utilisation d'ajax pour réinitialiser les variables de sessions sur la page deco2.php

	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status == 200){
			var reponse = xhr.responseText;
			location.href="accueil.php";
		}
	}
xhr.open("POST","deco2.php", true);

xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

xhr.send("ok='ok'");

}




function verifconnect(id) {
	if (id === 0) {window.location="redirection.php";}
}



