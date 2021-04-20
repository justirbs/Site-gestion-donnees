<?php
session_start();
?>
<html>
<head>
	<title>Afficher statistiques</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
	<link rel="icon" type="image/png" href="../img/icon.png">
</head>
<body>

  <?php

	// on vérifie que l'utilisateur s'est bien connecté avant d'accéder à la page
	if(!empty($_SESSION)){

		// on vérifie que l'utilisateur est passé par la page rechercherDesStatistiques.php avant
		if(!empty($_POST)){

			/* Fonction pour récupérer toutes les statistiques d'un joueur */
			function construireTabStat($nomCsv){
		    $row = 1;
		    $tabStat = array(); //tableau dans lequel on va stocker les statistiques
				// on ouvre le fichier csv correspondant au joueur
		    if (($handle = fopen($nomCsv, "r")) !== FALSE) {
		      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $num = count($data);
		        for ($c=0; $c < $num; $c++) {
							// pour chaque ligne, on récupère les données séparées par des ";"
		          $array = explode(";", $data[$c]);
							// on ajoute les statistiques au tableau
		          array_push($tabStat, array($array[0], $array[1]));
		        }
		        $row++;
		      }
		      fclose($handle);
		    }
		    return($tabStat);
		  }



		  $nomCsv = "../csv/".$_POST["nom"].$_POST["prenom"].".csv";

			// on regarde si le joueur a un csv à son nom
		  if(file_exists($nomCsv)){
		    echo("<h4>Les statistiques du joueur ".$_POST["nom"]." ".$_POST["prenom"]." sont les suivantes :</h4>");
				// on construit et on affiches toutes les statistiques
				$tabStat = construireTabStat($nomCsv);
		    echo("<table><tr><th>Nombre de buts</th><th>Temps de jeu</th></tr>");
		    foreach ($tabStat as $match) {
		      echo("<tr>");
		      foreach ($match as $stat) {
		        echo("<td>". $stat ."</td>");
		      }
		      echo("</tr>");
		    }
		    echo("</table><br/>");
		  } else {
				// si le joueur n'a pas de fichier csv à son nom, on l'indique à l'utilisateur
		    echo("<h4>Il n'existe pas de fichier à ce nom...</h4>");
		  }


		} else {
			// si l'utilisateur n'était pas passé par la page rechercherDesStatistiques.php avant, on le reirige vers cette page
			echo("<div class='affichage'>
				<h4>Vueillez passer par la page qui permet de rechercher des statistiques</h4>
				<a href='./rechercherDesStatistiques.php'>Retour à la page</a>
				</div>");
		}

	} else {
		// si l'utilisateur ne s'était pas connecté avant, on le redirige vers l'accueil
		echo("<div class='affichage'>
			<h4>Vueillez vous connectez avant d'accéder à cette page</h4>
			<a href='../index.html'>Retour à l'accueil</a>
			</div>");
	}




  ?>


</body>
