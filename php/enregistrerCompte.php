<html>
<head>
	<title>enregistrer un compte</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
	<link rel="icon" type="image/png" href="../img/icon.png">
</head>
<body>

  <?php

    $fp = fopen('../csv/identifiant.csv', 'a+');
    fputcsv($fp, $_POST,";");
    fclose($fp);

  ?>

	<div class="affichage">
		<h4>Le compte a bien été enregistré</h4>
		<a href="./connexion.php">Revenir à la page précédente</a><br/>
		<a href="../index.html">Revenir à l'accueil</a>
	</div>



</body>
