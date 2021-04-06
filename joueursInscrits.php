<html>
<head>
	<title>Joueurs inscrits</title>
	<meta charset="utf-8">
</head>
<body>
  <?php

  /*Fonction pour récupérer les info dans le infoJoueurs.csv*/
  function construireTabJoueurs(){
    $row = 1;
    $tabJoueurs = array();
    if (($handle = fopen("csv/infoJoueurs.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $array = explode(";", $data[$c]);
          array_push($tabJoueurs, array($array[0], $array[1], $array[2], $array[3], $array[4]));
        }
        $row++;
      }
      fclose($handle);
    }
    return($tabJoueurs);
  }

  /*Fonction pour afficher le tableau de tous les élèves*/
  function afficherTabJoueurs(){
    $tabJoueurs = construireTabJoueurs();
    echo("<h4>Joueurs inscrits :</h4>");
    echo("<table border=1><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Poste</th><th>Club</th></tr>");
    foreach ($tabJoueurs as $joueur) {
      echo("<tr>");
      foreach ($joueur as $value) {
        echo("<td>". $value ."</td>");
      }
      echo("</tr>");
    }
    echo("</table><br/>");
  }


  //on affiche les joueurs inscrits
  afficherTabJoueurs();

  ?>

  <table border=1>
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date de naissance</th>
      <th>Poste</th>
      <th>Club</th>
    </tr>
    <tr>
      <td>Girourd</td>
      <td>Olivier</td>
      <td>date</td>
      <td>attaquant</td>
      <td>Chelsea</td>
    </tr>



</body>
