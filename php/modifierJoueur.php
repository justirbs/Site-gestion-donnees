<html>
<head>
	<title>Modifier Joueur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
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
		<h1>Modifier le profil d'un joueur</h1>
	</div>

  <form method='post' action='enregistrerModifJoueur.php' class="formulaire">
    <div id="blocsFormulaire">
      <h4>Veuillez sélectioner le joueur</h4>
      <div id='listeJoueurs'>
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
      </div>
      <br/>

      <h4>Veuillez entrer vos modifications</h4>
      <div id="champsFormulaire">
        <p>Nom : <input type="text" id="nom" name="nom"/></p>
        <p>Prénom : <input type="text" id="prenom" name="prenom"/></p>
        <p>Date de naissance : <input type="date" id="date" name="date"/></p>
        <p>Poste : <input type="text" id="poste" name="poste"/></p>
        <p>Club : <input type="text" id="club" name="club"/></p>
      </div>

      <p><input type='submit' value='Valider' class='btn'/></p>
    </div>
  </form>


</body>
