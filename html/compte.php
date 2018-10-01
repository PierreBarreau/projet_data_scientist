<?php
session_start();
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
		echo "<h1>";
		echo $_SESSION['pseudo'];
		echo "</h1>";
		?>
		<br><br><br>
		<p>Se déconnecter en cliquant sur le lien suivant: </p>
		<a href="deconnexion.php">deconnexion</a>
	</body>
</html>