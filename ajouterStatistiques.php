<!DOCTYPE html>
<html>
<head>
    <title>Ajouter statistiques</title>
    <meta charset="utf-8">
</head>
<body>

  <?php
  /*Fonction pour récupérer les nom et prénom du joueur dans le infoJoueurs.csv*/
  function construireTabJoueurs(){
    $row = 1;
    $tabJoueurs = array();
    if (($handle = fopen("csv/infoJoueurs.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $array = explode(";", $data[$c]);
          $tabJoueurs += [$array[0] => $array[1]];
        }
        $row++;
      }
      fclose($handle);
    }
    return($tabJoueurs);
  }

  $tabJoueurs = construireTabJoueurs();

  echo("<form><select id='listeJoueurs' size='10'>");
  foreach ($tabJoueurs as $nom => $prenom) {
    echo("<option id=".$nom." onclick='selectionJoueur(this)'>".$nom.$prenom."</option>");
  }
  echo("</select></form>");
  ?>

  <script type="text/javascript" src="js/ajouterStatistiques.js"></script>
</body>
</html>
