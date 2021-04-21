<?php
session_start();
?>
<html>
<head>
	<title>Entrer suppression statistiques</title>
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
		<h1>Entrer suppression des statistiques</h1>
	</div>

  <?php

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
      echo("<div class='affichage'><h4>Les statistiques du joueur ".$_POST["nom"]." ".$_POST["prenom"]." sont les suivantes :</h4>");
      // on construit et on affiches toutes les statistiques
      $tabStat = construireTabStat($nomCsv);
      $nbLigne = -1;
      echo("<table><tr><th>Ligne</th><th>Nombre de buts</th><th>Temps de jeu (min)</th></tr>");
      foreach ($tabStat as $match) {
        $nbLigne ++;
        echo("<tr><td>".$nbLigne."</td>");
        foreach ($match as $stat) {
          echo("<td>". $stat ."</td>");
        }
        echo("</tr>");
      }
      echo("</table></div>");


      echo("<form method='post' action='enregistrerSuppStatistiques.php?nom=".$_POST["nom"]."&prenom=".$_POST["prenom"]."' class='formulaire'>
        <h4>Quelle ligne voulez vous supprimer ?</h4>
        <div id='listeLignes'>
          <select size='1' name='ligne'>");
        for($i=0; $i<=$nbLigne; $i++){
          echo("<option value='".$i."'>".$i."</option>");
        }
    	echo("</select>
        </div>
        <p><input type='submit' value='Valider' id='boutonValider' class='btn'/></p>
    	</form>
      <div class='affichage'>
        <a href='supprimerStatistiques.php'>Retour à la page précédente</a>
      </div>");
    } else {
      // si le joueur n'a pas de fichier csv à son nom, on l'indique à l'utilisateur
      header('Location: supprimerStatistiques.php?ResearchError=true');
    }
  ?>


</body>
