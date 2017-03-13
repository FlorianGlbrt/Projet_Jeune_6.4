// Envoi des noms sur consultant3 par Ajax le nom et prénom rentré

function engagements() {
	var Nom=document.getElementById("Nom").value;
	var Prenom=document.getElementById("Prenom").value;
	var engagement = document.getElementById("engagement");
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		var reponse = xhr.responseText;
		engagement.innerHTML = reponse;
	}

	xhr.open("POST","consultant3.php", true);

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.send("Nom="+Nom+"&Prenom="+Prenom);

}


// Envoi sur consultant2 par Ajax les informations de la bonne personne

function engagements2(tag,nom,prenom,annee,mois,jour,email){
	var engagement = document.getElementById("engagement");
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4 && xhr.status ==200 ) {
			var reponse = xhr.responseText;
			engagement.innerHTML = reponse;
		}
	}

	xhr.open("POST","consultant2.php", true);

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.send("tag="+tag+"&prenom="+prenom+"&nom="+nom+"&annee="+annee+"&mois="+mois+"&jour="+jour+"&email="+email);

}



// Envoi du code jeune sur consultanttag par Ajax 

function engagementstag() {
	var tag=document.getElementById("tag").value;
	var engagement = document.getElementById("engagement");
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function(){
		var reponse = xhr.responseText;
		engagement.innerHTML = reponse;
	}

	xhr.open("POST","consultanttag.php", true);

	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xhr.send("tag="+tag);

}
