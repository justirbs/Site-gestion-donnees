<?php
session_start();
?>
<html>
<head>
	<title>Déconnexion</title>
	<meta charset="utf-8">
</head>
<body>

  <?php
    if($_GET["connexion"] == "out"){
      session_destroy();
    }
    header('Location: ../index.html');
  ?>


</body>
