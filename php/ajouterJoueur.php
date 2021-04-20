<?php
session_start();
?>
<html>
<head>
	<title>Ajouter Joueur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
	<link rel="icon" type="image/png" href="../img/icon.png">
</head>
<body>

	<div id="navbar" class="navbar">
		<ul>
		  <li><a href="profilEntraineur.php">Profil</a></li>
		  <li><a class="active" href="gererJoueurs.php">Gérer les joueurs</a></li>
		  <li><a href="gererStatistiques.php">Gérer les statistiques</a></li>
		  <li style="float:right"><a href="./deconnexion.php?connexion=out">Déconexion</a></li>
		</ul>
	</div>


	<div class="titre">
		<h1>Ajouter un joueur</h1>
	</div>

  <form id="formulaire" method="post" action="enregistrerJoueurs.php" class="formulaire">
    <p>Nom * <input type="text" id="nom" name="nom"/></p>
    <p>Prénom * <input type="text" id="prenom" name="prenom"/></p>
    <p>Date de naissance <input type="date" id="date" name="date"/></p>
    <p>Poste <input type="text" id="poste" name="poste"/></p>
    <p>Club <input type="text" id="club" name="club"/></p>
  	<p><input type="submit" value="Valider" id="boutonValider" class="btn"/></p>
  </form>

	<div class=affichage>
		<p>(*) : champs obligatoires</p>
	</div>

	<?php
	// s'affiche seulement si il y a eu une erreur dans le remplissage du formulaire
	if(!empty($_GET)){
		echo("<div class=affichage>
			<p>Vous n'avez pas rempli tous les champs obligatoires...</p>
		</div>");
	}
	?>


</body>
