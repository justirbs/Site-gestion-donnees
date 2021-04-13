<html>
<head>
	<title>Rechercher des statistiques</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
</head>
<body>

	<div class="titre">
		<h1>Rechercher les statistiques du joueur :</h1>
	</div>

 	<div class="formulaire">
		<p>Nom : <input type="text" id="nom" name="nom"/></p>
	  <p>Prénom : <input type="text" id="prenom" name="prenom"/></p>
		<p><input type="submit" value="Valider" id="boutonValider" class="btn" onclick="rechercher()"/></p>
	</div>

  <div id="affichage" class="affichage"></div>

  <script type="text/javascript" src="../js/rechercherDesStatistiques.js"></script>
</body>
