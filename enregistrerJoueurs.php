<html>
<head>
	<title>Enregistrer Joueur</title>
	<meta charset="utf-8">
</head>
<body>

  <?php
    //on ouvre le csv et on rentre les informations à l'intérieur
    $fp = fopen('./csv/infoJoueurs.csv', 'a+');
    fputcsv($fp, $_POST,";");
    fclose($fp);
  ?>
  <h4>Le joueur a bien été insrit</h4>
  <a href="joueursInscrits.php">Voir tous les joueurs inscrits</a>

</body>
