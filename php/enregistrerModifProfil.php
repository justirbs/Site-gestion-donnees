<?php
session_start();
?>
<html>
<head>
	<title>Enregistrer modifications profil</title>
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

  <div class="affichage">
		<h4>Le profil a bien été modifié !</h4>

	  <?php

    /*Fonction pour modifier le fichier infoJoueurs.csv avec les nouvelles informations*/

    function modifierFichier(){
      $row = 1;
      $i = 0;

      $donneesCsv = array(); // le tableau dans le quel on va stocker toutes les donées présentes dans le csv

      // on ouvre le fichier csv
      if (($handle = fopen("../csv/identifiant.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $num = count($data);
          for ($c=0; $c < $num; $c++) {
            // on récupère les données de chaque ligne
            $array = explode(";", $data[$c]);
            // si on est à la ligne correspondant au joueur à modifier
            if(($_SESSION["identifiant"] == $array[0]) && ($_SESSION["mdp"] == $array[1])){
              foreach ($_POST as $value) {
                if($value != ""){
                  // on modifie les données à envoyer au nouveau fichier csv
                  $array[$i] = $value;
                }
                $i ++;
              }
              // on modifie aussi les données de la "session"
              $_SESSION["identifiant"] = $array[0];
              $_SESSION["mdp"] = $array[1];
            }
            array_push($donneesCsv, array($array[0], $array[1]));
          }
          $row++;
        }
        // on ferme et on supprime l'ancien csv
        fclose($handle);
        unlink("../csv/identifiant.csv");
      }
      // on crée un nouveau fichier csv, on y écrit toutes les nouvelles données et on le renomme comme l'ancien
      $fp = fopen("../csv/identifiant2.csv", "a+");
      foreach ($donneesCsv as $joueur) {
        fputcsv($fp, $joueur, ";");
      }
      fclose($fp);
      rename("../csv/identifiant2.csv", "../csv/identifiant.csv");

    }


    modifierFichier();

	  ?>
		<a href="modifierProfil.php">Revenir à la page précédente</a>
	</div>



</body>
