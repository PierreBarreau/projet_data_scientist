<?php
session_start();
	session_destroy();
	?>
<!DOCTYPE html>
<html>
	<head>
 		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 		<meta http-equiv="Content-Language" content="fr" />
	 	<title>
  			DSP
		</title>
		<link href="General.css" rel="stylesheet"/>
	</head>
	<body>
	<?php
	echo "<h1>Déconnecté</h1>";
	echo '<p>Vous êtes à présent déconnecté <br />
	Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
	pour revenir à la page précédente.<br /><br><br>
	Cliquez <a href="index.php">ici</a> pour vous reconnecter</p>';
	echo '</div></body></html>';
	?>