<html>
<head>
	<title>Vérification Connexion</title>
	<meta charset="utf-8">
</head>
<body>

  <?php
  /*Fonction pour récupérer les nom et prénom du joueur dans le identifiant.csv*/
  function construireTabIdentifiants(){
    $row = 1;
    $tabIdentifiants = array();
    if (($handle = fopen("../csv/identifiant.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $array = explode(";", $data[$c]);
          $tabIdentifiants += [$array[0] => $array[1]];
        }
        $row++;
      }
      fclose($handle);
    }
    return($tabIdentifiants);
  }


	/*Fonction pour récupérer toutes les informations relatives à l'utilisateur connecté*/
	function remplirInfoUtilisateur(){
		session_start();
		$row = 1;
		if (($handle = fopen("../csv/identifiant.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c=0; $c < $num; $c++) {
          $array = explode(";", $data[$c]);
          if($array[0] == $_POST["pseudo"]  &&  $array[1] == $_POST["mdp"]){
            $_SESSION["identifiant"] = $array[0];
            $_SESSION["mdp"] = $array[1];
						$_SESSION["profil"] = $array[2];
          }
        }
        $row++;
      }
      fclose($handle);
    }
	}


  $estCorrect = 0;
  $tabIdentifiants = construireTabIdentifiants();
  foreach ($tabIdentifiants as $pseudo => $mdp) {
    if($pseudo == $_POST["pseudo"]  &&  $mdp == $_POST["mdp"]){
      $estCorrect = 1;
    }
  }

  if($estCorrect == 1){
		remplirInfoUtilisateur();
    if($_SESSION["profil"] == "entraineur"){
      header('Location: profilEntraineur.php');
    } else {
      header('Location: profilJoueur.php');
    }
  } else {
    header('Location: connexion.php?erreur=erreur');
  }

  ?>


</body>
