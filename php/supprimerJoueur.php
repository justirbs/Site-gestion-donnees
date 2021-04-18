<html>
<head>
	<title>Supprimer joueur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
  <link rel="icon" type="image/png" href="../img/icon.png">
</head>
<body>

  <div id="navbar" class="navbar">
		<ul>
		  <li><a href="profilEntraineur.php">Profil</a></li>
		  <li><a class="active" href="gererJoueurs.php">Gérer les joueurs</a></li>
		  <li><a href="gererStatistiques.php">Gérer les statistiques</a></li>
		  <li style="float:right"><a href="../index.html">Déconexion</a></li>
		</ul>
	</div>

  <div class="titre">
		<h1>Supprimer un joueur</h1>
	</div>



	<form method='post' action='enregistrerSuppJoueur.php' class="formulaire">

		<h4>Quel joueur voulez-vous modifier ?</h4>

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
    <select size='5' name='joueur'>");
    foreach ($tabJoueurs as $nom => $prenom) {
      echo("<option value='".$nom.";".$prenom."'>".$nom." ".$prenom."</option>");
    }
    ?>
    </select>

    <p><input type='submit' value='Valider' class='btn'/></p>

  </form>


</body>
