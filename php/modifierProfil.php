<?php
session_start();
?>
<html>
<head>
	<title>Modifier le profil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
	<link rel="icon" type="image/png" href="../img/icon.png">
</head>
<body>

	<?php
		//pour la navbar on doit vérifier si on est sur un profil entraieur, joueur ou admin
		switch ($_SESSION["profil"]) {
			case 'entraineur':
				echo("<div id='navbar' class='navbar'>
					<ul>
						<li><a class='active' href='profilEntraineur.php'>Profil</a></li>
						<li><a href='gererJoueurs.php'>Gérer les joueurs</a></li>
						<li><a href='gererStatistiques.php'>Gérer les statistiques</a></li>
						<li style='float:right'><a href='./deconnexion.php?connexion=out'>Déconexion</a></li>
					</ul>
				</div>");
				break;
			case 'joueur' :
				echo("<div id='navbar' class='navbar'>
					<ul>
						<li><a class='active' href='profilJoueur.php'>Profil</a></li>
						<li><a href='rechercherDesStatistiques.php'>Rechercher des statistiques</a></li>
						<li style='float:right'><a href='./deconnexion.php?connexion=out'>Déconexion</a></li>
					</ul>
				</div>");
				break;
			case 'admin' :
				echo("<div id='navbar' class='navbar'>
					<ul>
					  <li><a class='active' href='profilAdmin.php'>Profil</a></li>
					  <li><a href='./gererClubs.php'>Gérer les clubs</a></li>
					  <li style='float:right'><a href='./deconnexion.php?connexion=out'>Déconexion</a></li>
					</ul>
				</div>");
				break;
			default:
				echo("Erreur");
				break;
		}
	?>

	<div class="titre">
		<h1>Modifier le profil :</h1>
	</div>

  <form method='post' action='enregistrerModifProfil.php' class="formulaire">
    <h4>Veuillez entrer vos modifications</h4>

    <p>Identifiant <input type="text" id="pseudo" name="pseudo"/></p>
    <p>Mot de passe <input type="password" id="mdp" name="mdp"/></p>

    <p><input type='submit' value='Valider' class='btn'/></p>
  </form>


</body>
