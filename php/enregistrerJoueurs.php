<?php
session_start();
?>
<html>
<head>
	<title>Enregistrer Joueur</title>
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


	  <?php

			//on vérifie que l'utilisateur a bien rempli tous les champs obligatoires
			if(($_POST["nom"] != "") && ($_POST["prenom"] != "")){

				//on ouvre le csv et on rentre les informations à l'intérieur
		    $fp = fopen('../csv/infoJoueurs.csv', 'a+');
		    fputcsv($fp, $_POST,";");
		    fclose($fp);

				echo("<div class='affichage'>
					<h4>Le joueur a bien été insrit !</h4>
					<a href='ajouterJoueur.php'>Revenir à la page précédente</a>
					</div>");

			} else {
				// si l'utilisateur a mal rempli le formulaire on retourne sur la page en lui affichant un message d'erreur
				header('Location: ajouterJoueur.php?FormError=true');
			}
	  ?>

</body>
