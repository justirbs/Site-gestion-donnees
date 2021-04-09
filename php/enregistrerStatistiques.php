<html>
<head>
	<title>Enregistrer statistiques</title>
	<meta charset="utf-8">
</head>
<body>

  <?php
  //ajout des statistiquesdans NomPrenom.csv
  $nomCsv = $_POST["joueur"].".csv";
  $fp = fopen("../csv/".$nomCsv, 'a+');
  $array = array($_POST["buts"], $_POST["temps"]);
  fputcsv($fp, $array, ";");
  fclose($fp);

  //affichage des statistiques
  echo("<h4>Les statistiques suivantes viennent d'être sauvegardées :</h4>");
  echo("<table border=1><tr><th>Joueur</th><th>Nombre de buts</th><th>Temps de jeu</th></tr>");
  echo("<tr><td>". $_POST["joueur"] ."</td><td>". $_POST["buts"] ."</td><td>". $_POST["temps"] ."</td></tr>");
  echo("</table><br/>");

  ?>
  <a href="ajouterStatistiques.php">Revenir à la page précédente</a>

</body>
