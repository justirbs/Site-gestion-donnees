<html>
<head>
	<title>Afficher statistiques</title>
	<meta charset="utf-8">
</head>
<body>

  <?php

  function construireTabStat($nomCsv){
    $row = 1;
    $tabStat = array();
    if (($handle = fopen($nomCsv, "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $array = explode(";", $data[$c]);
          array_push($tabStat, array($array[0], $array[1]));
        }
        $row++;
      }
      fclose($handle);
    }
    return($tabStat);
  }

  $nomCsv = "../csv/".$_POST["nom"].$_POST["prenom"].".csv";

  if(file_exists($nomCsv)){
    echo("<h4>Les statistiques du joueur ".$_POST["nom"]." ".$_POST["prenom"]." sont les suivantes :</h4>");
    $tabStat = construireTabStat($nomCsv);
    echo("<table border=1><tr><th>Nombre de buts</th><th>Temps de jeu</th></tr>");
    foreach ($tabStat as $match) {
      echo("<tr>");
      foreach ($match as $stat) {
        echo("<td>". $stat ."</td>");
      }
      echo("</tr>");
    }
    echo("</table><br/>");
  } else {
    echo("<h4>Il n'existe pas de fichier à ce nom...</h4>");
  }


  ?>


</body>
