<!DOCTYPE html>
<html>
<head>
    <title>Ajouter statistiques</title>
    <meta charset="utf-8">
</head>
<body>
  <form method='post' action='enregistrerStatistiques.php'>
    <div id="formulaire">
      <p>Veuillez remplir les statistiques du joueur séléctionné</p>
      <p>Nombre de Buts : <input type='text' name='buts'/></p>
      <p>Temps de jeu : <input type='text' name='temps'/></p>
    </div>

  <?php
  /*Fonction pour récupérer les nom et prénom du joueur dans le infoJoueurs.csv*/
  function construireTabJoueurs(){
    $row = 1;
    $tabJoueurs = array();
    if (($handle = fopen("../csv/infoJoueurs.csv", "r")) !== FALSE) {
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

  echo("
  <div id='listeJoueurs'>
  <select size='5' name='joueur'>");
  foreach ($tabJoueurs as $nom => $prenom) {
    echo("<option value='".$nom.$prenom."'>".$nom.$prenom."</option>");
  }

  ?>
      </select>
    </div>
    <p><input type='submit' value='Valider' class='btn'/></p>
  </form>

  <script type="text/javascript" src="js/ajouterStatistiques.js"></script>
</body>
</html>
