<?php
session_start();
?>
<html>
<head>
	<title>Supprimer statistiques</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
	<link rel="icon" type="image/png" href="../img/icon.png">
</head>
<body>

	<div id="navbar" class="navbar">
		<ul>
		  <li><a href="profilEntraineur.php">Profil</a></li>
		  <li><a href="gererJoueurs.php">Gérer les joueurs</a></li>
		  <li><a class="active" href="gererStatistiques.php">Gérer les statistiques</a></li>
		  <li style="float:right"><a href="./deconnexion.php?connexion=out">Déconexion</a></li>
		</ul>
	</div>

	<div class="titre">
		<h1>Supprimer des statistiques</h1>
	</div>

  <form method="post" action="entrerSuppStatistiques.php" class="formulaire">
    <h4>Choisissez le joueur dont vous voulez supprimer des statistiques</h4>
		<p>Nom <input type="text" id="nom" name="nom"/></p>
	  <p>Prénom <input type="text" id="prenom" name="prenom"/></p>
		<p><input type="submit" value="Valider" id="boutonValider" class="btn"/></p>
	</form>

  <?php
    if(!empty($_GET)){
      echo("<div class='affichage'><h4>Il n'existe pas de fichier à ce nom...</h4></div>");
    }
  ?>

  <div class='affichage'>
    <a href="gererStatistiques.php">Retour à la page précédente</a>
  </div>

</body>
