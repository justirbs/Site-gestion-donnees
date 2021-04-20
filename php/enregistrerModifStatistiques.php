<?php
session_start();
?>
<html>
<head>
	<title>Enregistrer modifications statistiques</title>
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
		<h1>Enregistrer modifications des statistiques</h1>
	</div>

  <div class="affichage">

  <?php

  /*Fonction pour modifier le fichier csv avec les nouvelles informations*/
  function modifierFichier(){
    $row = 1;

    $donneesCsv = array(); // le tableau dans le quel on va stocker toutes les donées présentes dans le csv

    // on ouvre le fichier csv correspondant au joueur
    if (($handle = fopen("../csv/".$_GET["nom"].$_GET["prenom"].".csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          // on récupère les données de chaque ligne
          $array = explode(";", $data[$c]);
          // si on est à la ligne à modifier
          if($row - 1  ==  $_POST["ligne"]){
            // on modifie les données à envoyer au nouveau fichier csv
            if($_POST["buts"] != ""){
              $array[0] = $_POST["buts"];
            }
            if($_POST["temps"] != ""){
              $array[1] = $_POST["temps"];
            }
          }
          array_push($donneesCsv, array($array[0], $array[1]));
        }
        $row++;
      }
      // on ferme et on supprime l'ancien csv
      fclose($handle);
      unlink("../csv/".$_GET["nom"].$_GET["prenom"].".csv");
    }
    // on crée un nouveau fichier csv, on y écrit toutes les nouvelles données
    $fp = fopen("../csv/".$_GET["nom"].$_GET["prenom"].".csv", "a+");
    foreach ($donneesCsv as $ligne) {
      fputcsv($fp, $ligne, ";");
    }
    fclose($fp);

    return($donneesCsv);
  }


  $donneesCsv = modifierFichier();

  echo("<h4>Désormais, les statistiques concernant le joueur ".$_GET["nom"]." ".$_GET["prenom"]." sont :</h4>");
  echo("<table border=1><tr><th>Nombre de buts</th><th>Temps de jeu (min)</th></tr>");
  foreach ($donneesCsv as $ligne) {
    echo("<tr>");
    foreach ($ligne as $value) {
      echo("<td>". $value ."</td>");
    }
    echo("</tr>");
  }
  echo("</table><br/>");

  ?>

    <a href="./modifierStatistiques.php">Retour à la page précédente</a>

  </div>



</body>