<html>
<head>
	<title>Connexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
</head>
<body>

	<div class="titre">
		<h1>Veuillez vous connecter :</h1>
	</div>

  <form id="formulaire" method="post" action="verificationConnexion.php" class="formulaire">
    <p>Identifiant : <input type="text" id="pseudo" name="pseudo"/></p>
    <p>Mot de passe : <input type="password" id="mdp" name="mdp"/></p>
  	<p><input type="submit" value="Valider" id="boutonValider" class="btn"/></p>
  </form>

  <?php
  //s'affiche si l'utilistaeur s'est trompé lors de la saisie
  if(!empty($_GET)){
    echo("<p class='affichage'>Il y a une erreur dans l'identifiant et/ou dans le mot de passe</p>");
  }
  ?>

</body>
