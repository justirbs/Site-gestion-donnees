<html>
<head>
	<title>enregistrer un compte</title>
	<meta charset="utf-8">
</head>
<body>

  <?php

    $fp = fopen('../csv/identifiant.csv', 'a+');
    fputcsv($fp, $_POST,";");
    fclose($fp);

  ?>


</body>
