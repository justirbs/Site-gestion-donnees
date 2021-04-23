function selectJoueur(joueur){
  // on envoie le nom et le prénom du jouer à la page entrerModifStatistiques par la méthode AJAX
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("affichage").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "entrerModifStatistiques.php", true);
  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhttp.send("joueur="+joueur.id);

  // on motifie l'attribu "action" du formulaire pour donnée des info en GET à la page enregistrerModifStatistiques
  var formulaire = document.getElementById("formulaire");
  formulaire.setAttribute("action", "enregistrerModifStatistiques.php?joueur="+joueur.id);
}
