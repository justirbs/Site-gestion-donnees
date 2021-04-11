<html>
<head>
	<title>Creer un compte</title>
	<meta charset="utf-8">
</head>
<body>

  <h1>Creer un compte :</h1>

  <form id="formulaire" method="post" action="enregistrerCompte.php">
    <p>Identifiant : <input type="text" id="pseudo" name="pseudo"/></p>
    <p>Mot de passe : <input type="password" id="mdp" name="mdp"/></p>
    <div id='listeJoueurs'>
      <select size='2' name='profil'>
        <option value="entraineur">Entraineur</option>
        <option value="joueur">Joueur</option>
      </select>
    </div>
  	<p><input type="submit" value="Valider" id="boutonValider" class="btn"/></p>
  </form>


</body>
