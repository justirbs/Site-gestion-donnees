<html>
<head>
	<title>Ajouter Joueur</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
</head>
<body>

	<div class="titre">
		<h1>Ajouter un joueur</h1>
	</div>

  <form id="formulaire" method="post" action="enregistrerJoueurs.php" class="formulaire">
    <p>Nom : <input type="text" id="nom" name="nom"/></p>
    <p>Prénom : <input type="text" id="prenom" name="prenom"/></p>
    <p>Date de naissance : <input type="date" id="date" name="date"/></p>
    <p>Poste : <input type="text" id="poste" name="poste"/></p>
    <p>Club : <input type="text" id="club" name="club"/></p>
  	<p><input type="submit" value="Valider" id="boutonValider" class="btn"/></p>
  </form>


</body>
