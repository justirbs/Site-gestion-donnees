<html>
<head>
	<title>Enregistrer Modifications Joueur</title>
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

  <div class="affichage">
		<h4>Le joueur a bien été modifié !</h4>

	  <?php

    /*Fonction pour modifier le fichier infoJoueurs.csv avec les nouvelles informations*/

    function modifierFichier(){
      $row = 1;
      $i = -1;

      $donneesCsv = array(); // le tableau dans le quel on va stocker toutes les donées présentes dans le csv
      $joueur = explode(";", $_POST["joueur"]); // on récupère le nom et le prénom du joueur pour savoir quelle ligne modifier

      // on ouvre le fichier csv
      if (($handle = fopen("../csv/infoJoueurs.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
          $num = count($data);
          for ($c=0; $c < $num; $c++) {
            // on récupère les données de chaque ligne
            $array = explode(";", $data[$c]);
            // si on est à la ligne correspondant au joueur à modifier
            if(($joueur[0] == $array[0]) && ($joueur[1] == $array[1])){
              foreach ($_POST as $value) {
                if($i != -1  &&  $value != ""){
                  // on modifie les données à envoyer au nouveau fichier csv
                  $array[$i] = $value;
                }
                $i ++;
              }
              $tabJoueur = $array;
            }
            array_push($donneesCsv, array($array[0], $array[1], $array[2], $array[3], $array[4]));
          }
          $row++;
        }
        // on ferme et on supprime l'ancien csv
        fclose($handle);
        unlink("../csv/infoJoueurs.csv");
      }
      // on crée un nouveau fichier csv, on y écrit toutes les nouvelles données et on le renomme comme l'ancien
      $fp = fopen("../csv/infoJoueurs2.csv", "a+");
      foreach ($donneesCsv as $joueur) {
        fputcsv($fp, $joueur, ";");
      }
      fclose($fp);
      rename("../csv/infoJoueurs2.csv", "../csv/infoJoueurs.csv");

      return($tabJoueur);
    }


    $tabJoueur = modifierFichier();

    echo("<h4>Désormais, les données concernat le joueur sont :</h4>");
    echo("<table border=1><tr><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>Poste</th><th>Club</th></tr><tr>");
    foreach ($tabJoueur as $value) {
      echo("<td>". $value ."</td>");
    }
    echo("</tr></table><br/>");

	  ?>
		<a href="modifierJoueur.php">Revenir à la page précédente</a>
	</div>
</body>