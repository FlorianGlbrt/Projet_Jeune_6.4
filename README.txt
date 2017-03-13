Comment lier la base de donnée et l'utiliser :

vous utilisez donc mysql en serveur local :
	importer la base de donnée que vous appelerez <bddjeune> du fichier bddjeune.sql dans votre base mysql.
	allez dans bdd.php et mettez les valeurs suivantes:
		$serveur = 'localhost'
		$base = 'bdd'
		$login = un utilisateur qui a tous les droits sur la bdd <bddjeune> 
		$motdepasse = mot de passe de cet utilisateur

Il existe déjà un membre du site, "durandjean" avec pour mdp "durandjean"



ATTENTION!! Pour que les liens des mails fonctionnent, il faut que le port utilisé pour le serveur Php soit 8008,
ou alors il faudra changer le lien manuellement


pour lancer le site, sur Linux, ouvrir un serveur PHP sur le port 8008 dans le dossier "jeune". (php -S 127.0.0.1:8008)
Lancer 127.0.0.1:8008/accueil.php.

Les accents ne fonctionnent pas car la fonction utf-8_decode() n'est pas reconnu sur mon ordinateur, je l'ai donc enlevée (il est possible que j'en ai oublié certaines, si une page ne fonctionne pas, vérifier si ce n'est pas la cause du disfonctionnement).
