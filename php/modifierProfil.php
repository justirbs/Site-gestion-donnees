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
		//pour la navbar on doit vérifier si on est sur un profil entraieur ou joueur
		if($_SESSION["profil"]=="joueur"){
			echo("<div id='navbar' class='navbar'>
				<ul>
					<li><a href='profilJoueur.php'>Profil</a></li>
					<li><a class='active' href='rechercherDesStatistiques.php'>Rechercher des statistiques</a></li>
					<li style='float:right'><a href='./deconnexion.php?connexion=out'>Déconexion</a></li>
				</ul>
			</div>");
		} else {
			echo("<div id='navbar' class='navbar'>
				<ul>
					<li><a href='profilEntraineur.php'>Profil</a></li>
					<li><a href='gererJoueurs.php'>Gérer les joueurs</a></li>
					<li><a class='active' href='gererStatistiques.php'>Gérer les statistiques</a></li>
					<li style='float:right'><a href='./deconnexion.php?connexion=out'>Déconexion</a></li>
				</ul>
			</div>");
		}
	?>


	<div class="titre">
		<h1>Modifier le profil :</h1>
	</div>

  <form method='post' action='enregistrerModifProfil.php' class="formulaire">
    <h4>Veuillez entrer vos modifications</h4>

    <p>Identifiant : <input type="text" id="pseudo" name="pseudo"/></p>
    <p>Mot de passe : <input type="password" id="mdp" name="mdp"/></p>

    <p><input type='submit' value='Valider' class='btn'/></p>
  </form>


</body>
