<html>
<head>
	<title>Enregistrer Joueur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
</head>
<body>

  <div class="affichage">
		<h4>Le joueur a bien été insrit !</h4>

	  <?php
	    //on ouvre le csv et on rentre les informations à l'intérieur
	    $fp = fopen('../csv/infoJoueurs.csv', 'a+');
	    fputcsv($fp, $_POST,";");
	    fclose($fp);

			/*Fonction pour récupérer les info dans le infoJoueurs.csv*/
		  function construireTabJoueurs(){
		    $row = 1;
		    $tabJoueurs = array();
		    if (($handle = fopen("../csv/infoJoueurs.csv", "r")) !== FALSE) {
		      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
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
	</div>
</body>
