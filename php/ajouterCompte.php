<html>
<head>
	<title>Creer un compte</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/designGlobal.css" />
	<link rel="icon" type="image/png" href="../img/icon.png">
</head>
<body>

	<div class="titre">
		<h1>Creer un compte :</h1>
	</div>

  <form id="formulaire" method="post" action="enregistrerCompte.php" class="formulaire">
    <p>Identifiant : <input type="text" id="pseudo" name="pseudo"/></p>
    <p>Mot de passe : <input type="password" id="mdp" name="mdp"/></p>
    <div id='listeProfils' class="liste">
      <select size='2' name='profil'>
        <option value="entraineur">Entraineur</option>
        <option value="joueur">Joueur</option>
      </select>
    </div>
  	<p><input type="submit" value="Valider" id="boutonValider" class="btn"/></p>
  </form>


</body>
